<x-l-layout::form :action="route('app.drive.store')">
    <x-slot:title>
        Создание поездки
    </x-slot:title>
    <x-slot:header_info>
        Создание поездки
    </x-slot:header_info>
    <x-slot:style>
        <link rel="stylesheet" href="{{ asset('css/lvz/form_drive.css') }}">
    </x-slot:style>
    <p class="formFormP">
        Автомобиль
    </p>
    <x-l::form-input-error :messages="$errors->get('driveCreateCarId')"/>
    <x-l::form-select id="car" name="driveCreateCarId">
        <option value=""></option>
        @foreach($cars as $car)
            <option value="{{ $car->id }}" {{ $car->id == old('driveCreateCarId') ? 'selected' : '' }}>{{ $car->manufacturer->mark . ' ' . $car->number }}</option>
        @endforeach
    </x-l::form-select>
    <p class="formFormP">
        От
    </p>
    <x-l::form-input-error :messages="$errors->get('driveCreatePointA')"/>
    <x-l::form-select id="pointA1" name="driveCreatePointA">
        <option value=""></option>
        <option value="else">Другое</option>
        @foreach($points as $point)
            <option value="{{ $point }}" {{ $point == old('driveCreatePointA') ? 'selected' : '' }}>{{ $point }}</option>
        @endforeach
    </x-l::form-select>
    <x-l::form-input id="pointA2" name="driveCreatePointA" type="text" :value="old('driveCreatePointA')" class="inactive" disabled/>
    <p class="formFormP">
        До
    </p>
    <x-l::form-input-error :messages="$errors->get('driveCreatePointB')"/>
    <x-l::form-select id="pointA3" name="driveCreatePointB">
        <option value=""></option>
        <option value="else">Другое</option>
        @foreach($points as $point)
            <option value="{{ $point }}" {{ $point == old('driveCreatePointB') ? 'selected' : '' }}>{{ $point }}</option>
        @endforeach
    </x-l::form-select>
    <x-l::form-input id="pointA4" name="driveCreatePointB" type="text" :value="old('driveCreatePointB')" class="inactive" disabled/>
    <p class="formFormP">
        Показание одометра
    </p>
    <x-l::form-input-error :messages="$errors->get('driveCreateOdometer')"/>
    <x-l::form-input id="odometer" name="driveCreateOdometer" type="number" :value="old('driveCreateOdometer')"/>
    <x-l::form-btn>
        Добавить
    </x-l::form-btn>
    <a href="{{ route('app.drive.index') }}" class="formFormA">
        Назад
    </a>
    <x-slot:after>
        <script>
            const pointA1 = document.getElementById('pointA1');
            const pointA2 = document.getElementById('pointA2');
            const pointA3 = document.getElementById('pointA3');
            const pointA4 = document.getElementById('pointA4');

            const replace = (point1, point2) => {
                point1.classList.add('inactive');
                point1.setAttribute('disabled', 'disabled');
                point2.classList.remove('inactive');
                point2.removeAttribute('disabled');
            };

            pointA1.addEventListener('input', () => {
                if (pointA1.value === 'else') {
                    replace(pointA1, pointA2);
                }
            });

            pointA3.addEventListener('input', () => {
                if (pointA3.value === 'else') {
                    replace(pointA3, pointA4);
                }
            });

            const car = document.getElementById('car');
            const odometer = document.getElementById('odometer');
            const odometerData = {
                @foreach($cars as $car)
                    {{ $car->id }}: {{ $car->odometer() }},
                @endforeach
            }

            car.addEventListener('change', () => {
                if (car.value in odometerData) {
                    odometer.value = odometerData[car.value];
                } else {
                    odometer.value = null;
                }
            });
        </script>
    </x-slot:after>
</x-l-layout::form>
