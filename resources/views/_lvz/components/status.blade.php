@if ($message)
    <style>
        .status .container {
            background: green;
            text-align: center;
            color: white;
        }
    </style>
    <section class="status">
        <div class="container typicalContainer">
            <p {{ $attributes }} class="statusP">
                @lang($message)
            </p>
        </div>
    </section>
@endif

