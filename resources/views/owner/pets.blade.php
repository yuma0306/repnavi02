@php
    $breads = [
        ['label' => 'ダッシュボード', 'url' => '/owner'],
        ['label' => Auth::user()->name . 'さんの生体情報一覧', 'url' => ''],
    ];
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-meta.head
    title="{{ Auth::user()->name }}さんの生体情報一覧"
    desc="{{ Auth::user()->name }}さんの生体情報一覧"
/>
<x-body>
    <x-owner.wrapper >
        @include('layouts.navigation')
        <x-owner.heading-lv1>
            {{ Auth::user()->name }}さんの生体情報一覧
        </x-owner.heading-lv1>
        <x-owner.main>
            <x-owner.inner>
                <x-breadcrumb :breads="$breads" />
                @if($pets->isEmpty())
                    <p>生体はまだ登録されていません</p>
                @else
                    <x-owner.card-list>
                        @foreach($pets as $pet)
                            <x-owner.card02
                                title="{{ $pet->pet_name }}"
                                src="{{ asset('storage/' . $pet->pet_image1) }}"
                                alt=""
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
                                        <x-link-text href="/pet/{{ $pet->id }}">
                                            公開中ページ
                                        </x-link-text>
                                    @endif
                                </x-owner.link-list>
                            </x-owner.card02>
                        @endforeach
                    </x-owner.card-list>
                @endif
            </x-owner.inner>
        </x-owner.main>
        <x-owner.footer />
    </x-owner.wrapper>
</x-body>
</html>
