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
            /* Cloner */
            const getClone = (data) => {
                let clone = {};
                for (let key in data) {
                    clone[key] = data[key];
                }
                return clone;
            };

            /* Get location data */
            const speedometer = document.getElementById('speedometer');
            const packetsReceived = document.getElementById('packetsReceived');
            let packetsReceivedVal = 1;
            let geo;
            let old;
            let fresh;
            let list = [];

            /* => Listen geolocation */
            navigator.geolocation.watchPosition((position) => {
                geo = position;
            });

            /* => Prepare data and call to send request */
            deg2rad = (deg) => {
                return deg * (Math.PI / 180);
            };

            const calculateDistance = (lat1, lon1, lat2, lon2) => {
                const R = 6371; // Radius of the earth in km
                const dLat = deg2rad(lat2 - lat1);
                const dLon = deg2rad(lon2 - lon1);
                const a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                    Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) *
                    Math.sin(dLon / 2) * Math.sin(dLon / 2);
                const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
                const distance = R * c; // Distance in km
                return distance;
            };

            const getSpeedData = () => {
                if (!geo) {
                    return false;
                }

                fresh = {
                    timestamp: geo.timestamp,
                    time: 0,
                    speed: 0,
                    latitude: geo.coords.latitude,
                    longitude: geo.coords.longitude
                };

                if (old) {
                    const distance = calculateDistance(old.latitude, old.longitude, fresh.latitude, fresh.longitude); // in kilometers
                    fresh.time = (fresh.timestamp - old.timestamp) / 1000; // time difference in seconds
                    fresh.speed = distance / (fresh.time / 3600); // speed in km/h
                }

                geo = false;
                if (fresh.speed >= 100) {
                    old = false;
                    packetsReceived.value = 'Ошибка получения [100+]. Повтор...';
                    return false;
                } else if (!old) {
                    old = getClone(fresh);
                    return false;
                } else if (old.speed === 0 && fresh.speed === 0) {
                    old = getClone(fresh);
                    packetsReceived.value = 'Ошибка "стоянка". Повтор...';
                    return false;
                } else {
                    old = getClone(fresh);
                    speedometer.value = Math.round(fresh.speed * 100) / 100;
                    packetsReceived.value = packetsReceivedVal;
                    packetsReceivedVal ++;
                    return getClone(fresh);
                }
            };

            const geoInterval = () => {
                setInterval(() => {
                    let data = getSpeedData();
                    if (data) {
                        list.push(data);
                    }
                }, 6000);
            };
            geoInterval();

            /* Send Request to server */
            const packetsSent = document.getElementById('packetsSent');
            let packetsSentVal = 1;
            let error = 0;

            const errorCheck = () => {
                if (error > 3) {
                    location.reload();
                }
                error ++;
            };

            const getValueFromUrl = () => {
                let url = window.location.href; // Получаем текущий URL страницы
                let parts = url.split("/"); // Используем метод split() для разделения строки по "/"
                return parts[parts.indexOf("drive") + 1]; // Извлекаем значение после "drive/"
            };

            const getRequestText = (data) => {
                data.timestamp = Math.round(data.timestamp / 1000);
                data.time = Math.round(data.time * 100) / 100;
                data.speed = Math.round(data.speed * 100) / 100;
                let drive_id = getValueFromUrl();
                return `?drive_id=${drive_id}&timestamp=${data.timestamp}&time=${data.time}&speed=${data.speed}&latitude=${data.latitude}&longitude=${data.longitude}`;
            };

            const sendRequest = (data) => {
                const request = new XMLHttpRequest();
                request.open('GET', '{{ route('app.terminal') }}' + getRequestText(data), true);
                request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                request.timeout = 10000;
                request.send();
                request.onload = () => {
                    if (request.status === 200 && request.responseText === '2') {
                        list.shift();
                        packetsSent.value = packetsSentVal;
                        packetsSentVal ++;
                        error = 0;
                    } else if (request.status === 200 && request.responseText === '1') {
                        packetsSent.value = 'Ошибка статсуса поездки. Повтор...';
                        errorCheck();
                    } else if (request.status === 200 && request.responseText === '0') {
                        packetsSent.value = 'Ошибка записи. Повтор...';
                        errorCheck();
                    } else {
                        packetsSent.value = 'Ошибка сервера. Повтор...';
                        errorCheck();
                    }
                    requestInterval();
                    delete(request);
                };
                request.ontimeout = () => {
                    packetsSent.value = 'Ошибка ожидания. Повтор...';
                    requestInterval();
                    delete(request);
                };
                request.onerror = () => {
                    packetsSent.value = 'Ошибка отправки. Повтор...';
                    requestInterval();
                    delete(request);
                };
            };

            const requestInterval = () => {
                setTimeout(() => {
                    if (list.length > 0) {
                        let listItem = getClone(list[0]);
                        sendRequest(listItem);
                    } else {
                        requestInterval();
                    }
                }, 4000);
            };
            requestInterval();
        </script>
    </x-slot:after>
</x-l-layout::form>
