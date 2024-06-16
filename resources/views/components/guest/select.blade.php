<select {{ $attributes->merge(['class' => 'py-[8px] pl-[12px] pr-[12px] w-full h-14 text-teal-600 bg-white font-bold border-b-2 border-solid text-center rounded duration-200 cursor-pointer border-teal-600 focus:border-teal-600 outline-none focus:shadow-none focus:ring-0']) }}>
    {{ $slot }}
</select>
