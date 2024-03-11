<x-l-layout::main showAuth="no" showStatus="no">
    <x-slot:title>
        {{ $title }}
    </x-slot:title>
    <x-slot:header_info>
        {{ $header_info }}
    </x-slot:header_info>
    <style>
        .formForm {
            display: flex;
            flex-direction: column;
            max-width: 400px;
            margin: auto;
            background: white;
            padding: 5px;
            border-radius: 5px;
        }

        .formFormError {
            background: #d32121;
            text-align: center;
            color: white;
            margin-bottom: 2px;
            padding: 2px;
            border-radius: 10px;
        }

        .formFormStatus {
            background: palegreen;
            text-align: center;
            color: white;
            margin-bottom: 2px;
            padding: 2px;
            border-radius: 10px;
        }

        .formFormA {
            margin: 5px 0 auto auto;
            cursor: pointer;
        }

        .formFormP {
            margin-bottom: 5px;
            text-align: justify;
        }

        .formFormBox * {
            display: inline;
        }
    </style>
    @isset($before)
        {{ $before }}
    @endisset
    <section class="form">
        <div class="container">
            <form action="{{ $action }}" method="{{ $method }}" class="formForm">
                @csrf
                <x-l::form-input-status :message="session('status')"/>
                <x-l::form-input-error :messages="$errors->get('status')"/>
                {{ $slot }}
            </form>
        </div>
    </section>
    @isset($after)
        {{ $after }}
    @endisset
</x-l-layout::main>
