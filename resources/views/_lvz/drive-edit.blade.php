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
                    <pre class="productFormP">Пакетов получено, шт</pre>
                    <x-l::form-input type="text" id="packetsReceived" readonly value="0"/>
                    <pre class="productFormP">Пакетов отправлено, шт</pre>
                    <x-l::form-input type="text" id="packetsSent" readonly value="0"/>
                    <pre class="productFormP">Скорость, км/ч</pre>
                    <x-l::form-input type="text" id="speedometer" readonly value="0"/>
                    <pre class="productFormP">Дистанция, м</pre>
                    <x-l::form-input type="text" id="distance" readonly value="0"/>
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
            }

            /* Seating from PHP */
            const x_min_speed = {{ $prop->getProp('drive_min_speed') ?: 0 }};
            const x_max_speed = {{ $prop->getProp('drive_max_speed') ?: 99 }};
            const x_get_time = {{ $prop->getProp('drive_get_time') ?: 5999 }};
            const x_send_time = {{ $prop->getProp('drive_send_time') ?: 3999 }};
            const x_timeout = {{ $prop->getProp('drive_timeout') ?: 9999 }};
            const x_error = {{ $prop->getProp('drive_error') ?: 0 }};

            /* PHP */
            const php_token = '{{ csrf_token() }}';
            const php_route = '{{ route('app.terminal.write') }}';
            const php_drive = {{ $drive->id }};

            /* Get location data */
            const speedometer = document.getElementById('speedometer');
            const distance = document.getElementById('distance');
            const packetsReceived = document.getElementById('packetsReceived');
            let distanceVal = 0;
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
            }

            const calculateDistance = (lat1, lon1, lat2, lon2) => {
                const R = 6371;
                const dLat = deg2rad(lat2 - lat1);
                const dLon = deg2rad(lon2 - lon1);
                const a = Math.sin(dLat / 2) * Math.sin(dLat / 2) + Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * Math.sin(dLon / 2) * Math.sin(dLon / 2);
                const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
                return R * c;
            }

            const getSpeedData = () => {
                if (!geo) {
                    return false;
                }
                fresh = {
                    timestamp: geo.timestamp,
                    time: 0,
                    speed: 0,
                    latitude: geo.coords.latitude,
                    longitude: geo.coords.longitude,
                    distance: 0,
                };
                geo = false;
                if (old) {
                    const distance = calculateDistance(old.latitude, old.longitude, fresh.latitude, fresh.longitude);
                    fresh.time = (fresh.timestamp - old.timestamp) / 1000;
                    fresh.speed = distance / (fresh.time / 3600);
                    fresh.distance = distance * 1000;
                }
                if (fresh.speed >= x_max_speed) {
                    old = false;
                    packetsReceived.value = 'Ошибка получения [+' + x_max_speed + ']. Повтор...';
                    return false;
                } else if (!old) {
                    old = getClone(fresh);
                    return false;
                } else if (old.speed <= x_min_speed && fresh.speed <= x_min_speed) {
                    old = getClone(fresh);
                    packetsReceived.value = 'Ошибка получения [-' + x_min_speed + ']. Повтор...';
                    return false;
                } else {
                    old = getClone(fresh);
                    speedometer.value = Math.round(fresh.speed * 100) / 100;
                    distanceVal += fresh.distance;
                    distance.value = Math.round(distanceVal * 100) / 100;
                    packetsReceived.value = packetsReceivedVal;
                    packetsReceivedVal ++;
                    return getClone(fresh);
                }
            }

            const geoInterval = () => {
                setInterval(() => {
                    let data = getSpeedData();
                    if (data) {
                        list.push(data);
                    }
                }, x_get_time);
            }
            geoInterval();

            /* Send Request to server */
            const packetsSent = document.getElementById('packetsSent');
            let packetsSentVal = 1;
            let error = 0;

            const errorCheck = () => {
                error ++;
                if (error >= x_error && x_error !== 0) {
                    location.reload();
                }
            }

            const makeFormData = (data) => {
                data.timestamp = Math.round(data.timestamp / 1000);
                data.time = Math.round(data.time * 100) / 100;
                data.speed = Math.round(data.speed * 100) / 100;
                data.distance = Math.round(data.distance * 100) / 100;
                const formData = new FormData();
                formData.append('_token', php_token);
                formData.append('driveEditDrive', php_drive);
                formData.append('driveEditTimestamp', data.timestamp);
                formData.append('driveEditTime', data.time);
                formData.append('driveEditSpeed', data.speed);
                formData.append('driveEditLatitude', data.latitude);
                formData.append('driveEditLongitude', data.longitude);
                formData.append('driveEditDistance', data.distance);
                return formData;
            }

            const sendRequest = (data) => {
                const request = new XMLHttpRequest();
                const formData = makeFormData(data);
                request.open('POST', php_route, true);
                request.timeout = x_timeout;
                request.send(formData);
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
                }
                request.ontimeout = () => {
                    packetsSent.value = 'Ошибка ожидания. Повтор...';
                    requestInterval();
                    delete(request);
                }
                request.onerror = () => {
                    packetsSent.value = 'Ошибка отправки. Повтор...';
                    requestInterval();
                    delete(request);
                }
            }

            const requestInterval = () => {
                setTimeout(() => {
                    if (list.length > 0) {
                        let listItem = getClone(list[0]);
                        sendRequest(listItem);
                    } else {
                        requestInterval();
                    }
                }, x_send_time);
            }
            requestInterval();
        </script>
    </x-slot:after>
</x-l-layout::form>