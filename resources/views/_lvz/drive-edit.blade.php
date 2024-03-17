<x-l-layout::form :action="route('app.drive.update', $drive->id)">
    @method('put')
    <x-slot:title>
        Запись поездки
    </x-slot:title>
    <x-slot:header_info>
        Запись поездки
    </x-slot:header_info>
    <pre class="productFormP">Запись №: {{ $drive->id }}</pre>
    <pre class="productFormP">Добавлена пользователем: {{ $drive->user_id }}</pre>
    <br>
    <p class="formFormP">
        Автомобиль
    </p>
    <x-l::form-input type="text" readonly :value="$drive->car->manufacturer->mark . ' ' . $drive->car->number"/>
    <p class="formFormP">
        От
    </p>
    <x-l::form-input type="text" readonly :value="$drive->point_a"/>
    <p class="formFormP">
        До
    </p>
    <x-l::form-input type="text" readonly :value="$drive->point_b"/>
    <x-l::form-btn>
        Завершить поездку
    </x-l::form-btn>
    <a href="{{ route('app.drive.index') }}" class="formFormA">
        Назад
    </a>
    <x-slot:before>
        <section class="form">
            <div class="container">
                <form action="" class="formForm">
                    <pre class="productFormP">Пакетов получено</pre>
                    <x-l::form-input type="text" id="packetsReceived" readonly value="0"/>
                    <pre class="productFormP">Пакетов отправлено</pre>
                    <x-l::form-input type="text" id="packetsSent" readonly value="0"/>
                    <pre class="productFormP">Скорость</pre>
                    <x-l::form-input type="text" id="speedometer" readonly value="0"/>
                </form>
            </div>
        </section>
    </x-slot:before>
    <x-slot:after>
        <script>
            /* Chat GPT magic <3 */
            const speedometer = document.getElementById('speedometer');
            const packetsReceived = document.getElementById('packetsReceived');
            let packetsReceivedVal = 1;

            let fresh;
            let old;
            navigator.geolocation.watchPosition(function (position) {
                fresh = position;
            });

            function deg2rad(deg) {
                return deg * (Math.PI / 180);
            }

            function calculateDistance(lat1, lon1, lat2, lon2) {
                const R = 6371; // Radius of the earth in km
                const dLat = deg2rad(lat2 - lat1);
                const dLon = deg2rad(lon2 - lon1);
                const a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                    Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) *
                    Math.sin(dLon / 2) * Math.sin(dLon / 2);
                const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
                const distance = R * c; // Distance in km
                return distance;
            }

            function getSpeedData() {
                if (!fresh) {
                    return false;
                }

                let timestamp = fresh.timestamp;
                let time = 0;
                let speed = 0;
                let latitude = fresh.coords.latitude;
                let longitude = fresh.coords.longitude;

                if (old) {
                    const prevTime = old.timestamp;
                    const currTime = timestamp;
                    const timeDiff = (currTime - prevTime) / 1000; // time difference in seconds
                    time = timeDiff;

                    const prevLat = old.latitude;
                    const prevLng = old.longitude;
                    const currLat = latitude;
                    const currLng = longitude;
                    const distance = calculateDistance(prevLat, prevLng, currLat, currLng); // in kilometers

                    speed = distance / (timeDiff / 3600); // speed in km/h
                }

                const speedData = {
                    timestamp: timestamp,
                    time: time,
                    speed: speed,
                    latitude: latitude,
                    longitude: longitude
                };

                fresh = false;
                old = speedData;
                return speedData;
            }

            let dataList = [];
            setInterval(function(){
                const data = getSpeedData();
                if (data) {
                    dataList.push(data);
                    speedometer.value = Math.round(data.speed * 100) / 100;
                    packetsReceived.value = packetsReceivedVal;
                    packetsReceivedVal ++;
                }
            }, 5000)

            /* Send Request to server */
            const packetsSent = document.getElementById('packetsSent');
            let packetsSentVal = 1;

            const getValueFromUrl = () => {
                // Получаем текущий URL страницы
                let url = window.location.href;
                // Используем метод split() для разделения строки по "/"
                let parts = url.split("/");
                // Извлекаем значение после "drive/"
                let value = parts[parts.indexOf("drive") + 1];
                // Возвращаем значение
                return value;
            }

            const getRequestText = (data) => {
                data.timestamp = Math.round(data.timestamp / 1000);
                data.time = Math.round(data.time * 100) / 100;
                data.speed = Math.round(data.speed * 100) / 100;
                let drive_id = getValueFromUrl();
                return `?drive_id=${drive_id}&timestamp=${data.timestamp}&time=${data.time}&speed=${data.speed}&latitude=${data.latitude}&longitude=${data.longitude}`;
            }

            const sendRequest = (data) => {
                let request = new XMLHttpRequest();
                request.open('GET', '{{ route('app.terminal') }}' + getRequestText(data), true);
                request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                request.send();
                request.onload = () => {
                    if (request.status === 200 && request.responseText === '1') {
                        dataList.shift();
                        packetsSent.value = packetsSentVal;
                        packetsSentVal ++;
                    }
                    requestInterval();
                    delete(request);
                };
            };

            const requestInterval = () => {
                setTimeout( () => {
                    if (dataList.length > 0) {
                        let dataListCast = {
                            timestamp: dataList[0].timestamp,
                            time: dataList[0].time,
                            speed: dataList[0].speed,
                            latitude: dataList[0].latitude,
                            longitude: dataList[0].longitude
                        };
                        sendRequest(dataListCast);
                    } else {
                        requestInterval();
                    }
                }, 5000)
            }
            requestInterval();
        </script>
    </x-slot:after>
</x-l-layout::form>
