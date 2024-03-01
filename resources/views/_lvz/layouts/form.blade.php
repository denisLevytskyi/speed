<x-l-layout::main showAuth="no">
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
            padding: 10px;
            border-radius: 5px;
        }

        .formFormError {
            background: red;
            text-align: center;
            color: white;
            margin-bottom: 5px;
            padding: 5px;
            border-radius: 5px;
        }

        .formFormA {
            margin: 10px 0 auto auto;
            color: blue;
            cursor: pointer;
        }
    </style>
    <section class="form">
        <div class="container">
            <form action="{{ $action }}" method="{{ $method }}" class="formForm">
                @csrf
                {{ $slot }}
            </form>
        </div>
    </section>
</x-l-layout::main>
