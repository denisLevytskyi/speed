<x-l-layout::main>
    <x-slot:title>
        Главная
    </x-slot:title>
    <x-slot:header_info>
        Главная страница
    </x-slot:header_info>
    <x-slot:style>
        <link rel="stylesheet" href="{{ asset('css/lvz/index.css') }}">
    </x-slot:style>
    <section class="links">
        <div class="container typicalContainer">
            <h1 class="linksH1">
                Доступные действия
            </h1>
            <div class="linksWrapper">
                @if(Auth::user()->isPassStrongMod())
                    <a href="{{ route('app.car-manufacturer.index') }}" class="linksWrapperA">
                        Автопроизводители
                    </a>
                    <a href="{{ route('app.car.index') }}" class="linksWrapperA">
                        Автомобили
                    </a>
                @endif
                <a href="{{ route('app.drive.index') }}" class="linksWrapperA">
                    Поездки
                </a>
                @if(Auth::user()->isWatcher())
                    <a href="{{ route('app.watch') }}" class="linksWrapperA">
                        Наблюдение
                    </a>
                @endif
                @if(Auth::user()->isAdministrator())
                    <a href="{{ route('app.report.index') }}" class="linksWrapperA">
                        Отчет
                    </a>
                    <a href="{{ route('app.admin.index') }}" class="linksWrapperA">
                        Пользователи
                    </a>
                    <a href="{{ route('app.prop.index') }}" class="linksWrapperA">
                        Свойства
                    </a>
                @endif
            </div>
        </div>
    </section>
</x-l-layout::main>
