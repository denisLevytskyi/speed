<x-l-layout::form action="/">
    <x-slot:title>
        Отчет
    </x-slot:title>
    <x-slot:header_info>
        Отчет
    </x-slot:header_info>
    <x-slot:style>
        <link rel="stylesheet" href="{{ asset('css/lvz/report.css') }}">
    </x-slot:style>
    <p class="formFormP">
        Отбор начало
    </p>
    <x-l::form-input type="text" readonly :value="$data['start']"/>
    <p class="formFormP">
        Отбор конец
    </p>
    <x-l::form-input type="text" readonly :value="$data['end']"/>
    <p class="formFormP">
        Поездок
    </p>
    <x-l::form-input type="text" readonly :value="$data['drives']"/>
    <p class="formFormP">
        Пакетов
    </p>
    <x-l::form-input type="text" readonly :value="$data['packets']"/>
    <p class="formFormP">
        Пройдено
    </p>
    <x-l::form-input type="text" readonly :value="number_format($data['distance'] / 1000, 3, ' км ', ' ') . ' м'"/>
    <p class="formFormP">
        Затрачено времени
    </p>
    <x-l::form-input type="text" readonly :value="floor($data['time'] / 3600) . ' ч ' . floor(($data['time'] % 3600) / 60) . ' м'"/>
    <p class="formFormP">
        Максимальная скорость
    </p>
    <x-l::form-input type="text" readonly :value="$data['speed'] . ' км/ч'"/>
    <a href="{{ route('app.report.index') }}" class="formFormA">
        Назад
    </a>
    <x-slot:after>
        <section class="list">
            <div class="container typicalContainer">
                <div class="listWrap">
                    @foreach($data['list'] as $drive)
                        <div class="listWrapItem">
                            <a href="{{ route('app.drive.show', $drive->id) }}" class="listWrapItemA">
                                {{ $drive->id . ' ' .
                                    $drive->user->name . ' [' .
                                    $drive->car->manufacturer->mark . ' - ' .
                                    $drive->car->number . '] ' .
                                    $drive->point_a  . ' - ' .
                                    $drive->point_b
                                }}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </x-slot:after>
</x-l-layout::form>
