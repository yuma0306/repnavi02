<form {{ $attributes->merge([ 'class' => 'flex flex-col items-end']) }}>
    {{ $slot }}
</form>
