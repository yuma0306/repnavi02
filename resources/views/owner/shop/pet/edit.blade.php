@php
    $breads = [
        ['label' => 'ダッシュボード', 'url' => '/owner'],
        ['label' => Auth::user()->name . 'さんのショップ一覧', 'url' => "/owner/shop"],
        ['label' => "ショップ「{$shop->shop_name}」の生体一覧", 'url' => "/owner/shop/{$shop->id}/pet"],
        ['label' => "生体情報の編集", 'url' => ''],
    ];
    $petCategory = [
        'ニシキヘビ', 'ナミヘビ', 'トカゲ', 'ヤモリ', 'リクガメ', 'ミズガメ', 'カエル', '有尾類', 'その他',
    ];
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-meta.head
    title="生体情報の編集"
    desc="生体情報の編集。"
/>
<x-body>
    <x-owner.wrapper >
        @include('layouts.navigation')
        <x-owner.heading-lv1>
            生体情報の編集
        </x-owner.heading-lv1>
        <x-owner.main>
            <x-owner.inner>
                <x-breadcrumb :breads="$breads" />
                <x-owner.form action="{{ route('owner.shop.pet.update', ['shop_id' => $shop->id, 'pet_id' => $pet->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <x-owner.form-inner>
                        <x-owner.form-group>
                            <x-owner.form-label for="shop_image1">
                                <x-slot name="tag">
                                    <x-owner.tag class="bg-amber-500">必須</x-owner.tag>
                                </x-slot>
                                ショップ画像1
                            </x-owner.form-label>
                            <x-owner.form-file>
                                <x-slot name="img">
                                    @if($pet->pet_image1)
                                        <x-img src="{{ asset('storage/' . $pet->pet_image1) }}" alt="" />
                                    @endif
                                </x-slot>
                                <input type="file" id="pet_image1" name="pet_image1">
                            </x-owner.form-file>
                        </x-owner.form-group>
                        @for($i = 2; $i <= 4; $i++)
                            <x-owner.form-group>
                                <x-owner.form-label for="shop_image{{ $i }}">
                                    <x-slot name="tag">
                                        <x-owner.tag class="bg-gray-400">任意</x-owner.tag>
                                    </x-slot>
                                    ショップ画像{{ $i }}
                                </x-owner.form-label>
                                <x-owner.form-file>
                                    <x-slot name="img">
                                        @if($pet->{"pet_image$i"})
                                            <img class="object-cover aspect-video rounded" src="{{ asset('storage/' . $pet->{"pet_image$i"}) }}" alt="">
                                        @endif
                                    </x-slot>
                                    <input type="file" id="pet_image{{ $i }}" name="pet_image{{ $i }}">
                                </x-owner.form-file>
                            </x-owner.form-group>
                        @endfor
                        <x-owner.form-group class="js-require">
                            <x-owner.form-label for="title">
                                <x-slot name="tag">
                                    <x-owner.tag class="bg-amber-500">必須</x-owner.tag>
                                </x-slot>
                                タイトル
                            </x-owner.form-label>
                            <x-owner.form-input
                                type="text"
                                name="title"
                                id="title"
                                value="{{ $pet->title }}"
                            />
                            <x-owner.error-wrap />
                        </x-owner.form-group>
                        <x-owner.form-group class="js-require">
                            <x-owner.form-label for="category">
                                <x-slot name="tag">
                                    <x-owner.tag class="bg-amber-500">必須</x-owner.tag>
                                </x-slot>
                                カテゴリー
                            </x-owner.form-label>
                            <x-owner.form-select name="category" id="category">
                                @foreach ($petCategory as $petCategoryItem)
                                    <option value="{{$petCategoryItem}}" @if($pet->category === $petCategoryItem) selected @endif>{{ $petCategoryItem }}</option>
                                @endforeach
                            </x-owner.form-select>
                            <x-owner.error-wrap />
                        </x-owner.form-group>
                        <x-owner.form-group>
                            <x-owner.form-label for="species">
                                <x-slot name="tag">
                                    <x-owner.tag class="bg-gray-400">任意</x-owner.tag>
                                </x-slot>
                                種名
                            </x-owner.form-label>
                            <x-owner.form-input
                                type="text"
                                name="species"
                                id="species"
                                value="{{ $pet->species }}"
                            />
                        </x-owner.form-group>
                        <x-owner.form-group>
                            <x-owner.form-label for="morph">
                                <x-slot name="tag">
                                    <x-owner.tag class="bg-gray-400">任意</x-owner.tag>
                                </x-slot>
                                モルフ
                            </x-owner.form-label>
                            <x-owner.form-input
                                type="text"
                                name="morph"
                                id="morph"
                                value="{{ $pet->morph }}"
                            />
                        </x-owner.form-group>
                        <x-owner.form-group>
                            <x-owner.form-label for="sex">
                                <x-slot name="tag">
                                    <x-owner.tag class="bg-gray-400">任意</x-owner.tag>
                                </x-slot>
                                性別
                            </x-owner.form-label>
                            <x-owner.form-select name="sex" id="sex">
                                <option value="オス" @if($pet->sex === 'オス') selected @endif>オス</option>
                                <option value="メス" @if($pet->sex === 'メス') selected @endif>メス</option>
                                <option value="不明" @if($pet->sex === '不明') selected @endif>不明</option>
                            </x-owner.form-select>
                        </x-owner.form-group>
                        <x-owner.form-group>
                            <x-owner.form-label for="age">
                                <x-slot name="tag">
                                    <x-owner.tag class="bg-gray-400">任意</x-owner.tag>
                                </x-slot>
                                年齢
                            </x-owner.form-label>
                            <x-owner.form-input
                                type="text"
                                name="age"
                                id="age"
                                value="{{ $pet->age }}"
                            />
                        </x-owner.form-group>
                        <x-owner.form-group>
                            <x-owner.form-label for="size">
                                <x-slot name="tag">
                                    <x-owner.tag class="bg-gray-400">任意</x-owner.tag>
                                </x-slot>
                                大きさ
                            </x-owner.form-label>
                            <x-owner.form-input
                                type="text"
                                name="size"
                                id="size"
                                value="{{ $pet->size }}"
                            />
                        </x-owner.form-group>
                        <x-owner.form-group>
                            <x-owner.form-label for="weight">
                                <x-slot name="tag">
                                    <x-owner.tag class="bg-gray-400">任意</x-owner.tag>
                                </x-slot>
                                体重
                            </x-owner.form-label>
                            <x-owner.form-input
                                type="text"
                                name="weight"
                                id="weight"
                                value="{{ $pet->weight }}"
                            />
                        </x-owner.form-group>
                        <x-owner.form-group>
                            <x-owner.form-label for="arrival_day">
                                <x-slot name="tag">
                                    <x-owner.tag class="bg-gray-400">任意</x-owner.tag>
                                </x-slot>
                                入荷日
                            </x-owner.form-label>
                            <x-owner.form-input
                                type="date"
                                name="arrival_day"
                                id="arrival_day"
                                value="{{ $pet->arrival_day }}"
                            />
                        </x-owner.form-group>
                        <x-owner.form-group>
                            <x-owner.form-label for="price">
                                <x-slot name="tag">
                                    <x-owner.tag class="bg-gray-400">任意</x-owner.tag>
                                </x-slot>
                                値段
                            </x-owner.form-label>
                            <x-owner.form-input
                                type="text"
                                name="price"
                                id="price"
                                value="{{ $pet->price }}"
                            />
                        </x-owner.form-group>
                        <x-owner.form-group>
                            <x-owner.form-label for="description">
                                <x-slot name="tag">
                                    <x-owner.tag class="bg-gray-400">任意</x-owner.tag>
                                </x-slot>
                                コメント
                            </x-owner.form-label>
                            <x-owner.form-textarea name="description" id="description">{{ $pet->description }}</x-owner.form-textarea>
                        </x-owner.form-group>
                        <x-owner.form-group>
                            <x-owner.form-label for="handling_artificial_feeds">
                                <x-slot name="tag">
                                    <x-owner.tag class="bg-amber-500">必須</x-owner.tag>
                                </x-slot>
                                公開
                            </x-owner.form-label>
                            <div class="flex gap-5 mt-3">
                                <x-owner.form-radio>
                                    <input type="radio" name="public_flag" id="public_flag" value="0" @if($pet->public_flag === 0) checked @endif>
                                    <span>公開</span>
                                </x-owner.form-radio>
                                <x-owner.form-radio>
                                    <input type="radio" name="public_flag" value="1" @if($pet->public_flag === 1) checked @endif>
                                    <span>非公開</span>
                                </x-owner.form-radio>
                            </div>
                        </x-owner.form-group>
                    </x-owner.form-inner>
                    <x-owner.form-btn class="mt-5 mx-auto js-submit-btn" type="button">更新</x-owner.form-btn>
                </x-owner.form>
                <x-owner.summary title="この生体情報を削除しますか？">
                    <x-owner.form-confirm class="js-confirm-form" action="{{ route('owner.shop.pet.destroy', ['shop_id' => $shop->id, 'pet_id' => $pet->id]) }}" method="post">
                        @csrf
                        @method('delete')
                        <x-owner.form-confirm-btn class="mt-5 js-confirm-btn" type="button">生体情報を削除</x-owner.form-confirm-btn>
                    </x-owner.form-confirm>
                </x-owner.summary>
            </x-owner.inner>
        </x-owner.main>
        <x-owner.footer />
    </x-owner.wrapper>
    <script src="{{ asset('js/validate.js') }}"></script>
</x-body>
