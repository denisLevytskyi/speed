<x-l-layout::main>
    <x-slot:title>
        Список производителей
    </x-slot:title>
    <x-slot:header_info>
        Список производителей
    </x-slot:header_info>
    <section class="list">
        <div class="container typicalContainer">
            <a href="{{ route('app.car-manufacturer.create') }}" class="listA">
                Добавить производителя
            </a>
            <div class="listWrap">
                @foreach($car_manufacturers as $car_manufacturer)
                    <div class="listWrapItem">
                        <a href="{{ route('app.car-manufacturer.edit', $car_manufacturer->id) }}" class="listWrapItemA">
                            {{ $car_manufacturer->id . ' ' . $car_manufacturer->mark }}
                        </a>
                    </div>
                @endforeach
                {{ $car_manufacturers->onEachSide(1)->links() }}
            </div>
        </div>
    </section>
</x-l-layout::main>
