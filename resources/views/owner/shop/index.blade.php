@php
    $breads = [
        ['label' => 'ダッシュボード', 'url' => '/owner'],
        ['label' => Auth::user()->name . 'さんのショップ一覧', 'url' => ''],
    ];
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-meta.head
    title="{{ Auth::user()->name }}さんのショップ一覧"
    desc="{{ Auth::user()->name }}さんのショップ一覧です。"
/>
<x-body>
    <x-owner.wrapper >
        @include('layouts.navigation')
        <x-owner.heading-lv1>
            {{ Auth::user()->name }}さんのショップ一覧
        </x-owner.heading-lv1>
        <x-owner.main>
            <x-owner.inner>
                <x-breadcrumb :breads="$breads" />
                @if($shops->isEmpty())
                    <p>ショップはまだ登録されていません</p>
                @else
                    <x-owner.card-list>
                        @foreach($shops as $shop)
                            <x-owner.card02
                                title="{{ $shop->shop_name }}"
                                src="{{ asset('storage/' . $shop->shop_image1) }}"
                                alt=""
                            >
                                <x-slot name="tag">
                                    @if($shop->public_flag === 0)
                                        <x-owner.tag class="bg-amber-500">公開中</x-owner.tag>
                                    @else
                                        <x-owner.tag class="bg-gray-400">非公開</x-owner.tag>
                                    @endif
                                </x-slot>
                                <x-owner.link-list>
                                    <x-link-text href="/owner/shop/{{ $shop->id }}">
                                        ショップ情報を編集
                                    </x-link-text>
                                    <x-link-text href="/owner/shop/{{ $shop->id }}/pet">
                                        生体情報一覧
                                    </x-link-text>
                                    <x-link-text href="/owner/shop/{{ $shop->id }}/pet/create">
                                        新しい生体を登録
                                    </x-link-text>
                                    @if($shop->public_flag === 0)
                                        <x-link-text href="/shop/{{ $shop->id }}">
                                            公開中ページ
                                        </x-link-text>
                                    @endif
                                </x-owner.link-list>
                            </x-owner.card02>
                        @endforeach
                    </x-owner.card-list>
                @endif
                <x-btn class="max-w-[400px] mt-8 mx-auto" href="/owner/shop/create">新しいショップを登録</x-btn>
            </x-owner.inner>
        </x-owner.main>
        <x-owner.footer />
    </x-owner.wrapper>
</x-body>
</html>
