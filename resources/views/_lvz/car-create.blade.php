<x-l-layout::form :action="route('app.car.store')">
    <x-slot:title>
        Создание автомобиля
    </x-slot:title>
    <x-slot:header_info>
        Создание автомобиля
    </x-slot:header_info>
    <p class="formFormP">
        Производитель
    </p>
    <x-l::form-input-error :messages="$errors->get('carCreateManufacturerId')"/>
    <x-l::form-select name="carCreateManufacturerId">
        <option value=""></option>
        @foreach($manufacturers as $manufacturer)
            <option value="{{ $manufacturer->id }}" {{ $manufacturer->id == old('carCreateManufacturerId') ? 'selected' : '' }}>{{ $manufacturer->mark }}</option>
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
        <option value=""></option>
        <option value="Газ" {{ old('carCreateFuel') == 'Газ' ? 'selected' : '' }}>Газ</option>
        <option value="Бензин" {{ old('carCreateFuel') == 'Бензин' ? 'selected' : '' }}>Бензин</option>
        <option value="Дизель" {{ old('carCreateFuel') == 'Дизель' ? 'selected' : '' }}>Дизель</option>
    </x-l::form-select>
    <p class="formFormP">
        Год выпуска
    </p>
    <x-l::form-input-error :messages="$errors->get('carCreateYear')"/>
    <x-l::form-input name="carCreateYear" type="number" step="1" :value="old('carCreateYear')"/>
    <x-l::form-btn>
        Добавить
    </x-l::form-btn>
    <a href="{{ route('app.car.index') }}" class="formFormA">
        Назад
    </a>
</x-l-layout::form>
