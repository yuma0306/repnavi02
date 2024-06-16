@props(['breads'])

<ul class="flex items-center overflow-x-auto gap-2 whitespace-nowrap pb-4">
    @foreach($breads as $key => $item)
        @if($loop->last)
            <li>
                <span class="">{{ $item['label'] }}</span>
            </li>
        @else
            <li class="flex items-center gap-2">
                <a class="underline decoration-1 duration-200 hover:opacity-80" href="{{ $item['url'] }}">{{ $item['label'] }}</a>
                <svg class="h-5 w-5" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><polyline points="9 6 15 12 9 18" /></svg>
            </li>
        @endif
    @endforeach
</ul>
