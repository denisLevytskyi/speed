<x-l-layout::main>
    <x-slot:title>
        Поездка №{{ $drive->id }}
    </x-slot:title>
    <x-slot:header_info>
        <a href="{{ route('app.drive.show.check', $drive->id) }}" class="headerWrapPLink">
            Поездка №{{ $drive->id }}
        </a>
    </x-slot:header_info>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>
    <style>
        .mapMap {
            width: 100%;
            height: 500px;
        }

        .icon {
            width: 2px;
            height: 2px;
            border: 1px solid #d32121;
            background: #d32121;
        }

        .infoWrap {
            display: flex;
            align-items: start;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .infoWrapItem {
            margin: 0 5px;
        }
    </style>
    <section class="map">
        <div class="container typicalContainer">
            <div class="mapDriveList" id="list" style="display: none">
                @json($drive->list)
            </div>
            <div class="mapMap" id="map"></div>
        </div>
    </section>
    <section class="info">
        <div class="container typicalContainer">
            <div class="infoWrap">
                <div class="infoWrapItem">
                    <p class="infoWrapItemP">
                        Начало: {{ $drive->created_at }}
                    </p>
                    <p class="infoWrapItemP">
                        Конец: {{ $drive->updated_at }}
                    </p>
                    <p class="infoWrapItemP">
                        От: {{ $drive->point_a }}
                    </p>
                    <p class="infoWrapItemP">
                        До: {{ $drive->point_b }}
                    </p>
                    <p class="infoWrapItemP">
                        ПО: {{ $drive->odometer }} км
                    </p>
                </div>
                <div class="infoWrapItem">
                    <p class="infoWrapItemP">
                        Пользователь -> ID: {{ $drive->user->id }}
                    </p>
                    <p class="infoWrapItemP">
                        -> Имя: {{ $drive->user->name }}
                    </p>
                    <p class="infoWrapItemP">
                        -> Email: {{ $drive->user->email }}
                    </p>
                    <a href="{{ route('app.drive.index') }}" class="infoWrapItemA">-> Назад</a>
                </div>
                <div class="infoWrapItem">
                    <p class="infoWrapItemP">
                        Автомобиль -> ID: {{ $drive->car->id }}
                    </p>
                    <p class="infoWrapItemP">
                        -> Владелец: [{{ $drive->car->user->id }}]  {{ $drive->car->user->name }}
                    </p>
                    <p class="infoWrapItemP">
                        -> Модель: {{ $drive->car->manufacturer->mark }} {{ $drive->car->model }}
                    </p>
                    <p class="infoWrapItemP">
                        -> Гос номер: {{ $drive->car->number }}
                    </p>
                    <p class="infoWrapItemP">
                        -> Цвет: {{ $drive->car->color }}
                    </p>
                </div>
            </div>
        </div>
    </section>
    <script src="https://unpkg.com/leaflet"></script>
    <script>
        let packets = JSON.parse(document.getElementById('list').innerHTML);
        let packet;
        let packetCoords = [];

        /* ADD MAP */
        let map = L.map('map').setView([packets[0].latitude, packets[0].longitude], 16);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        /* ADD POINTS */
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

        for (packet of packets) {
            const itemText = `${timeToTime(packet.created_at)}<br>СКОРОСТЬ: ${packet.speed} км/ч<br>№ ПАКЕТА: ${packet.id}<br>ВРЕМЯ: ${timeToTime(packet.timestamp * 1000)}<br>СМЕЩЕНИЕ: ${packet.time}<br>ШИРОТА: ${packet.latitude}<br>ДОЛГОТА: ${packet.longitude}`;
            const marker = L.marker([packet.latitude, packet.longitude]).addTo(map);
            marker.bindPopup(itemText);
            marker.setIcon(L.divIcon({className: 'icon'}));
        }

        /* ADD POLYLINE */
        for (packet of packets) {
            packetCoords.push([packet.latitude, packet.longitude]);
        }
        let polyline = L.polyline(packetCoords, {color: 'black', weight: 2}).addTo(map);
    </script>
</x-l-layout::main>
