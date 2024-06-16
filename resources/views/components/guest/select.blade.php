<select {{ $attributes->merge(['class' => 'grid place-content-center w-full h-14 p-0 text-teal-600 bg-white font-bold border-b-2 border-solid text-center rounded duration-200 cursor-pointer border-teal-600 focus:border-teal-600 outline-none focus:shadow-none']) }}>
    {{ $slot }}
</select>
