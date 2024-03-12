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
                @foreach($manufacturers as $manufacturer)
                    <div class="listWrapItem">
                        <a href="{{ route('app.car-manufacturer.edit', $manufacturer->id) }}" class="listWrapItemA">
                            {{ $manufacturer->id . ' ' . $manufacturer->mark }}
                        </a>
                    </div>
                @endforeach
                {{ $manufacturers->onEachSide(1)->links() }}
            </div>
        </div>
    </section>
</x-l-layout::main>
