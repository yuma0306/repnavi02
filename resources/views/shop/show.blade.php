@php
    $breads = [
        ['label' => 'トップ', 'url' => '/'],
        ['label' => 'ショップ一覧', 'url' => '/shop'],
        ['label' => "{$shop->shop_name}", 'url' => ''],
    ];
@endphp

<!DOCTYPE html>
<html lang="ja">
<x-meta.head title="{{ $shop->shop_name }}" desc="{{ $shop->shop_name }}。">
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide-core.min.css" rel="stylesheet">
</x-meta.head>
<x-body>
    <x-guest.wrapper >
        <x-header />
        <x-guest.heading-lv1>{{ $shop->shop_name }}</x-guest.heading-lv1>
        <x-guest.inner>
            <x-breadcrumb :breads="$breads" />
        </x-guest.inner>
        <x-guest.main>
            <x-guest.inner>
                @if($shop->shop_image1 || $shop->shop_image2 || $shop->shop_image3 ||  $shop->shop_image4)
                    <x-guest.slider>
                        @for($i = 1; $i <= 4; $i++)
                            @php
                                $imageVar = "shop_image{$i}";
                            @endphp
                            @if($shop->$imageVar)
                                <li class="splide__slide">
                                    <img class="w-full h-full rounded object-cover" src="{{ asset('storage/' . $shop->$imageVar) }}" alt="">
                                </li>
                            @endif
                        @endfor
                    </x-guest.slider>
                    <x-guest.pager-slider>
                        @for($i = 1; $i <= 4; $i++)
                            @php
                                $imageVar = "shop_image{$i}";
                            @endphp
                            @if($shop->$imageVar)
                                <li class="splide__slide max-w-[calc(25%-8px)]">
                                    <img class="w-full h-full rounded object-cover" src="{{ asset('storage/' . $shop->$imageVar) }}" alt="">
                                </li>
                            @endif
                        @endfor
                    </x-guest.pager-slider>
                @endif
                @if($shop->description)
                    <x-guest.heading-lv2>ショップ紹介</x-guest.heading-lv2>
                    <p>{{ $shop->description }}</p>
                @endif
                <x-btn class="max-w-[400px] mt-8 mx-auto" href="/pet/?shop={{ $shop->id }}">このショップの生体一覧</x-btn>
                <x-guest.heading-lv2>ショップ詳細</x-guest.heading-lv2>
                @if($shop->website)
                    <x-guest.dl-list class="pt-0" term="公式サイト">
                        <x-link-text02 href="{{ $shop->website }}">
                            {{ $shop->website }}
                        </x-link-text02>
                    </x-guest.dl-list>
                @endif
                @if($shop->phone)
                    <x-guest.dl-list term="電話番号">
                        <x-link-text02 href="tel:{{ $shop->phone }}">
                            {{ $shop->phone }}
                        </x-link-text02>
                    </x-guest.dl-list>
                @endif
                @if($shop->business_hours)
                    <x-guest.dl-list term="営業時間">
                        {{ $shop->business_hours }}
                    </x-guest.dl-list>
                @endif
                @if($shop->regular_holiday)
                    <x-guest.dl-list term="定休日">
                        {{ $shop->regular_holiday }}
                    </x-guest.dl-list>
                @endif
                @if($shop->animal_handler)
                    <x-guest.dl-list term="動物取扱責任者">
                        {{ $shop->animal_handler }}
                    </x-guest.dl-list>
                @endif
                @if($shop->handling_goods)
                    <x-guest.dl-list term="取扱い商品">
                        {{ $shop->handling_goods }}
                    </x-guest.dl-list>
                @endif
                @if($shop->handling_pets)
                    <x-guest.dl-list term="取扱い動物">
                        {{ $shop->handling_pets }}
                    </x-guest.dl-list>
                @endif
                @if($shop->handling_live_feeds)
                    <x-guest.dl-list term="取扱い活餌">
                        {{ $shop->handling_live_feeds }}
                    </x-guest.dl-list>
                @endif
                @if($shop->handling_frozen_feeds)
                    <x-guest.dl-list term="取扱い冷凍餌">
                        {{ $shop->handling_frozen_feeds }}
                    </x-guest.dl-list>
                @endif
                @if($shop->handling_dried_feeds)
                    <x-guest.dl-list term="取扱い乾燥餌">
                        {{ $shop->handling_dried_feeds }}
                    </x-guest.dl-list>
                @endif
                @if($shop->handling_artificial_feeds)
                    <x-guest.dl-list term="取扱い人工餌">
                        {{ $shop->handling_artificial_feeds }}
                    </x-guest.dl-list>
                @endif
                @if($shop->pref)
                    <x-guest.dl-list term="都道府県">
                        <x-link-text02 href="/shop?pref={{ $shop->pref }}">
                             {{ $shop->pref }}
                        </x-link-text02>
                    </x-guest.dl-list>
                @endif
                @if($shop->postal_code)
                    <x-guest.dl-list term="郵便番号">
                        {{ $shop->postal_code }}
                    </x-guest.dl-list>
                @endif
                @if($shop->address)
                    <x-guest.dl-list term="住所">
                        {{ $shop->address }}
                    </x-guest.dl-list>
                @endif
                @if($shop->access_method)
                    <x-guest.dl-list term="アクセス">
                        {{ $shop->access_method }}
                    </x-guest.dl-list>
                @endif
                @if($shop->map)
                    <x-guest.map class="mt-5">
                        {!! $shop->map !!}
                    </x-guest.map>
                @endif
            </x-guest.inner>
        </x-guest.main>
        <x-footer />
    </x-guest.wrapper>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script src="{{ asset('js/slider.js') }}"></script>
</x-body>
</html>
