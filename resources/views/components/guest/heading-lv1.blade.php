<h1 {{ $attributes->merge(['class' =>'relative bg-orange-50 drop-shadow-sm [&+*]:mt-12']) }}>
    <span class="block relative container m-auto py-10 px-4 font-bold text-2xl before:absolute before:bottom-[1px] before:left-4 before:w-0 before:h-0 before:border-solid before:border-[25px] before:border-b-0 before:border-color before:border-transparent before:border-t-orange-50 before:translate-y-full before:content-['']">
        {{ $slot }}
    </span>
</h1>


