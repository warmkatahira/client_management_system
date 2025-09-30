<div class="flex flex-row justify-between w-full">
    <div class="flex items-center gap-3">
        <p class="text-lg">{{ $termNumber.'期'.$label }}</p>
    </div>
    <div class="flex items-end">
        <p class="text-3xl font-extrabold">{{ number_format($amount) }}</p>
        <span class="text-sm ml-2">円</span>
    </div>
</div>