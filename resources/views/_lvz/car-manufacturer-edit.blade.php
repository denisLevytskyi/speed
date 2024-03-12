<x-l-layout::form :action="route('app.car-manufacturer.update', $car_manufacturer->id)">
    @method('put')
    <x-slot:title>
        Обновление производителя
    </x-slot:title>
    <x-slot:header_info>
        Обновление производителя
    </x-slot:header_info>
    <pre class="productFormP">Запись №: {{ $car_manufacturer->id }}</pre>
    <pre class="productFormP">Добавлена пользователем: {{ $car_manufacturer->user_id }}</pre>
    <br>
    <p class="formFormP">
        Производитель
    </p>
    <x-l::form-input-error :messages="$errors->get('carManufacturerEditMark')"/>
    <x-l::form-input name="carManufacturerEditMark" type="text" :value="$car_manufacturer->mark"/>
    <x-l::form-btn>
        Обновить
    </x-l::form-btn>
    <a href="{{ route('app.car-manufacturer.index') }}" class="formFormA">
        Назад
    </a>
    <x-l::form-delete :action="route('app.car-manufacturer.destroy', $car_manufacturer->id)">
        Удалить
    </x-l::form-delete>
</x-l-layout::form>
