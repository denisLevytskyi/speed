<x-l-layout::form :action="route('app.car-manufacturer.store')">
    <x-slot:title>
        Создание производителя
    </x-slot:title>
    <x-slot:header_info>
        Создание производителя
    </x-slot:header_info>
    <p class="formFormP">
        Производитель
    </p>
    <x-l::form-input-error :messages="$errors->get('carManufacturerCreateMark')"/>
    <x-l::form-input name="carManufacturerCreateMark" type="text" :value="old('carManufacturerCreateMark')"/>
    <x-l::form-btn>
        Добавить
    </x-l::form-btn>
    <a href="{{ route('app.car-manufacturer.index') }}" class="formFormA">
        Назад
    </a>
</x-l-layout::form>
