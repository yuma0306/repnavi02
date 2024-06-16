@php
    $petCategory = [
        'ニシキヘビ', 'ナミヘビ', 'トカゲ', 'ヤモリ', 'リクガメ', 'ミズガメ', 'カエル', '有尾類', 'その他',
    ];
    $breads = [
        ['label' => 'トップ', 'url' => '/'],
        ['label' => '生体一覧', 'url' => ''],
    ];
@endphp
<!DOCTYPE html>
<html lang="ja">
<x-meta.head
    title="生体一覧"
    desc="生体一覧です。"
/>
<x-body>
    <x-guest.wrapper >
        <x-header />
        <x-guest.heading-lv1>
            @if(isset($category))
                「{{$category}}」一覧
            @elseif(isset($keyword))
                「{{$keyword}}」の検索結果
            @elseif(isset($shopModel))
                「{{$shopModel->shop_name}}」の生体一覧
            @else
                生体一覧
            @endif
        </x-guest.heading-lv1>
        <x-guest.inner>
            @if(isset($category))
                @php
                    $breadsCategory = [
                        ['label' => 'トップ', 'url' => '/'],
                        ['label' => '生体一覧', 'url' => '/pet/'],
                        ['label' => "「{$category}」一覧", 'url' => ''],
                    ];
                @endphp
                <x-breadcrumb :breads="$breadsCategory" />
            @elseif(isset($keyword))
                @php
                    $breadsKeyword = [
                        ['label' => 'トップ', 'url' => '/'],
                        ['label' => '生体一覧', 'url' => '/pet/'],
                        ['label' => "「{$keyword}」の検索結果", 'url' => ''],
                    ];
                @endphp
                <x-breadcrumb :breads="$breadsKeyword" />
            @elseif(isset($shopModel))
                @php
                    $breadsKeyword = [
                        ['label' => 'トップ', 'url' => '/'],
                        ['label' => '生体一覧', 'url' => '/pet/'],
                        ['label' => "「{$shopModel->shop_name}」の生体一覧", 'url' => ''],
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
                        <option value="" selected disabled>カテゴリーから探す</option>
                        @foreach ($petCategory as $petCategoryItem)
                            <option value="/pet?category={{ $petCategoryItem }}">{{ $petCategoryItem }}</option>
                        @endforeach
                    </x-guest.select>
                    <x-guest.search action="/pet/" method="GET" placeholder="種名で検索" />
                </x-guest.nav>
                @if($pets->isEmpty())
                    @if(isset($category))
                        <p class="mt-10">「{{ $category }}」は登録されていません</p>
                    @elseif(isset($keyword))
                        <p class="mt-10">「{{ $keyword }}」は見つかりませんでした。</p>
                    @elseif(isset($shopModel))
                        <p class="mt-10">「{{ $shopModel->shop_name }}」の生体は登録されていません</p>
                    @else
                        <p class="mt-10">登録されていません</p>
                    @endif
                @else
                    <x-guest.card-list>
                        @foreach($pets as $pet)
                            @if($pet->public_flag === 0)
                                <x-guest.card href="/pet/{{ $pet->id }}" src="{{ $pet->pet_image1 }}" tag="{{ $pet->category }}">
                                    {{ $pet->title }}
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
