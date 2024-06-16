<div class="flex gap-3 items-center">
    @if(isset($tag))
        {{ $tag }}
    @endif
    <label {{ $attributes->merge([ 'class' => 'font-bold flex-1']) }}>{{ $slot }}</label>
</div>
