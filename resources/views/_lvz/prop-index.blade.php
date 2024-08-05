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
    <x-l::form-input-error :messages="$errors->get('propEditOrgName')"/>
    <x-l::form-input name="propEditOrgName" type="text" :value="old('propEditOrgName', $prop->getProp('show_org_name'))"/>
    <p class="formFormP">
        Название субъекта
    </p>
    <x-l::form-input-error :messages="$errors->get('propEditSubName')"/>
    <x-l::form-input name="propEditSubName" type="text" :value="old('propEditSubName', $prop->getProp('show_sub_name'))"/>
    <p class="formFormP">
        Адрес субъекта 1 строка
    </p>
    <x-l::form-input-error :messages="$errors->get('propEditSubAddress1')"/>
    <x-l::form-input name="propEditSubAddress1" type="text" :value="old('propEditSubAddress1', $prop->getProp('show_sub_address_1'))"/>
    <p class="formFormP">
        Адрес субъекта 2 строка
    </p>
    <x-l::form-input-error :messages="$errors->get('propEditSubAddress2')"/>
    <x-l::form-input name="propEditSubAddress2" type="text" :value="old('propEditSubAddress2', $prop->getProp('show_sub_address_2'))"/>
    <p class="formFormP">
        ИД
    </p>
    <x-l::form-input-error :messages="$errors->get('propEditId')"/>
    <x-l::form-input name="propEditId" type="text" :value="old('propEditId', $prop->getProp('show_id'))"/>
    <p class="formFormP">
        НН
    </p>
    <x-l::form-input-error :messages="$errors->get('propEditNn')"/>
    <x-l::form-input name="propEditNn" type="text" :value="old('propEditNn', $prop->getProp('show_nn'))"/>
    <p class="formFormP">
        Версия ПО
    </p>
    <x-l::form-input-error :messages="$errors->get('propEditVersion')"/>
    <x-l::form-input name="propEditVersion" type="text" :value="old('propEditVersion', $prop->getProp('show_version'))"/>
    <p class="formFormP">
        Сборка
    </p>
    <x-l::form-input-error :messages="$errors->get('propEditAssembly')"/>
    <x-l::form-input name="propEditAssembly" type="text" :value="old('propEditAssembly', $prop->getProp('show_assembly'))"/>
    <br>
    <p class="formFormP">
        <strong>
            ЗАПИСЬ
        </strong>
    </p>
    <p class="formFormP">
        Минимальная скорость, км/ч
    </p>
    <x-l::form-input-error :messages="$errors->get('propEditMinSpeed')"/>
    <x-l::form-input name="propEditMinSpeed" type="number" :value="old('propEditMinSpeed', $prop->getProp('drive_min_speed'))"/>
    <p class="formFormP">
        Максимальная скорость, км/ч
    </p>
    <x-l::form-input-error :messages="$errors->get('propEditMaxSpeed')"/>
    <x-l::form-input name="propEditMaxSpeed" type="number" :value="old('propEditMaxSpeed', $prop->getProp('drive_max_speed'))"/>
    <p class="formFormP">
        Интервал получения пакета, мс
    </p>
    <x-l::form-input-error :messages="$errors->get('propEditGetTime')"/>
    <x-l::form-input name="propEditGetTime" type="number" :value="old('propEditGetTime', $prop->getProp('drive_get_time'))"/>
    <p class="formFormP">
        Интервал отправки пакета, мс
    </p>
    <x-l::form-input-error :messages="$errors->get('propEditSendTime')"/>
    <x-l::form-input name="propEditSendTime" type="number" :value="old('propEditSendTime', $prop->getProp('drive_send_time'))"/>
    <p class="formFormP">
        Время ожидания ответа, мс
    </p>
    <x-l::form-input-error :messages="$errors->get('propEditTimeout')"/>
    <x-l::form-input name="propEditTimeout" type="number" :value="old('propEditTimeout', $prop->getProp('drive_timeout'))"/>
    <p class="formFormP">
        Допуск ошибок, шт
    </p>
    <x-l::form-input-error :messages="$errors->get('propEditError')"/>
    <x-l::form-input name="propEditError" type="number" :value="old('propEditError', $prop->getProp('drive_error'))"/>
    <br>
    <p class="formFormP">
        <strong>
            НАБЛЮДЕНИЕ
        </strong>
    </p>
    <p class="formFormP">
        Начальная широта
    </p>
    <x-l::form-input-error :messages="$errors->get('propEditLatitude')"/>
    <x-l::form-input name="propEditLatitude" type="number" step="0.000000000000001" :value="old('propEditLatitude', $prop->getProp('watch_latitude'))"/>
    <p class="formFormP">
        Начальная долгота
    </p>
    <x-l::form-input-error :messages="$errors->get('propEditLongitude')"/>
    <x-l::form-input name="propEditLongitude" type="number" step="0.000000000000001" :value="old('propEditLongitude', $prop->getProp('watch_longitude'))"/>
    <p class="formFormP">
        Интервал обновления, мс
    </p>
    <x-l::form-input-error :messages="$errors->get('propEditWatchTime')"/>
    <x-l::form-input name="propEditWatchTime" type="number" :value="old('propEditWatchTime', $prop->getProp('watch_time'))"/>
    <p class="formFormP">
        <strong>
            ПРИЛОЖЕНИЕ
        </strong>
    </p>
    <p class="formFormP">
        Выключить строгий режим
    </p>
    <x-l::form-input-error :messages="$errors->get('propEditAppMode')"/>
    <x-l::form-input name="propEditAppMode" type="number" :value="old('propEditAppMode', $prop->getProp('app_mode'))"/>
    <p class="formFormP">
        Разрешить регистрацию
    </p>
    <x-l::form-input-error :messages="$errors->get('propEditAppRegister')"/>
    <x-l::form-input name="propEditAppRegister" type="number" :value="old('propEditAppRegister', $prop->getProp('app_register'))"/>
    <x-l::form-btn>
        Обновить
    </x-l::form-btn>
    <a href="/" class="formFormA">
        Назад
    </a>
</x-l-layout::form>
