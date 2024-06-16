@props([
    'sub',
])

<a {{ $attributes->merge(['class' => 'relative aspect-square rounded overflow-hidden duration-200 bg-no-repeat bg-center bg-cover hover:opacity-80']) }}>
    <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-20 grid place-items-end">
        <div class="w-full text-center text-white py-4">
            <p class="mb-1 text-center">{{ $sub }}</p>
            <p class="text-lg font-bold">{{ $slot }}</p>
        </div>
    </div>
</a>
