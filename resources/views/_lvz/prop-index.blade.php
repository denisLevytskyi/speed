<x-l-layout::form :action="route('app.prop.store')">
    <x-slot:title>
        Обновление свойств
    </x-slot:title>
    <x-slot:header_info>
        Обновление свойств
    </x-slot:header_info>
    <p class="formFormP">
        <strong>
            ОТОБРАЖЕНИЕ
        </strong>
    </p>
    <p class="formFormP">
        Название организации
    </p>
    <x-l::form-input-error :messages="$errors->get('propOrgName')"/>
    <x-l::form-input name="propOrgName" type="text" :value="old('propOrgName', $prop->getProp('show_org_name'))"/>
    <p class="formFormP">
        Название субъекта
    </p>
    <x-l::form-input-error :messages="$errors->get('propSubName')"/>
    <x-l::form-input name="propSubName" type="text" :value="old('propSubName', $prop->getProp('show_sub_name'))"/>
    <p class="formFormP">
        Адрес субъекта 1 строка
    </p>
    <x-l::form-input-error :messages="$errors->get('propSubAddress1')"/>
    <x-l::form-input name="propSubAddress1" type="text" :value="old('propSubAddress1', $prop->getProp('show_sub_address_1'))"/>
    <p class="formFormP">
        Адрес субъекта 2 строка
    </p>
    <x-l::form-input-error :messages="$errors->get('propSubAddress2')"/>
    <x-l::form-input name="propSubAddress2" type="text" :value="old('propSubAddress2', $prop->getProp('show_sub_address_2'))"/>
    <p class="formFormP">
        ИД
    </p>
    <x-l::form-input-error :messages="$errors->get('propId')"/>
    <x-l::form-input name="propId" type="text" :value="old('propId', $prop->getProp('show_id'))"/>
    <p class="formFormP">
        НН
    </p>
    <x-l::form-input-error :messages="$errors->get('propNn')"/>
    <x-l::form-input name="propNn" type="text" :value="old('propNn', $prop->getProp('show_nn'))"/>
    <p class="formFormP">
        Версия ПО
    </p>
    <x-l::form-input-error :messages="$errors->get('propVersion')"/>
    <x-l::form-input name="propVersion" type="text" :value="old('propVersion', $prop->getProp('show_version'))"/>
    <p class="formFormP">
        Сборка
    </p>
    <x-l::form-input-error :messages="$errors->get('propAssembly')"/>
    <x-l::form-input name="propAssembly" type="text" :value="old('propAssembly', $prop->getProp('show_assembly'))"/>
    <br>
    <p class="formFormP">
        <strong>
            ЗАПИСЬ
        </strong>
    </p>
    <p class="formFormP">
        Минимальная скорость, км/ч
    </p>
    <x-l::form-input-error :messages="$errors->get('propMinSpeed')"/>
    <x-l::form-input name="propMinSpeed" type="number" :value="old('propMinSpeed', $prop->getProp('drive_min_speed'))"/>
    <p class="formFormP">
        Максимальная скорость, км/ч
    </p>
    <x-l::form-input-error :messages="$errors->get('propMaxSpeed')"/>
    <x-l::form-input name="propMaxSpeed" type="number" :value="old('propMaxSpeed', $prop->getProp('drive_max_speed'))"/>
    <p class="formFormP">
        Интервал получения пакета, мс
    </p>
    <x-l::form-input-error :messages="$errors->get('propGetTime')"/>
    <x-l::form-input name="propGetTime" type="number" :value="old('propGetTime', $prop->getProp('drive_get_time'))"/>
    <p class="formFormP">
        Интервал отправки пакета, мс
    </p>
    <x-l::form-input-error :messages="$errors->get('propSendTime')"/>
    <x-l::form-input name="propSendTime" type="number" :value="old('propSendTime', $prop->getProp('drive_send_time'))"/>
    <p class="formFormP">
        Время ожидания ответа, мс
    </p>
    <x-l::form-input-error :messages="$errors->get('propTimeout')"/>
    <x-l::form-input name="propTimeout" type="number" :value="old('propTimeout', $prop->getProp('drive_timeout'))"/>
    <p class="formFormP">
        Допуск ошибок, шт
    </p>
    <x-l::form-input-error :messages="$errors->get('propError')"/>
    <x-l::form-input name="propError" type="number" :value="old('propError', $prop->getProp('drive_error'))"/>
    <br>
    <p class="formFormP">
        <strong>
            НАБЛЮДЕНИЕ
        </strong>
    </p>
    <p class="formFormP">
        Начальная широта
    </p>
    <x-l::form-input-error :messages="$errors->get('propLatitude')"/>
    <x-l::form-input name="propLatitude" type="number" step="0.000000000000001" :value="old('propLatitude', $prop->getProp('watch_latitude'))"/>
    <p class="formFormP">
        Начальная долгота
    </p>
    <x-l::form-input-error :messages="$errors->get('propLongitude')"/>
    <x-l::form-input name="propLongitude" type="number" step="0.000000000000001" :value="old('propLongitude', $prop->getProp('watch_longitude'))"/>
    <p class="formFormP">
        Интервал обновления, мс
    </p>
    <x-l::form-input-error :messages="$errors->get('propWatchTime')"/>
    <x-l::form-input name="propWatchTime" type="number" :value="old('propWatchTime', $prop->getProp('watch_time'))"/>
    <p class="formFormP">
        <strong>
            ПРИЛОЖЕНИЕ
        </strong>
    </p>
    <p class="formFormP">
        Выключить строгий режим
    </p>
    <x-l::form-input-error :messages="$errors->get('propAppMode')"/>
    <x-l::form-input name="propAppMode" type="number" :value="old('propAppMode', $prop->getProp('app_mode'))"/>
    <p class="formFormP">
        Разрешить регистрацию
    </p>
    <x-l::form-input-error :messages="$errors->get('propAppRegister')"/>
    <x-l::form-input name="propAppRegister" type="number" :value="old('propAppRegister', $prop->getProp('app_register'))"/>
    <x-l::form-btn>
        Обновить
    </x-l::form-btn>
    <a href="/" class="formFormA">
        Назад
    </a>
</x-l-layout::form>
