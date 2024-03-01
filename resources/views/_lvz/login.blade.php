<x-l-layout::form :action="route('login')">
    <x-l::form-input-error :messages="$errors->get('loginEmail')"/>
    <x-l::form-input name="loginEmail" type="text" placeholder="Email"/>
    <x-l::form-input-error :messages="$errors->get('loginPassword')"/>
    <x-l::form-input name="loginPassword" type="password" placeholder="Пароль"/>
    <x-l::form-input-check name="loginRemember">
        Запомнить меня
    </x-l::form-input-check>
    <x-l::form-btn>
        Вход
    </x-l::form-btn>
</x-l-layout::form>
