<form {{ $attributes->merge([ 'class' => 'grid gap-5 bg-white py-10 px-5 rounded border-2 js-form']) }}>
    {{ $slot }}
</form>
