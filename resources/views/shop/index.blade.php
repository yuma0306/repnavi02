@php
    $prefList = [
        '北海道','青森県','岩手県','宮城県','秋田県','山形県','福島県','茨城県','栃木県','群馬県','埼玉県','千葉県','東京都','神奈川県','新潟県','富山県','石川県','福井県','山梨県','長野県','岐阜県','静岡県','愛知県','三重県','滋賀県','京都府','大阪府','兵庫県','奈良県','和歌山県','鳥取県','島根県','岡山県','広島県','山口県','徳島県','香川県','愛媛県','高知県','福岡県','佐賀県','長崎県','熊本県','大分県','宮崎県','鹿児島県','沖縄県',
    ];
    $breads = [
        ['label' => 'トップ', 'url' => '/'],
        ['label' => 'ショップ一覧', 'url' => ''],
    ];
@endphp
<!DOCTYPE html>
<html lang="ja">
<x-meta.head
    title="ショップ一覧"
    desc="ショップ一覧です。"
/>
<x-body>
    <x-guest.wrapper >
        <x-header />
        <x-guest.heading-lv1>
            @if(isset($pref))
                「{{$pref}}」のショップ一覧
            @elseif(isset($keyword))
                「{{$keyword}}」の検索結果
            @else
                ショップ一覧
            @endif
        </x-guest.heading-lv1>
        <x-guest.inner>
            @if(isset($pref))
                @php
                    $breadsPref = [
                        ['label' => 'トップ', 'url' => '/'],
                        ['label' => 'ショップ一覧', 'url' => '/shop/'],
                        ['label' => "「{$pref}」のショップ一覧", 'url' => ''],
                    ];
                @endphp
                <x-breadcrumb :breads="$breadsPref" />
            @elseif(isset($keyword))
                @php
                    $breadsKeyword = [
                        ['label' => 'トップ', 'url' => '/'],
                        ['label' => 'ショップ一覧', 'url' => '/shop/'],
                        ['label' => "「{$keyword}」の検索結果", 'url' => ''],
                    ];
                @endphp
                <x-breadcrumb :breads="$breadsKeyword" />
            @else
                <x-breadcrumb :breads="$breads" />
            @endif
        </x-guest.inner>
        <x-guest.main>
            <x-guest.inner>
                <x-guest.nav>
                    <x-guest.select class="js-select-redirect">
                        <option value="" selected disabled>都道府県から探す</option>
                        @foreach ($prefList as $prefItem)
                            <option value="/shop?pref={{ $prefItem }}">{{ $prefItem }}</option>
                        @endforeach
                    </x-guest.select>
                    <x-guest.search action="/shop/" method="GET" placeholder="ショップ名で検索" />
                </x-guest.nav>
                @if($shops->isEmpty())
                    @if(isset($pref))
                        <p class="mt-10">「{{$pref}}」のショップは登録されていません</p>
                    @elseif(isset($keyword))
                        <p class="mt-10">「{{ $keyword }}」は見つかりませんでした。</p>
                    @else
                        <p class="mt-10">登録されていません</p>
                    @endif
                @else
                    <x-guest.card-list>
                        @foreach($shops as $shop)
                            @if($shop->public_flag === 0)
                                <x-guest.card href="/shop/{{ $shop->id }}" src="{{ $shop->shop_image1 }}" tag="{{ $shop->pref }}">
                                    {{ $shop->shop_name }}
                                </x-guest.card>
                            @endif
                        @endforeach
                    </x-guest.card-list>
                @endif
            </x-guest.inner>
        </x-guest.main>
        <x-footer />
    </x-guest.wrapper>
</x-body>
</html>
