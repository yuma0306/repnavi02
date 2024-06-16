<button {{ $attributes->merge(['class' => 'grid place-content-center w-fit p-3 bg-rose-800 text-white font-bold border-b-2 border-rose-900 border-solid text-center rounded duration-200 hover:opacity-80']) }} >
    {{ $slot }}
</button>

