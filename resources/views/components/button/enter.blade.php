@props([
    'label',
    'id',
])

<button 
    type="button"
    id="{{ $id }}"
    class="btn inline-flex items-center mt-5 px-10 py-2.5 bg-theme-main text-white text-sm rounded-full shadow-md">
    {{ $label }}
</button>