@props([
    'src',
    'tag',
])

<a {{ $attributes->merge(['class' => 'flex flex-col relative duration-200 overflow-hidden hover:opacity-80']) }}>
    <img src="{{ asset('storage/' . $src) }}" loading="lazy" alt="" class="aspect-video object-cover object-center overflow-y-hidden rounded">
    <span class="absolute top-0 left-0 block w-fit p-2 rounded-br rounded-tl font-medium bg-teal-600 text-white text-[14px]">{{ $tag }}</span>
    <p class="grid items-center flex-1 mt-4 p-3 font-medium border-t border-b border-gray-400 text-center">{{ $slot }}</p>
</a>
