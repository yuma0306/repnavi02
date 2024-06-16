@props([
    'src',
    'alt',
    'title',
])

<li class="grid sm:grid-cols-2 gap-5 bg-white p-5 border-2 rounded">
    <div>
        @if(isset($tag))
            {{ $tag }}
        @endif
        <img class="xl:w-[300px] w-full aspect-video object-cover rounded mt-3" src="{{ $src }}" alt="{{ $alt }}">
    </div>
    <div class="grid gap-3 self-start">
        <p class="font-bold">{{ $title }}</p>
        {{ $slot }}
    </div>
</li>
