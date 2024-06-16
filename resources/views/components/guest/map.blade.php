<div {{ $attributes->merge(['class' => 'w-full aspect-video overflow-hidden [&>iframe]:w-full [&>iframe]:h-full']) }}>
    {{ $slot }}
</div>
