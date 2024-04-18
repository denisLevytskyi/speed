<x-l-layout::main>
    <x-slot:title>
        Список поездок
    </x-slot:title>
    <x-slot:header_info>
        Список поездок
    </x-slot:header_info>
    <section class="list">
        <div class="container typicalContainer">
            @if(!$current)
                <a href="{{ route('app.drive.create') }}" class="listA">
                    Регистрация
                </a>
            @else
                <a href="{{ route('app.drive.edit', $current->id) }}" class="listA">
                    Запись
                </a>
            @endif
            <div class="listWrap">
                @foreach($drives as $drive)
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
                {{ $drives->onEachSide(1)->links() }}
            </div>
        </div>
    </section>
</x-l-layout::main>
