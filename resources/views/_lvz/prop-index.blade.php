<x-l-layout::form :action="route('app.prop.store')">
    <x-slot:title>
        Обновление свойств
    </x-slot:title>
    <x-slot:header_info>
        Обновление свойств
    </x-slot:header_info>
    <p class="formFormP">
        Название организации
    </p>
    <x-l::form-input-error :messages="$errors->get('propEditOrgName')"/>
    <x-l::form-input name="propEditOrgName" type="text" :value="old('propEditOrgName', $prop->getProp('org_name'))"/>
    <p class="formFormP">
        Название субъекта
    </p>
    <x-l::form-input-error :messages="$errors->get('propEditSubName')"/>
    <x-l::form-input name="propEditSubName" type="text" :value="old('propEditSubName', $prop->getProp('sub_name'))"/>
    <p class="formFormP">
        Адрес субъекта 1 строка
    </p>
    <x-l::form-input-error :messages="$errors->get('propEditSubAddress1')"/>
    <x-l::form-input name="propEditSubAddress1" type="text" :value="old('propEditSubAddress1', $prop->getProp('sub_address_1'))"/>
    <p class="formFormP">
        Адрес субъекта 2 строка
    </p>
    <x-l::form-input-error :messages="$errors->get('propEditSubAddress2')"/>
    <x-l::form-input name="propEditSubAddress2" type="text" :value="old('propEditSubAddress2', $prop->getProp('sub_address_2'))"/>
    <p class="formFormP">
        ІД
    </p>
    <x-l::form-input-error :messages="$errors->get('propEditId')"/>
    <x-l::form-input name="propEditId" type="text" :value="old('propEditId', $prop->getProp('id'))"/>
    <p class="formFormP">
        ПН
    </p>
    <x-l::form-input-error :messages="$errors->get('propEditPn')"/>
    <x-l::form-input name="propEditPn" type="text" :value="old('propEditPn', $prop->getProp('pn'))"/>
    <p class="formFormP">
        Версия ПО
    </p>
    <x-l::form-input-error :messages="$errors->get('propEditVersion')"/>
    <x-l::form-input name="propEditVersion" type="text" :value="old('propEditVersion', $prop->getProp('version'))"/>
    <p class="formFormP">
        Сборка
    </p>
    <x-l::form-input-error :messages="$errors->get('propEditAssembly')"/>
    <x-l::form-input name="propEditAssembly" type="text" :value="old('propEditAssembly', $prop->getProp('assembly'))"/>
    <x-l::form-btn>
        Обновить
    </x-l::form-btn>
    <a href="/" class="formFormA">
        Назад
    </a>
</x-l-layout::form>
