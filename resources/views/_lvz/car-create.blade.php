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
    <x-l::form-input-error :messages="$errors->get('CarCreateManufacturer')"/>
    <x-l::form-input name="CarCreateManufacturer" type="text" :value="old('CarCreateManufacturer')"/>
    <p class="formFormP">
        Модель
    </p>
    <x-l::form-input-error :messages="$errors->get('CarCreateModel')"/>
    <x-l::form-input name="CarCreateModel" type="text" :value="old('CarCreateModel')"/>
    <p class="formFormP">
        Государственный номер
    </p>
    <x-l::form-input-error :messages="$errors->get('CarCreateNumber')"/>
    <x-l::form-input name="CarCreateNumber" type="text" :value="old('CarCreateNumber')"/>
    <p class="formFormP">
        Цвет
    </p>
    <x-l::form-input-error :messages="$errors->get('CarCreateColor')"/>
    <x-l::form-input name="CarCreateColor" type="text" :value="old('CarCreateColor')"/>
    <p class="formFormP">
        Топливо
    </p>
    <x-l::form-input-error :messages="$errors->get('CarCreateFuel')"/>
    <x-l::form-select name="CarCreateFuel">
        <option value="Газ">Газ</option>
        <option value="Бензин">Бензин</option>
        <option value="Дизель">Дизель</option>
    </x-l::form-select>
    <p class="formFormP">
        Год выпуска
    </p>
    <x-l::form-input-error :messages="$errors->get('CarCreateYear')"/>
    <x-l::form-input name="CarCreateYear" type="number" min="1900" max="2030" step="1" :value="old('CarCreateYear')"/>
    <x-l::form-btn>
        Добавить
    </x-l::form-btn>
    <a href="{{ route('app.car.index') }}" class="formFormA">
        Назад
    </a>
</x-l-layout::form>
