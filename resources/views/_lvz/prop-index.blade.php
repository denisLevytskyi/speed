<x-l-layout::form :action="route('app.prop.store')">
    <x-slot:title>
        Обновление свойств
    </x-slot:title>
    <x-slot:header_info>
        Обновление свойств
    </x-slot:header_info>
    <p class="formFormP">
        ОТОБРАЖЕНИЕ
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
        ПН
    </p>
    <x-l::form-input-error :messages="$errors->get('propEditPn')"/>
    <x-l::form-input name="propEditPn" type="text" :value="old('propEditPn', $prop->getProp('show_pn'))"/>
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
        ЗАПИСЬ
    </p>
    <p class="formFormP">
        Максимальная скорость, км/ч
    </p>
    <x-l::form-input-error :messages="$errors->get('propEditSpeed')"/>
    <x-l::form-input name="propEditSpeed" type="number" :value="old('propEditSpeed', $prop->getProp('drive_speed'))"/>
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
    <x-l::form-btn>
        Обновить
    </x-l::form-btn>
    <a href="/" class="formFormA">
        Назад
    </a>
</x-l-layout::form>
