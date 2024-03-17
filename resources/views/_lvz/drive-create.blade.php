<x-l-layout::form :action="route('app.drive.store')">
    <x-slot:title>
        Создание поездки
    </x-slot:title>
    <x-slot:header_info>
        Создание поездки
    </x-slot:header_info>
    <p class="formFormP">
        Автомобиль
    </p>
    <x-l::form-input-error :messages="$errors->get('driveCreateCarId')"/>
    <x-l::form-select name="driveCreateCarId">
        <option value=""></option>
        @foreach($cars as $car)
            <option value="{{ $car->id }}" {{ !($car->id == old('driveCreateCarId')) ?: 'selected' }}>{{ $car->manufacturer->mark . ' ' . $car->number }}</option>
        @endforeach
    </x-l::form-select>
    <p class="formFormP">
        От
    </p>
    <x-l::form-input-error :messages="$errors->get('driveCreatePointA')"/>
    <x-l::form-input name="driveCreatePointA" type="text" :value="old('driveCreatePointA')"/>
    <p class="formFormP">
        До
    </p>
    <x-l::form-input-error :messages="$errors->get('driveCreatePointB')"/>
    <x-l::form-input name="driveCreatePointB" type="text" :value="old('driveCreatePointB')"/>
    <p class="formFormP">
        Показание одометра
    </p>
    <x-l::form-input-error :messages="$errors->get('driveCreateOdometer')"/>
    <x-l::form-input name="driveCreateOdometer" type="number" min="0" max="100000" step="1" :value="old('driveCreateOdometer')"/>
    <x-l::form-btn>
        Добавить
    </x-l::form-btn>
    <a href="{{ route('app.drive.index') }}" class="formFormA">
        Назад
    </a>
</x-l-layout::form>
