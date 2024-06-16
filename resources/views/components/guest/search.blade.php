<form {{ $attributes->merge(['class' => 'relative flex w-full h-14 focus:border-teal-600 outline-none overflow-hidden']) }}>
    <input type="text" name="keyword" id="keyword" placeholder="{{ $placeholder }}" class="w-full border-teal-600 rounded focus:border-teal-600 outline-none focus:shadow-none focus:ring-0">
    <button type="submit" class="grid place-content-center w-14 h-full absolute top-0 right-0 bg-teal-600 border-teal-600 focus:border-teal-600 rounded-e">
        <svg class="text-white w-6 h-6" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z"/>
            <circle cx="10" cy="10" r="7" />  <line x1="21" y1="21" x2="15" y2="15" />
        </svg>
    </button>
</form>
