<x-l-layout::form :action="route('app.drive.update', $drive->id)">
    @method('put')
    <x-slot:title>
        Запись поездки
    </x-slot:title>
    <x-slot:header_info>
        Запись поездки
    </x-slot:header_info>
    <pre class="productFormP">Запись №: {{ $drive->id }}</pre>
    <pre class="productFormP">Добавлена пользователем: {{ $drive->user_id }}</pre>
    <br>
    <p class="formFormP">
        Автомобиль
    </p>
    <x-l::form-input type="text" readonly :value="$drive->car->manufacturer->mark . ' ' . $drive->car->number"/>
    <p class="formFormP">
        От
    </p>
    <x-l::form-input type="text" readonly :value="$drive->point_a"/>
    <p class="formFormP">
        До
    </p>
    <x-l::form-input type="text" readonly :value="$drive->point_b"/>
    <x-l::form-btn>
        Завершить поездку
    </x-l::form-btn>
    <a href="{{ route('app.drive.index') }}" class="formFormA">
        Назад
    </a>
    <x-slot:after>
{{--        <script>--}}
{{--            const current_position = [];--}}

{{--            const get_position = () => {--}}
{{--                navigator.geolocation.watchPosition(function (position) {--}}
{{--                    current_position.push({--}}
{{--                        latitude : position.coords.latitude,--}}
{{--                        longitude : position.coords.longitude,--}}
{{--                        speed : position.coords.speed,--}}
{{--                        timestamp : position.timestamp--}}
{{--                    });--}}
{{--                    alert(current_position.speed);--}}
{{--                });--}}
{{--            }--}}


{{--            get_position();--}}
{{--        </script>--}}
    </x-slot:after>
</x-l-layout::form>
