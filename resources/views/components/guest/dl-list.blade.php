@props([
    'term'
])

<dl {{ $attributes->merge(['class' => 'flex flex-wrap border-b p-4 gap-1.5']) }}>
    <dt class="w-56 font-bold text-lg">{{ $term }}</dt>
    <dd class="text-lg min-w-[75%]">
        {{ $slot }}
    </dd>
</dl>
