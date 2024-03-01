<x-l-layout::form :action="route('register')">
    <x-slot:title>
        Регистрация
    </x-slot:title>
    <x-slot:header_info>
        Регистрация в приложении
    </x-slot:header_info>
    <x-l::form-input-error :messages="$errors->get('registerName')"/>
    <x-l::form-input name="registerName" type="text" placeholder="Имя"/>
    <x-l::form-input-error :messages="$errors->get('registerEmail')"/>
    <x-l::form-input name="registerEmail" type="text" placeholder="Email"/>
    <x-l::form-input-error :messages="$errors->get('registerPassword')"/>
    <x-l::form-input name="registerPassword" type="password" placeholder="Пароль"/>
    <x-l::form-input-error :messages="$errors->get('registerPassword_confirmation')"/>
    <x-l::form-input name="registerPassword_confirmation" type="password" placeholder="Пароль"/>

    <x-l::form-btn>
        Регистрация
    </x-l::form-btn>
    <a href="{{ route('login') }}" class="formFormA">
        Вход
    </a>
</x-l-layout::form>
