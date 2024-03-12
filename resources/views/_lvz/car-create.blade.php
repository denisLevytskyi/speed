<x-l-layout::form :action="route('app.car.store')">
    <x-slot:title>
        Добавление автомобиля
    </x-slot:title>
    <x-slot:header_info>
        Добавление автомобиля
    </x-slot:header_info>
    <p class="formFormP">
        Производитель
    </p>
    <x-l::form-input-error :messages="$errors->get('carCreateManufacturerId')"/>
    <x-l::form-select name="carCreateManufacturerId">
        <option value=""></option>
        @foreach($list as $item)
            <option value="{{ $item->id }}">{{ $item->mark }}</option>
        @endforeach
    </x-l::form-select>
    <p class="formFormP">
        Модель
    </p>
    <x-l::form-input-error :messages="$errors->get('carCreateModel')"/>
    <x-l::form-input name="carCreateModel" type="text" :value="old('carCreateModel')"/>
    <p class="formFormP">
        Государственный номер
    </p>
    <x-l::form-input-error :messages="$errors->get('carCreateNumber')"/>
    <x-l::form-input name="carCreateNumber" type="text" :value="old('carCreateNumber')"/>
    <p class="formFormP">
        Цвет
    </p>
    <x-l::form-input-error :messages="$errors->get('carCreateColor')"/>
    <x-l::form-input name="carCreateColor" type="text" :value="old('carCreateColor')"/>
    <p class="formFormP">
        Топливо
    </p>
    <x-l::form-input-error :messages="$errors->get('carCreateFuel')"/>
    <x-l::form-select name="carCreateFuel">
        <option value="Газ">Газ</option>
        <option value="Бензин">Бензин</option>
        <option value="Дизель">Дизель</option>
    </x-l::form-select>
    <p class="formFormP">
        Год выпуска
    </p>
    <x-l::form-input-error :messages="$errors->get('carCreateYear')"/>
    <x-l::form-input name="carCreateYear" type="number" min="1900" max="2030" step="1" :value="old('carCreateYear')"/>
    <x-l::form-btn>
        Добавить
    </x-l::form-btn>
    <a href="{{ route('app.car.index') }}" class="formFormA">
        Назад
    </a>
</x-l-layout::form>
