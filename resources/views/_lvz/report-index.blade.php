<x-l-layout::form :action="route('app.report.store')">
    <x-slot:title>
        Создание отчета
    </x-slot:title>
    <x-slot:header_info>
        Создание отчета
    </x-slot:header_info>
    <p class="formFormP">
        Начало
    </p>
    <x-l::form-input-error :messages="$errors->get('reportStart')"/>
    <x-l::form-input name="reportStart" type="datetime-local" :value="old('reportStart')"/>
    <p class="formFormP">
        Конец
    </p>
    <x-l::form-input-error :messages="$errors->get('reportEnd')"/>
    <x-l::form-input name="reportEnd" type="datetime-local" :value="old('reportEnd')"/>
    <p class="formFormP">
        Пользователь
    </p>
    <x-l::form-input-error :messages="$errors->get('reportUserId')"/>
    <x-l::form-select id="user" name="reportUserId">
        <option></option>
        @foreach($users as $user)
            <option value="{{ $user->id }}" {{ $user->id == old('reportUserId') ? 'selected' : '' }}>[{{ $user->id }}] {{ $user->name }}</option>
        @endforeach
    </x-l::form-select>
    <p class="formFormP">
        Автомобиль
    </p>
    <x-l::form-input-error :messages="$errors->get('reportCarId')"/>
    <x-l::form-select id="car" name="reportCarId">
        <option></option>
        @foreach($cars as $car)
            <option value="{{ $car->id }}" {{ $car->id == old('reportCarId') ? 'selected' : '' }}>[{{ $car->id }}] {{ $car->manufacturer->mark }} - {{ $car->number }}</option>
        @endforeach
    </x-l::form-select>
    <p class="formFormP">
        От
    </p>
    <x-l::form-input-error :messages="$errors->get('reportPointA')"/>
    <x-l::form-select name="reportPointA">
        <option></option>
        @foreach($aPoints as $point)
            <option value="{{ $point }}" {{ $point == old('reportPointA') ? 'selected' : '' }}>{{ $point }}</option>
        @endforeach
    </x-l::form-select>
    <p class="formFormP">
        До
    </p>
    <x-l::form-input-error :messages="$errors->get('reportPointB')"/>
    <x-l::form-select name="reportPointB">
        <option></option>
        @foreach($bPoints as $point)
            <option value="{{ $point }}" {{ $point == old('reportPointB') ? 'selected' : '' }}>{{ $point }}</option>
        @endforeach
    </x-l::form-select>
    <x-l::form-btn>
        Получить
    </x-l::form-btn>
    <a href="/" class="formFormA">
        Назад
    </a>
</x-l-layout::form>
