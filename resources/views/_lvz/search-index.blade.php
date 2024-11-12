<x-l-layout::form :action="route('app.search.store')">
    <x-slot:title>
        Поиск
    </x-slot:title>
    <x-slot:header_info>
        Поиск
    </x-slot:header_info>
    <p class="formFormP">
        Начало
    </p>
    <x-l::form-input-error :messages="$errors->get('searchStart')"/>
    <x-l::form-input name="searchStart" type="datetime-local" :value="old('searchStart')"/>
    <p class="formFormP">
        Конец
    </p>
    <x-l::form-input-error :messages="$errors->get('searchEnd')"/>
    <x-l::form-input name="searchEnd" type="datetime-local" :value="old('searchEnd')"/>
    <p class="formFormP">
        Пользователь
    </p>
    <x-l::form-input-error :messages="$errors->get('searchUserId')"/>
    <x-l::form-select id="user" name="searchUserId">
        <option></option>
        @foreach($users as $user)
            <option value="{{ $user->id }}" {{ $user->id == old('searchUserId') ? 'selected' : '' }}>[{{ $user->id }}] {{ $user->name }}</option>
        @endforeach
    </x-l::form-select>
    <p class="formFormP">
        Автомобиль
    </p>
    <x-l::form-input-error :messages="$errors->get('searchCarId')"/>
    <x-l::form-select id="car" name="searchCarId">
        <option></option>
        @foreach($cars as $car)
            <option value="{{ $car->id }}" {{ $car->id == old('searchCarId') ? 'selected' : '' }}>[{{ $car->id }}] {{ $car->manufacturer->mark }} - {{ $car->number }}</option>
        @endforeach
    </x-l::form-select>
    <p class="formFormP">
        От
    </p>
    <x-l::form-input-error :messages="$errors->get('searchPointA')"/>
    <x-l::form-select name="searchPointA">
        <option></option>
        @foreach($aPoints as $point)
            <option value="{{ $point }}" {{ $point == old('searchPointA') ? 'selected' : '' }}>{{ $point }}</option>
        @endforeach
    </x-l::form-select>
    <p class="formFormP">
        До
    </p>
    <x-l::form-input-error :messages="$errors->get('searchPointB')"/>
    <x-l::form-select name="searchPointB">
        <option></option>
        @foreach($bPoints as $point)
            <option value="{{ $point }}" {{ $point == old('searchPointB') ? 'selected' : '' }}>{{ $point }}</option>
        @endforeach
    </x-l::form-select>
    <x-l::form-btn>
        Искать
    </x-l::form-btn>
    <a href="/" class="formFormA">
        Назад
    </a>
</x-l-layout::form>
