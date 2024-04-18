<x-l-layout::main>
    <x-slot:title>
        Наблюдение
    </x-slot:title>
    <x-slot:header_info>
        Наблюдение
    </x-slot:header_info>
    <x-slot:style>
        <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>
        <link rel="stylesheet" href="{{ asset('css/lvz/click.css') }}">
        <link rel="stylesheet" href="{{ asset('css/lvz/watch.css') }}">
    </x-slot:style>
    <section class="map">
        <div class="container typicalContainer">
            <div class="mapMap" id="map"></div>
        </div>
    </section>
    <script src="https://unpkg.com/leaflet"></script>
    <script>
        const x_latitude = {{ $prop->getProp('watch_latitude') ?: 50.75 }};
        const x_longitude = {{ $prop->getProp('watch_longitude') ?: 25.35 }};
        const x_time = {{ $prop->getProp('watch_time') ?: 5999 }};

        let drive;
        let drives;
        let marker;
        let markers = [];
        let polyline;
        let polylines = [];
        let packet;
        let packetCoords = [];
        let packetText;
        let driveText;

        let map = L.map('map').setView([x_latitude, x_longitude], 15).setMaxZoom(18);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

        const timeToTime = (isoDate) => {
            let date = new Date(isoDate);
            let year = date.getFullYear();
            let month = String(date.getMonth() + 1).padStart(2, '0');
            let day = String(date.getDate()).padStart(2, '0');
            let hours = String(date.getHours()).padStart(2, '0');
            let minutes = String(date.getMinutes()).padStart(2, '0');
            let seconds = String(date.getSeconds()).padStart(2, '0');
            return `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
        }

        const show = () => {
            for (drive of drives) {
                packetCoords = [];
                driveText = `==ПОЕЗДКА==<br>№ ПОЕЗДКИ: ${drive.id}<br>ОТ: ${drive.point_a}<br>ДО: ${drive.point_b}<br>ID ПОЛЬЗОВАТЕЛЯ: ${drive.user_id}<br>ID АВТОМОБИЛЯ: ${drive.car_id}<br><br>`;
                for (packet of drive.list) {
                    packetText = driveText + `==ПАКЕТ==<br>${timeToTime(packet.created_at)}<br>СКОРОСТЬ: ${packet.speed} км/ч<br>№ ПАКЕТА: ${packet.id}<br>ВРЕМЯ: ${timeToTime(packet.timestamp * 1000)}<br>СМЕЩЕНИЕ: ${packet.time}<br>ШИРОТА: ${packet.latitude}<br>ДОЛГОТА: ${packet.longitude}`;
                    markers.push(L.marker([packet.latitude, packet.longitude]).addTo(map));
                    markers[markers.length - 1].bindPopup(packetText);
                    markers[markers.length - 1].setIcon(L.divIcon({className: 'icon'}));
                }
                for (packet of drive.list) {
                    packetCoords.push([packet.latitude, packet.longitude]);
                }
                polylines.push(L.polyline(packetCoords, {color: 'black', weight: 2}).addTo(map));
            }
        };

        const deleteOld = () => {
            for (marker of markers) {
                map.removeLayer(marker);
            }
            for (polyline of polylines) {
                map.removeLayer(polyline);
            }
        };

        const sendRequest = () => {
            const request = new XMLHttpRequest();
            request.open('GET', '{{ route('app.terminal.get') }}', true);
            request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            request.send();
            request.onload = () => {
                if (request.status === 200) {
                    drives = JSON.parse(request.responseText);
                    deleteOld();
                    show();
                }
                delete(request);
            };
        };

        const interval = () => {
            setInterval(() => {
                sendRequest();
            }, x_time);
        };
        interval();
        sendRequest();
    </script>
</x-l-layout::main>
