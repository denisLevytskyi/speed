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
    <x-l::form-input name="reportStart" type="date" :value="old('reportStart')"/>
    <p class="formFormP">
        Конец
    </p>
    <x-l::form-input-error :messages="$errors->get('reportEnd')"/>
    <x-l::form-input name="reportEnd" type="date" :value="old('reportEnd')"/>
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
    <x-l::form-btn>
        Получить
    </x-l::form-btn>
    <a href="/" class="formFormA">
        Назад
    </a>
    <x-slot:after>
        <script>
            const user = document.getElementById('user');
            const car = document.getElementById('car');

            user.addEventListener('change', () => {
               car.value = null;
            });

            car.addEventListener('change', () => {
                user.value = null;
            });
        </script>
    </x-slot:after>
</x-l-layout::form>
