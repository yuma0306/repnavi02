<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-meta.head
    title="{{ Auth::user()->name }}さんのダッシュボード"
    desc="{{ Auth::user()->name }}さんのダッシュボードです。"
/>
<x-body>
    <x-owner.wrapper >
        @include('layouts.navigation')
        <x-owner.heading-lv1>
            {{ Auth::user()->name }}さんのダッシュボード
        </x-owner.heading-lv1>
        <x-owner.main>
            <x-owner.inner>
                <x-owner.card-list>
                    <x-owner.card
                        src="{{ asset('img/icon-shop.svg') }}"
                        alt="ショップのアイコン"
                    >
                        <x-owner.heading-lv2>最近編集したショップ</x-owner.heading-lv2>
                        <x-owner.list>
                            @foreach($latestShops as $shop)
                                <x-owner.item
                                    src="{{ asset('storage/' . $shop->shop_image1) }}"
                                    alt="{{ $shop->shop_name }}"
                                    title="{{ $shop->shop_name }}"
                                >
                                    <x-slot name="tag">
                                        @if($shop->public_flag === 0)
                                            <x-owner.tag class="bg-amber-500">公開中</x-owner.tag>
                                        @else
                                            <x-owner.tag class="bg-gray-400">非公開</x-owner.tag>
                                        @endif
                                    </x-slot>
                                    <x-owner.link-list>
                                        <x-link-text
                                            href="/owner/shop/{{ $shop->id }}"
                                        >
                                            ショップ情報を編集
                                        </x-link-text>
                                        <x-link-text
                                            href="/owner/shop/{{ $shop->id }}/pet"
                                        >
                                            {{ $shop->shop_name }}の生体情報一覧
                                        </x-link-text>
                                        @if($shop->public_flag === 0)
                                            <x-link-text
                                                href="/shop/{{ $shop->id }}"
                                            >
                                                公開中ページ
                                            </x-link-text>
                                        @endif
                                    </x-owner.link-list>
                                </x-owner.item>
                            @endforeach
                        </x-owner.list>
                        <x-link-text href="/owner/shop" class="mt-5">ショップ一覧</x-link-text>
                    </x-owner.card>
                    <x-owner.card
                        src="{{ asset('img/icon-snake.svg') }}"
                        alt="生体のアイコン"
                    >
                        <x-owner.heading-lv2>最近編集した生体</x-owner.heading-lv2>
                        <x-owner.list>
                            @foreach($latestPets as $pet)
                                <x-owner.item
                                    src="{{ asset('storage/' . $pet->pet_image1) }}"
                                    alt="{{ $pet->title }}"
                                    title="{{ $pet->title }}"
                                >
                                    <x-slot name="tag">
                                        @if($pet->public_flag === 0)
                                            <x-owner.tag class="bg-amber-500">公開中</x-owner.tag>
                                        @else
                                            <x-owner.tag class="bg-gray-400">非公開</x-owner.tag>
                                        @endif
                                    </x-slot>
                                    <x-owner.link-list>
                                        <x-link-text href="/owner/shop/{{ $pet->shop_id }}/pet/{{ $pet->id }}">
                                            生体情報を編集
                                        </x-link-text>
                                        <x-link-text href="/owner/shop/{{ $pet->shop_id }}/pet">
                                            「 {{ $pet->shop->shop_name }}」の生体情報一覧
                                        </x-link-text>
                                        @if($pet->public_flag === 0)
                                            <x-link-text
                                                href="/pet/{{ $pet->id }}"
                                            >
                                                公開中ページ
                                            </x-link-text>
                                        @endif
                                    </x-owner.link-list>
                                </x-owner.item>
                            @endforeach
                        </x-owner.list>
                        <x-link-text href="/owner/pets" class="mt-5">生体一覧</x-link-text>
                    </x-owner.card>
                </x-owner.card-list>
            </x-owner.inner>
        </x-owner.main>
        <x-owner.footer />
    </x-owner.wrapper>
</x-body>
</html>

