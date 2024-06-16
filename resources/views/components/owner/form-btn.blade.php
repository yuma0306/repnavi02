<button {{ $attributes->merge(['class' => 'grid place-content-center w-full max-w-[400px] p-4 bg-teal-600 text-white font-bold border-b-2 border-green-800 border-solid text-center rounded duration-200 hover:opacity-80']) }} >
    {{ $slot }}
</button>

