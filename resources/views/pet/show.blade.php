@php
    $breads = [
        ['label' => 'トップ', 'url' => '/'],
        ['label' => '生体一覧', 'url' => '/pet'],
        ['label' => "{$pet->title}", 'url' => ''],
    ];
@endphp

<!DOCTYPE html>
<html lang="ja">
<x-meta.head title="{{ $pet->title }}" desc="{{ $pet->title }}。">
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide-core.min.css" rel="stylesheet">
</x-meta.head>
<x-body>
    <x-guest.wrapper >
        <x-header />
        <x-guest.heading-lv1>{{ $pet->title }}</x-guest.heading-lv1>
        <x-guest.inner>
            <x-breadcrumb :breads="$breads" />
        </x-guest.inner>
        <x-guest.main>
            <x-guest.inner>
                @if($pet->pet_image1 || $pet->pet_image2 || $pet->pet_image3 ||  $pet->pet_image4)
                    <x-guest.slider>
                        @for($i = 1; $i <= 4; $i++)
                            @php
                                $imageVar = "pet_image{$i}";
                            @endphp
                            @if($pet->$imageVar)
                                <li class="splide__slide">
                                    <img class="w-full h-full rounded object-cover" src="{{ asset('storage/' . $pet->$imageVar) }}" alt="">
                                </li>
                            @endif
                        @endfor
                    </x-guest.slider>
                    <x-guest.pager-slider>
                        @for($i = 1; $i <= 4; $i++)
                            @php
                                $imageVar = "pet_image{$i}";
                            @endphp
                            @if($pet->$imageVar)
                                <li class="splide__slide max-w-[calc(25%-8px)]">
                                    <img class="w-full h-full rounded object-cover" src="{{ asset('storage/' . $pet->$imageVar) }}" alt="">
                                </li>
                            @endif
                        @endfor
                    </x-guest.pager-slider>
                @endif
                @if($pet->description)
                    <x-guest.heading-lv2>ショップからのコメント</x-guest.heading-lv2>
                    <p>{{ $pet->description }}</p>
                @endif
                <x-btn class="max-w-[400px] mt-8 mx-auto" href="/shop/{{ $pet->shop_id }}">
                    ショップページへ
                </x-btn>
                <x-guest.heading-lv2>生体詳細</x-guest.heading-lv2>
                @if($pet->category)
                    <x-guest.dl-list class="pt-0" term="カテゴリー">
                        <x-link-text02 href="/pet/?category={{ $pet->category }}">
                            {{ $pet->category }}
                        </x-link-text02>
                    </x-guest.dl-list>
                @endif
                @if($pet->species)
                    <x-guest.dl-list term="種名">
                        {{ $pet->species }}
                    </x-guest.dl-list>
                @endif
                @if($pet->morph)
                    <x-guest.dl-list term="モルフ">
                        {{ $pet->morph }}
                    </x-guest.dl-list>
                @endif
                @if($pet->sex)
                    <x-guest.dl-list term="性別">
                        {{ $pet->sex }}
                    </x-guest.dl-list>
                @endif
                @if($pet->age)
                    <x-guest.dl-list term="年齢">
                        {{ $pet->age }}
                    </x-guest.dl-list>
                @endif
                @if($pet->handling_goods)
                    <x-guest.dl-list term="取扱い商品">
                        {{ $pet->handling_goods }}
                    </x-guest.dl-list>
                @endif
                @if($pet->size)
                    <x-guest.dl-list term="大きさ">
                        {{ $pet->size }}
                    </x-guest.dl-list>
                @endif
                @if($pet->weight)
                    <x-guest.dl-list term="体重">
                        {{ $pet->weight }}
                    </x-guest.dl-list>
                @endif
                @if($pet->arrival_day)
                    <x-guest.dl-list term="入荷日">
                        {{ $pet->arrival_day }}
                    </x-guest.dl-list>
                @endif
                @if($pet->price)
                    <x-guest.dl-list term="値段">
                        {{ $pet->price }}
                    </x-guest.dl-list>
                @endif
            </x-guest.inner>
        </x-guest.main>
        <x-footer />
    </x-guest.wrapper>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script src="{{ asset('js/slider.js') }}"></script>
</x-body>
</html>
