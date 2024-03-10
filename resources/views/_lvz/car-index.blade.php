<x-l-layout::main>
    <x-slot:title>
        Список автомобилей
    </x-slot:title>
    <x-slot:header_info>
        Список автомобилей
    </x-slot:header_info>
    <style>
        .listWrapItem {
            background: darkgrey;
            border-radius: 2px;
            margin: 5px 0;
            padding: 5px;
        }

        .listWrapItemA {
            color: black;
        }
    </style>
    <x-l::status :message="session('status')"/>
    <section class="list">
        <div class="container typicalContainer">
            <a href="{{ route('app.car.create') }}" class="listA">
                Добавить автомобиль
            </a>
            <div class="listWrap">
                @foreach($cars as $car)
                    <div class="listWrapItem">
                        <a href="{{ route('app.car.edit',['car' => $car->id]) }}" class="listWrapItemA">
                            {{ $car->id . ' ' . $car->manufacturer . ' ' . $car->model . ' ' . $car->number}}
                        </a>
                    </div>
                @endforeach
                {{ $cars->onEachSide(1)->links() }}
            </div>
        </div>
    </section>
</x-l-layout::main>
