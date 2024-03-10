<x-l-layout::form :action="route('app.car.update', $car->id)">
    @method('put')
    <x-slot:title>
        Редактирование автомобиля
    </x-slot:title>
    <x-slot:header_info>
        Просмотр и редактирование автомобиля
    </x-slot:header_info>
    <pre class="productFormP">Запись №: {{ $car->id }}</pre>
    <pre class="productFormP">Добавлена пользователем: {{ $car->user_id }}</pre>
    <br>
    <p class="formFormP">
        Производитель
    </p>
    <x-l::form-input-error :messages="$errors->get('CarEditManufacturer')"/>
    <x-l::form-input name="CarEditManufacturer" type="text" :value="$car->manufacturer"/>
    <p class="formFormP">
        Модель
    </p>
    <x-l::form-input-error :messages="$errors->get('CarEditModel')"/>
    <x-l::form-input name="CarEditModel" type="text" :value="$car->model"/>
    <p class="formFormP">
        Государственный номер
    </p>
    <x-l::form-input-error :messages="$errors->get('CarEditNumber')"/>
    <x-l::form-input name="CarEditNumber" type="text" :value="$car->number"/>
    <p class="formFormP">
        Цвет
    </p>
    <x-l::form-input-error :messages="$errors->get('CarEditColor')"/>
    <x-l::form-input name="CarEditColor" type="text" :value="$car->color"/>
    <p class="formFormP">
        Топливо
    </p>
    <x-l::form-input-error :messages="$errors->get('CarEditFuel')"/>
    <x-l::form-select name="CarEditFuel">
        <option value="Газ" {{ $car->fuel == 'Газ' ? 'selected' : '' }}>Газ</option>
        <option value="Бензин" {{ $car->fuel == 'Бензин' ? 'selected' : '' }}>Бензин</option>
        <option value="Дизель" {{ $car->fuel == 'Дизель' ? 'selected' : '' }}>Дизель</option>
    </x-l::form-select>
    <p class="formFormP">
        Год выпуска
    </p>
    <x-l::form-input-error :messages="$errors->get('CarEditYear')"/>
    <x-l::form-input name="CarEditYear" type="number" min="1900" max="2030" step="1" :value="$car->year"/>
    <x-l::form-btn>
        Обновить
    </x-l::form-btn>
    <a href="" class="formFormA">
        Назад
    </a>
    <x-l::form-delete :action="route('app.car.destroy', ['car' => $car->id])">
        Удалить
    </x-l::form-delete>
</x-l-layout::form>
