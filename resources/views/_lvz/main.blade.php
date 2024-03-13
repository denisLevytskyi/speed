<x-l-layout::main>
    <x-slot:title>
        Главная
    </x-slot:title>
    <x-slot:header_info>
        Главная страница
    </x-slot:header_info>
    <section class="links">
        <div class="container typicalContainer">
            <h1 class="linksH1">
                Доступные действия
            </h1>
            <div class="linksWrapper">
                <a href="{{ route('app.car-manufacturer.index') }}" class="linksWrapperA">
                    Автопроизводители
                </a>
                <a href="{{ route('app.car.index') }}" class="linksWrapperA">
                    Автомобили
                </a>
                <a href="{{ route('app.drive.index') }}" class="linksWrapperA">
                    Поездки
                </a>
                <a href="{{ route('app.admin.index') }}" class="linksWrapperA">
                    Пользователи
                </a>
            </div>
        </div>
    </section>
</x-l-layout::main>
