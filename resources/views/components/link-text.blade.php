<a {{ $attributes->merge(['class' => 'flex gap-1.5 duration-200 w-fit hover:opacity-80']) }}>
    <img class="relative top-[3px] w-[18px] h-[18px]" src="{{ asset('img/icon-arrow-circle.svg') }}" alt="">
    <span class="flex-1 text-[15px] text-teal-600 font-bold">{{ $slot }}</span>
</a>
