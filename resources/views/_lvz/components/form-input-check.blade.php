<style>
    .formFormBox * {
        display: inline;
    }
</style>
<div {{ $attributes }} class="formFormBox">
    <input type="checkbox" class="formFormBoxCheck">
    <p>{{ $slot }}</p>
</div>
