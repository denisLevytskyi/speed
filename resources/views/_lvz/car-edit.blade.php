<x-l-layout::form :action="route('app.car.update', $car->id)">
    @method('put')
    <x-slot:title>
        Обновление автомобиля
    </x-slot:title>
    <x-slot:header_info>
        Создание автомобиля
    </x-slot:header_info>
    <pre class="productFormP">Запись №: {{ $car->id }}</pre>
    <pre class="productFormP">Добавлена пользователем: {{ $car->user_id }}</pre>
    <br>
    <p class="formFormP">
        Производитель
    </p>
    <x-l::form-input-error :messages="$errors->get('carEditManufacturerId')"/>
    <x-l::form-select name="carEditManufacturerId">
        <option value=""></option>
        @foreach($manufacturers as $manufacturer)
            <option value="{{ $manufacturer->id }}" {{ !($manufacturer->id == $car->manufacturer_id) ?: 'selected' }}>{{ $manufacturer->mark }}</option>
        @endforeach
    </x-l::form-select>
    <p class="formFormP">
        Модель
    </p>
    <x-l::form-input-error :messages="$errors->get('carEditModel')"/>
    <x-l::form-input name="carEditModel" type="text" :value="$car->model"/>
    <p class="formFormP">
        Государственный номер
    </p>
    <x-l::form-input-error :messages="$errors->get('carEditNumber')"/>
    <x-l::form-input name="carEditNumber" type="text" :value="$car->number"/>
    <p class="formFormP">
        Цвет
    </p>
    <x-l::form-input-error :messages="$errors->get('carEditColor')"/>
    <x-l::form-input name="carEditColor" type="text" :value="$car->color"/>
    <p class="formFormP">
        Топливо
    </p>
    <x-l::form-input-error :messages="$errors->get('carEditFuel')"/>
    <x-l::form-select name="carEditFuel">
        <option value="Газ" {{ $car->fuel == 'Газ' ? 'selected' : '' }}>Газ</option>
        <option value="Бензин" {{ $car->fuel == 'Бензин' ? 'selected' : '' }}>Бензин</option>
        <option value="Дизель" {{ $car->fuel == 'Дизель' ? 'selected' : '' }}>Дизель</option>
    </x-l::form-select>
    <p class="formFormP">
        Год выпуска
    </p>
    <x-l::form-input-error :messages="$errors->get('carEditYear')"/>
    <x-l::form-input name="carEditYear" type="number" min="1900" max="2030" step="1" :value="$car->year"/>
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
