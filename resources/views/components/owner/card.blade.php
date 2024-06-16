@props([
    'src',
    'alt'
])

<div class="px-8 pt-8 pb-[80px] bg-white rounded border-2 relative overflow-hidden">
    {{ $slot }}
    @if(isset($src) && isset($alt))
        <img class="absolute bottom-[-8px] right-[30px] w-[100px] h-[100px] object-cover" src="{{ $src }}" alt="{{ $alt }}">
    @endif
</div>
