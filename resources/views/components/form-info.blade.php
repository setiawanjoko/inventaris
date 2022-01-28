<p class="mt-2 text-sm text-gray-500">
    {{ $slot }}
    @error($formName)
        <span class="text-rose-600">{{ $errors->first($formName) }}</span>
    @enderror
</p>
