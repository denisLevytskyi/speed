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
    <x-l::form-input-error :messages="$errors->get('propShowOrgName')"/>
    <x-l::form-input name="propShowOrgName" type="text" :value="old('propShowOrgName', $prop->getProp('show_org_name'))"/>
    <p class="formFormP">
        Название субъекта
    </p>
    <x-l::form-input-error :messages="$errors->get('propShowSubName')"/>
    <x-l::form-input name="propShowSubName" type="text" :value="old('propShowSubName', $prop->getProp('show_sub_name'))"/>
    <p class="formFormP">
        Адрес субъекта 1 строка
    </p>
    <x-l::form-input-error :messages="$errors->get('propShowSubAddress1')"/>
    <x-l::form-input name="propShowSubAddress1" type="text" :value="old('propShowSubAddress1', $prop->getProp('show_sub_address_1'))"/>
    <p class="formFormP">
        Адрес субъекта 2 строка
    </p>
    <x-l::form-input-error :messages="$errors->get('propShowSubAddress2')"/>
    <x-l::form-input name="propShowSubAddress2" type="text" :value="old('propShowSubAddress2', $prop->getProp('show_sub_address_2'))"/>
    <p class="formFormP">
        ИД
    </p>
    <x-l::form-input-error :messages="$errors->get('propShowId')"/>
    <x-l::form-input name="propShowId" type="text" :value="old('propShowId', $prop->getProp('show_id'))"/>
    <p class="formFormP">
        НН
    </p>
    <x-l::form-input-error :messages="$errors->get('propShowNn')"/>
    <x-l::form-input name="propShowNn" type="text" :value="old('propShowNn', $prop->getProp('show_nn'))"/>
    <p class="formFormP">
        Версия ПО
    </p>
    <x-l::form-input-error :messages="$errors->get('propShowVersion')"/>
    <x-l::form-input name="propShowVersion" type="text" :value="old('propShowVersion', $prop->getProp('show_version'))"/>
    <p class="formFormP">
        Сборка
    </p>
    <x-l::form-input-error :messages="$errors->get('propShowAssembly')"/>
    <x-l::form-input name="propShowAssembly" type="text" :value="old('propShowAssembly', $prop->getProp('show_assembly'))"/>
    <br>
    <p class="formFormP">
        <strong>
            ЗАПИСЬ
        </strong>
    </p>
    <p class="formFormP">
        Минимальная скорость, км/ч
    </p>
    <x-l::form-input-error :messages="$errors->get('propDriveMinSpeed')"/>
    <x-l::form-input name="propDriveMinSpeed" type="number" :value="old('propDriveMinSpeed', $prop->getProp('drive_min_speed'))"/>
    <p class="formFormP">
        Максимальная скорость, км/ч
    </p>
    <x-l::form-input-error :messages="$errors->get('propDriveMaxSpeed')"/>
    <x-l::form-input name="propDriveMaxSpeed" type="number" :value="old('propDriveMaxSpeed', $prop->getProp('drive_max_speed'))"/>
    <p class="formFormP">
        Интервал получения пакета, мс
    </p>
    <x-l::form-input-error :messages="$errors->get('propDriveGetTime')"/>
    <x-l::form-input name="propDriveGetTime" type="number" :value="old('propDriveGetTime', $prop->getProp('drive_get_time'))"/>
    <p class="formFormP">
        Интервал отправки пакета, мс
    </p>
    <x-l::form-input-error :messages="$errors->get('propDriveSendTime')"/>
    <x-l::form-input name="propDriveSendTime" type="number" :value="old('propDriveSendTime', $prop->getProp('drive_send_time'))"/>
    <p class="formFormP">
        Время ожидания ответа, мс
    </p>
    <x-l::form-input-error :messages="$errors->get('propDriveTimeout')"/>
    <x-l::form-input name="propDriveTimeout" type="number" :value="old('propDriveTimeout', $prop->getProp('drive_timeout'))"/>
    <p class="formFormP">
        Допуск ошибок, шт
    </p>
    <x-l::form-input-error :messages="$errors->get('propDriveError')"/>
    <x-l::form-input name="propDriveError" type="number" :value="old('propDriveError', $prop->getProp('drive_error'))"/>
    <br>
    <p class="formFormP">
        <strong>
            НАБЛЮДЕНИЕ
        </strong>
    </p>
    <p class="formFormP">
        Начальная широта
    </p>
    <x-l::form-input-error :messages="$errors->get('propWatchLatitude')"/>
    <x-l::form-input name="propWatchLatitude" type="number" step="0.000000000000001" :value="old('propWatchLatitude', $prop->getProp('watch_latitude'))"/>
    <p class="formFormP">
        Начальная долгота
    </p>
    <x-l::form-input-error :messages="$errors->get('propWatchLongitude')"/>
    <x-l::form-input name="propWatchLongitude" type="number" step="0.000000000000001" :value="old('propWatchLongitude', $prop->getProp('watch_longitude'))"/>
    <p class="formFormP">
        Интервал обновления, мс
    </p>
    <x-l::form-input-error :messages="$errors->get('propWatchTime')"/>
    <x-l::form-input name="propWatchTime" type="number" :value="old('propWatchTime', $prop->getProp('watch_time'))"/>
    <br>
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
    <br>
    <p class="formFormP">
        <strong>
            СМС
        </strong>
    </p>
    <p class="formFormP">
        Шанс, %
    </p>
    <x-l::form-input-error :messages="$errors->get('propSmsChance')"/>
    <x-l::form-input name="propSmsChance" type="number" :value="old('propSmsChance', $prop->getProp('sms_chance'))"/>
    <p class="formFormP">
        Искать имя
    </p>
    <x-l::form-input-error :messages="$errors->get('propSmsName')"/>
    <x-l::form-input name="propSmsName" type="text" :value="old('propSmsName', $prop->getProp('sms_name'))"/>
    <p class="formFormP">
        Тема
    </p>
    <x-l::form-input-error :messages="$errors->get('propSmsSubject')"/>
    <x-l::form-input name="propSmsSubject" type="text" :value="old('propSmsSubject', $prop->getProp('sms_subject'))"/>
    <p class="formFormP">
        Линия 1
    </p>
    <x-l::form-input-error :messages="$errors->get('propSmsLine1')"/>
    <x-l::form-input name="propSmsLine1" type="text" :value="old('propSmsLine1', $prop->getProp('sms_line_1'))"/>
    <p class="formFormP">
        Линия 2
    </p>
    <x-l::form-input-error :messages="$errors->get('propSmsLine2')"/>
    <x-l::form-input name="propSmsLine2" type="text" :value="old('propSmsLine2', $prop->getProp('sms_line_2'))"/>
    <p class="formFormP">
        Линия 3
    </p>
    <x-l::form-input-error :messages="$errors->get('propSmsLine3')"/>
    <x-l::form-input name="propSmsLine3" type="text" :value="old('propSmsLine3', $prop->getProp('sms_line_3'))"/>
    <p class="formFormP">
        Случайные фразы
    </p>
    <x-l::form-input-error :messages="$errors->get('propSmsRandom')"/>
    <x-l::form-input name="propSmsRandom" type="text" :value="old('propSmsRandom', $prop->getProp('sms_line_random'))"/>
    <p class="formFormP">
        Разделитель фраз
    </p>
    <x-l::form-input-error :messages="$errors->get('propSmsSeparator')"/>
    <x-l::form-input name="propSmsSeparator" type="text" :value="old('propSmsSeparator', $prop->getProp('sms_line_separator'))"/>
    <x-l::form-btn>
        Обновить
    </x-l::form-btn>
    <a href="/" class="formFormA">
        Назад
    </a>
</x-l-layout::form>
