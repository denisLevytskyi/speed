<style>
    .formFormRem {
        margin: auto auto 10px;
    }

    .formFormRem * {
        display: inline;
    }
</style>
<div {{ $attributes }} class="formFormRem">
    <input type="checkbox" class="formFormRemCheck">
    <p>{{ $slot }}</p>
</div>
