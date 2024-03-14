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
    <x-slot:after>
        <script>
            let fresh;
            navigator.geolocation.watchPosition(function (position) {
                fresh = position;
            });

            function getSpeedData() {
                if (!fresh) {
                    return false;
                }

                let timestamp = fresh.timestamp;
                let time = 0;
                let speed = 0;
                let latitude = fresh.coords.latitude;
                let longitude = fresh.coords.longitude;

                if (localStorage.getItem('prevCoords')) {
                    const prevCoords = JSON.parse(localStorage.getItem('prevCoords'));

                    const prevTime = prevCoords.timestamp;
                    const currTime = timestamp;
                    const timeDiff = (currTime - prevTime) / 1000; // time difference in seconds
                    time = timeDiff;

                    const prevLat = prevCoords.latitude;
                    const prevLng = prevCoords.longitude;
                    const currLat = latitude;
                    const currLng = longitude;
                    const distance = calculateDistance(prevLat, prevLng, currLat, currLng); // in kilometers

                    speed = distance / (timeDiff / 3600); // speed in km/h
                }

                const speedData = {
                    timestamp: timestamp,
                    speed: speed,
                    time: time,
                    latitude: latitude,
                    longitude: longitude
                };

                localStorage.setItem('prevCoords', JSON.stringify(speedData));

                fresh = false;
                return speedData;
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

            function deg2rad(deg) {
                return deg * (Math.PI / 180);
            }

            let dataList = [];
            setInterval(function(){
                const data = getSpeedData();
                if (data) {
                    dataList.push(data);
                }
            }, 5000)

            const requestInterval = function () {
                setTimeout(function () {
                    if (dataList.length > 0) {
                        sendRequest(dataList[0]);
                    } else {
                        requestInterval();
                    }
                }, 6000)
            }
            requestInterval();

            const getRequestText = (data) => {
                data.timestamp = Math.round(data.timestamp / 1000);
                data.speed = Math.round(data.speed * 100) / 100;
                data.time = Math.round(data.time * 100) / 100;
                let drive_id = {{$drive->id}};
                return `?drive_id=${drive_id}&timestamp=${data.timestamp}&speed=${data.speed}&time=${data.time}&latitude=${data.latitude}&longitude=${data.longitude}`;
            }

            const sendRequest = (data) => {
                let request = new XMLHttpRequest();
                request.open('GET', '{{ route('app.terminal') }}' + getRequestText(data), true);
                request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                request.send();
                request.addEventListener('readystatechange', () => {
                    if (request.readyState == 4 && request.status == 200 && request.responseText == 1) {
                        delete (request);
                        dataList.shift();
                        if (!dataList) {
                            dataList = [];
                        }
                        requestInterval();
                    }
                });
            };
        </script>
    </x-slot:after>
</x-l-layout::form>
