@props([
    'label',
    'id',
    'required' => null,
    'value',
    'name',
    'label1',
    'label0',
    'tippy' => null,
])

<div class="flex flex-col">
    <label for="{{ $id }}" class="mb-1 pl-1 flex">
        <span>{{ $label }}</span>
        @if(!is_null($tippy))
            <i class="{{ $tippy }} las la-info-circle la-lg ml-1 pt-0.5"></i>
        @endif
        @if($required)
            <span class="ml-2 bg-red-600 text-white text-xs px-1.5 py-0.5">必須</span>
        @endif
    </label>
    <select id="{{ $id }}" name="{{ $name }}" class="w-1/2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        <option value="" @if((string)old($name, $value) === '') selected @endif></option>
        <option value="1" @if((string)old($name, $value) === '1') selected @endif>{{ $label1 }}</option>
        <option value="0" @if((string)old($name, $value) === '0') selected @endif>{{ $label0 }}</option>
    </select>
</div>