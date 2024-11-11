<x-l-layout::main>
    <x-slot:title>
        Поездка №{{ $drive->id }}
    </x-slot:title>
    <x-slot:header_info>
        <a href="{{ route('app.drive.show.check', $drive->id) }}" class="headerWrapPLink">
            Поездка №{{ $drive->id }}
        </a>
    </x-slot:header_info>
    <x-slot:style>
        <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>
        <link rel="stylesheet" href="{{ asset('css/lvz/click.css') }}">
        <link rel="stylesheet" href="{{ asset('css/lvz/map.css') }}">
    </x-slot:style>
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
                    <a href="{{ route('app.drive.index') }}" class="infoWrapItemA">
                        Назад
                    </a>
                    <p class="infoWrapItemSlash">
                        /
                    </p>
                    <a href="{{ route('app.drive.show.check', $drive->id) }}" class="infoWrapItemA">
                        Лента
                    </a>
                </div>
                <div class="infoWrapItem clickParent">
                    <p class="infoWrapItemP clickHeader">
                        Поездка -> ID: {{ $drive->id }}
                    </p>
                    <p class="infoWrapItemP clickItem">
                        -> Начата: {{ $drive->created_at }}
                    </p>
                    <p class="infoWrapItemP clickItem">
                        -> Закончена: {{ $drive->updated_at }}
                    </p>
                    <p class="infoWrapItemP clickItem">
                        -> От: {{ $drive->point_a }}
                    </p>
                    <p class="infoWrapItemP clickItem">
                        -> До: {{ $drive->point_b }}
                    </p>
                    <p class="infoWrapItemP clickItem">
                        -> ПО: {{ $drive->odometer }} км
                    </p>
                    <p class="infoWrapItemP clickItem">
                        -> Всего пакетов: {{ $drive->list()->count() }}
                    </p>
                    <p class="infoWrapItemP clickItem">
                        -> Пройдено: {{ number_format($drive->list()->sum('distance') / 1000, 3, ' км ', ' ')  }} м
                    </p>
                    <p class="infoWrapItemP clickItem">
                        -> Затрачено времени: {{ floor($drive->list()->sum('time') / 3600) }} ч {{ floor(($drive->list()->sum('time') % 3600) / 60) }} м
                    </p>
                </div>
                <div class="infoWrapItem clickParent">
                    <p class="infoWrapItemP clickHeader">
                        Пользователь -> ID: {{ $drive->user->id }}
                    </p>
                    <p class="infoWrapItemP clickItem">
                        -> Имя: {{ $drive->user->name }}
                    </p>
                    <p class="infoWrapItemP clickItem">
                        -> Email: {{ $drive->user->email }}
                    </p>
                </div>
                <div class="infoWrapItem clickParent">
                    <p class="infoWrapItemP clickHeader">
                        Автомобиль -> ID: {{ $drive->car->id }}
                    </p>
                    <p class="infoWrapItemP clickItem">
                        -> Владелец: [{{ $drive->car->user->id }}]  {{ $drive->car->user->name }}
                    </p>
                    <p class="infoWrapItemP clickItem">
                        -> Производитель: {{ $drive->car->manufacturer->mark }}
                    </p>
                    <p class="infoWrapItemP clickItem">
                        -> Модель: {{ $drive->car->model }}
                    </p>
                    <p class="infoWrapItemP clickItem">
                        -> Гос номер: {{ $drive->car->number }}
                    </p>
                    <p class="infoWrapItemP clickItem">
                        -> Цвет: {{ $drive->car->color }}
                    </p>
                    <p class="infoWrapItemP clickItem">
                        -> Топливо: {{ $drive->car->fuel }}
                    </p>
                    <p class="infoWrapItemP clickItem">
                        -> Год выпуска: {{ $drive->car->year }}
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
        let map = L.map('map').setView([packets[0].latitude, packets[0].longitude], 15).setMaxZoom(18);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

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
            const itemText = `${timeToTime(packet.created_at)}<br>СКОРОСТЬ: ${packet.speed} км/ч<br>№ ПАКЕТА: ${packet.id}<br>ВРЕМЯ: ${timeToTime(packet.timestamp * 1000)}<br>СМЕЩЕНИЕ: ${packet.time} сек<br>ШИРОТА: ${packet.latitude}<br>ДОЛГОТА: ${packet.longitude}<br>ПРОЙДЕНО: ${packet.distance} м`;
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
    <script src="{{ asset('script/click.js') }}"></script>
</x-l-layout::main>
