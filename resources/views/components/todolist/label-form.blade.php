@props([
    "title",
    "input_name"
])

<label class="grid gap-4">
    <p class="text-xl">{{ $title }}</p>
    <input
        id="js-form-{{ $input_name }}"
        type="text" name="{{ $input_name }}" class="w-full"
        value="{{ old('title') }}"
    >
    <div class="js-errMsg">
        @error($input_name)
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
    </div>
</label>