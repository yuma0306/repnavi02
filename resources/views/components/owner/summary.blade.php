@props([
    'title',
])

<details {{ $attributes->merge(['class' => 'block w-fit ml-auto mt-5']) }}>
    <summary class="cursor-pointer underline">{{ $title }}</summary>
    {{ $slot }}
</details>
