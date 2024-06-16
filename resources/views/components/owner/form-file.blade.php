<div {{ $attributes->merge([ 'class' => 'mt-3']) }}>
    <div class="grid gap-2">
        @if(isset($img))
            {{ $img }}
        @endif
        {{ $slot }}
    </div>
</div>
