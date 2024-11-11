<x-l-layout::main>
    <x-slot:title>
        Результаты поиска
    </x-slot:title>
    <x-slot:header_info>
        Результаты поиска
    </x-slot:header_info>
    <section class="list">
        <div class="container typicalContainer">
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
            </div>
        </div>
    </section>
</x-l-layout::main>
