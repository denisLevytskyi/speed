<x-l-layout::form :action="route('app.car.update', $car->id)">
    @method('put')
    <x-slot:title>
        Обновление автомобиля
    </x-slot:title>
    <x-slot:header_info>
        Обновление автомобиля
    </x-slot:header_info>
    <pre class="productFormP">Запись №: {{ $car->id }}</pre>
    <pre class="productFormP">Добавлена: [{{ $car->user_id }}] {{ $car->user->name }}</pre>
    <br>
    <p class="formFormP">
        Производитель
    </p>
    <x-l::form-input-error :messages="$errors->get('carEditManufacturerId')"/>
    <x-l::form-select name="carEditManufacturerId">
        <option value=""></option>
        @foreach($manufacturers as $manufacturer)
            <option value="{{ $manufacturer->id }}" {{ $manufacturer->id == old('carEditManufacturerId', $car->manufacturer_id) ? 'selected' : '' }}>{{ $manufacturer->mark }}</option>
        @endforeach
    </x-l::form-select>
    <p class="formFormP">
        Модель
    </p>
    <x-l::form-input-error :messages="$errors->get('carEditModel')"/>
    <x-l::form-input name="carEditModel" type="text" :value="old('carEditModel', $car->model)"/>
    <p class="formFormP">
        Государственный номер
    </p>
    <x-l::form-input-error :messages="$errors->get('carEditNumber')"/>
    <x-l::form-input name="carEditNumber" type="text" :value="old('carEditNumber', $car->number)"/>
    <p class="formFormP">
        Цвет
    </p>
    <x-l::form-input-error :messages="$errors->get('carEditColor')"/>
    <x-l::form-input name="carEditColor" type="text" :value="old('carEditColor', $car->color)"/>
    <p class="formFormP">
        Топливо
    </p>
    <x-l::form-input-error :messages="$errors->get('carEditFuel')"/>
    <x-l::form-select name="carEditFuel">
        <option value=""></option>
        <option value="Газ" {{ old('carEditFuel', $car->fuel) == 'Газ' ? 'selected' : '' }}>Газ</option>
        <option value="Бензин" {{ old('carEditFuel', $car->fuel) == 'Бензин' ? 'selected' : '' }}>Бензин</option>
        <option value="Дизель" {{ old('carEditFuel', $car->fuel) == 'Дизель' ? 'selected' : '' }}>Дизель</option>
    </x-l::form-select>
    <p class="formFormP">
        Год выпуска
    </p>
    <x-l::form-input-error :messages="$errors->get('carEditYear')"/>
    <x-l::form-input name="carEditYear" type="number" step="1" :value="old('carEditYear', $car->year)"/>
    <p class="formFormP">
        Пробег
    </p>
    <x-l::form-input type="text" readonly :value="$car->odometer()"/>
    <x-l::form-btn>
        Обновить
    </x-l::form-btn>
    <a href="{{ route('app.car.index') }}" class="formFormA">
        Назад
    </a>
    <x-l::form-delete :action="route('app.car.destroy', $car->id)">
        Удалить
    </x-l::form-delete>
</x-l-layout::form>
