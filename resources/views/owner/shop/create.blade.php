@php
    $breads = [
        ['label' => 'ダッシュボード', 'url' => '/owner'],
        ['label' => Auth::user()->name . 'さんのショップ一覧', 'url' => "/owner/shop"],
        ['label' => "ショップ新規登録", 'url' => ''],
    ];
    $prefList = [
        '北海道','青森県','岩手県','宮城県','秋田県','山形県','福島県','茨城県','栃木県','群馬県','埼玉県','千葉県','東京都','神奈川県','新潟県','富山県','石川県','福井県','山梨県','長野県','岐阜県','静岡県','愛知県','三重県','滋賀県','京都府','大阪府','兵庫県','奈良県','和歌山県','鳥取県','島根県','岡山県','広島県','山口県','徳島県','香川県','愛媛県','高知県','福岡県','佐賀県','長崎県','熊本県','大分県','宮崎県','鹿児島県','沖縄県',
    ];
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-meta.head
    title="ショップ新規登録"
    desc="ショップ新規登録。"
/>
<x-body>
    <x-owner.wrapper >
        @include('layouts.navigation')
        <x-owner.heading-lv1>
            ショップ新規登録
        </x-owner.heading-lv1>
        <x-owner.main>
            <x-owner.inner>
                <x-breadcrumb :breads="$breads" />
                <x-owner.form action="{{ route('owner.shop.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <x-owner.form-inner>
                        <x-owner.form-group class="js-require">
                            <x-owner.form-label for="shop_image1">
                                <x-slot name="tag">
                                    <x-owner.tag class="bg-amber-500">必須</x-owner.tag>
                                </x-slot>
                                ショップ画像1
                            </x-owner.form-label>
                            <x-owner.form-file>
                                <input type="file" id="shop_image1" name="shop_image1">
                            </x-owner.form-file>
                            <x-owner.error-wrap />
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
                                    <input type="file" id="shop_image{{ $i }}" name="shop_image{{ $i }}">
                                </x-owner.form-file>
                            </x-owner.form-group>
                        @endfor
                        <x-owner.form-group class="js-require">
                            <x-owner.form-label for="shop_name">
                                <x-slot name="tag">
                                    <x-owner.tag class="bg-amber-500">必須</x-owner.tag>
                                </x-slot>
                                ショップ名
                            </x-owner.form-label>
                            <x-owner.form-input
                                type="text"
                                name="shop_name"
                                id="shop_name"
                                value=""
                            />
                            <x-owner.error-wrap />
                        </x-owner.form-group>
                        <x-owner.form-group>
                            <x-owner.form-label for="website">
                                <x-slot name="tag">
                                    <x-owner.tag class="bg-gray-400">任意</x-owner.tag>
                                </x-slot>
                                公式サイト
                            </x-owner.form-label>
                            <x-owner.form-input
                                type="text"
                                name="website"
                                id="website"
                                value=""
                            />
                        </x-owner.form-group>
                        <x-owner.form-group>
                            <x-owner.form-label for="website">
                                <x-slot name="tag">
                                    <x-owner.tag class="bg-gray-400">任意</x-owner.tag>
                                </x-slot>
                                営業時間
                            </x-owner.form-label>
                            <x-owner.form-input
                                type="text"
                                name="business_hours"
                                id="business_hours"
                                value=""
                            />
                        </x-owner.form-group>
                        <x-owner.form-group>
                            <x-owner.form-label for="regular_holiday">
                                <x-slot name="tag">
                                    <x-owner.tag class="bg-gray-400">任意</x-owner.tag>
                                </x-slot>
                                定休日
                            </x-owner.form-label>
                            <x-owner.form-input
                                type="text"
                                name="regular_holiday"
                                id="regular_holiday"
                                value=""
                            />
                        </x-owner.form-group>
                        <x-owner.form-group>
                            <x-owner.form-label for="phone">
                                <x-slot name="tag">
                                    <x-owner.tag class="bg-gray-400">任意</x-owner.tag>
                                </x-slot>
                                電話番号
                            </x-owner.form-label>
                            <x-owner.form-input
                                type="text"
                                name="phone"
                                id="phone"
                                value=""
                            />
                        </x-owner.form-group>
                        <x-owner.form-group>
                            <x-owner.form-label for="animal_handler">
                                <x-slot name="tag">
                                    <x-owner.tag class="bg-gray-400">任意</x-owner.tag>
                                </x-slot>
                                動物取扱責任者
                            </x-owner.form-label>
                            <x-owner.form-input
                                type="text"
                                name="animal_handler"
                                id="animal_handler"
                                value=""
                            />
                        </x-owner.form-group>
                        <x-owner.form-group class="js-require">
                            <x-owner.form-label for="animal_handler">
                                <x-slot name="tag">
                                    <x-owner.tag class="bg-amber-500">必須</x-owner.tag>
                                </x-slot>
                                都道府県
                            </x-owner.form-label>
                            <x-owner.form-select name="pref" id="pref">
                                <option value="" disabled selected>選択してください</option>
                                @foreach ($prefList as $prefItem)
                                    <option value="{{$prefItem}}">{{ $prefItem }}</option>
                                @endforeach
                            </x-owner.form-select>
                            <x-owner.error-wrap />
                        </x-owner.form-group>
                        <x-owner.form-group>
                            <x-owner.form-label for="address">
                                <x-slot name="tag">
                                    <x-owner.tag class="bg-gray-400">任意</x-owner.tag>
                                </x-slot>
                                住所
                            </x-owner.form-label>
                            <x-owner.form-input
                                type="text"
                                name="address"
                                id="address"
                            />
                        </x-owner.form-group>
                        <x-owner.form-group>
                            <x-owner.form-label for="postal_code">
                                <x-slot name="tag">
                                    <x-owner.tag class="bg-gray-400">任意</x-owner.tag>
                                </x-slot>
                                郵便番号
                            </x-owner.form-label>
                            <x-owner.form-input
                                type="text"
                                name="postal_code"
                                id="postal_code"
                            />
                        </x-owner.form-group>
                        <x-owner.form-group>
                            <x-owner.form-label for="map">
                                <x-slot name="tag">
                                    <x-owner.tag class="bg-gray-400">任意</x-owner.tag>
                                </x-slot>
                                マップ
                            </x-owner.form-label>
                            <x-owner.form-textarea name="map" id="map"></x-owner.form-textarea>
                        </x-owner.form-group>
                        <x-owner.form-group>
                            <x-owner.form-label for="access_method">
                                <x-slot name="tag">
                                    <x-owner.tag class="bg-gray-400">任意</x-owner.tag>
                                </x-slot>
                                アクセス
                            </x-owner.form-label>
                            <x-owner.form-textarea name="access_method" id="access_method"></x-owner.form-textarea>
                        </x-owner.form-group>
                        <x-owner.form-group>
                            <x-owner.form-label for="description">
                                <x-slot name="tag">
                                    <x-owner.tag class="bg-gray-400">任意</x-owner.tag>
                                </x-slot>
                                コメント
                            </x-owner.form-label>
                            <x-owner.form-textarea name="description" id="description"></x-owner.form-textarea>
                        </x-owner.form-group>
                        <x-owner.form-group>
                            <x-owner.form-label for="handling_goods">
                                <x-slot name="tag">
                                    <x-owner.tag class="bg-gray-400">任意</x-owner.tag>
                                </x-slot>
                                取扱い商品
                            </x-owner.form-label>
                            <x-owner.form-textarea name="handling_goods" id="handling_goods"></x-owner.form-textarea>
                        </x-owner.form-group>
                        <x-owner.form-group>
                            <x-owner.form-label for="handling_pets">
                                <x-slot name="tag">
                                    <x-owner.tag class="bg-gray-400">任意</x-owner.tag>
                                </x-slot>
                                取扱い動物
                            </x-owner.form-label>
                            <x-owner.form-textarea name="handling_pets" id="handling_pets"></x-owner.form-textarea>
                        </x-owner.form-group>
                        <x-owner.form-group>
                            <x-owner.form-label for="handling_live_feeds">
                                <x-slot name="tag">
                                    <x-owner.tag class="bg-gray-400">任意</x-owner.tag>
                                </x-slot>
                                取扱い活餌
                            </x-owner.form-label>
                            <x-owner.form-textarea name="handling_live_feeds" id="handling_live_feeds"></x-owner.form-textarea>
                        </x-owner.form-group>
                        <x-owner.form-group>
                            <x-owner.form-label for="handling_frozen_feeds">
                                <x-slot name="tag">
                                    <x-owner.tag class="bg-gray-400">任意</x-owner.tag>
                                </x-slot>
                                取扱い冷凍餌
                            </x-owner.form-label>
                            <x-owner.form-textarea name="handling_frozen_feeds" id="handling_frozen_feeds"></x-owner.form-textarea>
                        </x-owner.form-group>
                        <x-owner.form-group>
                            <x-owner.form-label for="hanhandling_dried_feedsdling_frozen_feeds">
                                <x-slot name="tag">
                                    <x-owner.tag class="bg-gray-400">任意</x-owner.tag>
                                </x-slot>
                                取扱い乾燥餌
                            </x-owner.form-label>
                            <x-owner.form-textarea name="handling_dried_feeds" id="handling_dried_feeds"></x-owner.form-textarea>
                        </x-owner.form-group>
                        <x-owner.form-group>
                            <x-owner.form-label for="handling_artificial_feeds">
                                <x-slot name="tag">
                                    <x-owner.tag class="bg-gray-400">任意</x-owner.tag>
                                </x-slot>
                                取扱い人工餌
                            </x-owner.form-label>
                            <x-owner.form-textarea name="handling_artificial_feeds" id="handling_artificial_feeds"></x-owner.form-textarea>
                        </x-owner.form-group>
                        <x-owner.form-group class="lg:col-span-2">
                            <x-owner.form-label for="handling_artificial_feeds">
                                <x-slot name="tag">
                                    <x-owner.tag class="bg-amber-500">必須</x-owner.tag>
                                </x-slot>
                                公開
                            </x-owner.form-label>
                            <div class="flex gap-5 mt-3">
                                <x-owner.form-radio>
                                    <input type="radio" name="public_flag" id="public_flag" value="0" checked>
                                    <span>公開</span>
                                </x-owner.form-radio>
                                <x-owner.form-radio>
                                    <input type="radio" name="public_flag" value="1">
                                    <span>非公開</span>
                                </x-owner.form-radio>
                            </div>
                        </x-owner.form-group>
                    </x-owner.form-inner>
                    <x-owner.form-btn class="mt-5 mx-auto js-submit-btn" type="button">登録</x-owner.form-btn>
                </x-owner.form>
            </x-owner.inner>
        </x-owner.main>
        <x-owner.footer />
    </x-owner.wrapper>
    <script src="{{ asset('js/validate.js') }}"></script>
</x-body>
</html>
