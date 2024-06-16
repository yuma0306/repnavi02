<!DOCTYPE html>
<html lang="ja">
<x-meta.head
    title="レプナビのトップページ"
    desc="レプナビのトップページです。"
/>
<x-body>
    <x-guest.wrapper>
        <x-header></x-header>
        <section class="relative flex flex-col-reverse lg:flex-row items-center justify-between md:container mx-auto md:px-4 gap-5">
                <div class="bg-white w-full lg:w-fit rounded-lg mt-[-30px]">
                    <div class="container mx-auto px-4 pt-10">
                        <h1 class="font-bold text-4xl sm:text-5xl text-center">レプナビ</h1>
                        <p class="mt-8">ペットショップを回って理想の生体を見つけるのは大変です。<br>レプナビなら欲しい生体をすぐに検索して見つけることができます。</p>
                        <x-guest.search class="mt-8" action="/pet/" method="GET" placeholder="種名で検索" />
                    </div>
                </div>
                <div class="overflow-hidden rounded shadow-lg flex-1">
                    <img src="{{ asset('img/fv-img.jpg') }}" alt="" class="w-full object-cover object-center">
                </div>
        </section>
        <x-guest.inner class="pt-5 pb-20">
            @isset($pets)
                <x-guest.heading-lv2>新着入荷</x-guest.heading-lv2>
                <x-guest.card-list>
                    @foreach ($pets as $pet)
                        @if($pet->public_flag === 0)
                            <x-guest.card href="/pet/{{ $pet->id }}" src="{{ $pet->pet_image1 }}" tag="{{ $pet->category }}">
                                {{ $pet->title }}
                            </x-guest.card>
                        @endif
                    @endforeach
                </x-guest.card-list>
            @endisset
            <x-guest.heading-lv2>カテゴリから探す</x-guest.heading-lv2>
            <x-guest.nav02>
                <x-guest.search class="col-span-2" action="/pet/" method="GET" placeholder="種名で検索" />
                <x-btn href="/shop/" class="col-span-2">生体一覧</x-btn>
            </x-guest.nav02>
            <x-guest.nav02 class="mt-5">
                <x-guest.card02 href="/pet?category=ニシキヘビ" sub="python" style="background-image: url({{ asset('img/img-python.jpg') }})">ニシキヘビ</x-guest.card02>
                <x-guest.card02 href="/pet?category=ナミヘビ" sub="colubrid" style="background-image: url({{ asset('img/img-colubrid.jpg') }})">ナミヘビ</x-guest.card02>
                <x-guest.card02 href="/pet?category=トカゲ" sub="lizard" style="background-image: url({{ asset('img/img-lizard.jpg') }})">トカゲ</x-guest.card02>
                <x-guest.card02 href="/pet?category=ヤモリ" sub="gecko" style="background-image: url({{ asset('img/img-gecko.jpg') }})">ヤモリ</x-guest.card02>
                <x-guest.card02 href="/pet?category=リクガメ" sub="tortoise" style="background-image: url({{ asset('img/img-tortoise.jpg') }})">リクガメ</x-guest.card02>
                <x-guest.card02 href="/pet?category=ミズガメ" sub="turtle" style="background-image: url({{ asset('img/img-turtle.jpg') }})">ミズガメ</x-guest.card02>
                <x-guest.card02 href="/pet?category=カエル" sub="frog" style="background-image: url({{ asset('img/img-frog.jpg') }})">カエル</x-guest.card02>
                <x-guest.card02 href="/pet?category=有尾類" sub="caudata" style="background-image: url({{ asset('img/img-caudata.jpg') }})">有尾類</x-guest.card02>
                <x-guest.card02 href="/pet?category=その他" sub="other" style="background-image: url({{ asset('img/img-other.jpg') }})">その他</x-guest.card02>
            </x-guest.nav02>
            <x-guest.heading-lv2>ショップを探す</x-guest.heading-lv2>
            <x-guest.nav02>
                <x-guest.search class="col-span-2" action="/shop/" method="GET" placeholder="ショップ名で検索" />
                <x-btn href="/shop/" class="col-span-2">ショップ一覧</x-btn>
            </x-guest.nav02>
            <x-guest.nav02 class="mt-5">
                <x-guest.card02 href="/shop?pref=東京" sub="tokyo" style="background-image: url({{ asset('img/img-tokyo.jpg') }})">東京</x-guest.card02>
                <x-guest.card02 href="/shop?pref=神奈川" sub="kanagawa" style="background-image: url({{ asset('img/img-kanagawa.jpg') }})">神奈川</x-guest.card02>
                <x-guest.card02 href="/shop?pref=大阪" sub="osaka" style="background-image: url({{ asset('img/img-osaka.jpg') }})">大阪</x-guest.card02>
                <x-guest.card02 href="/shop?pref=京都" sub="kyoto" style="background-image: url({{ asset('img/img-kyoto.jpg') }})">京都</x-guest.card02>
                <x-guest.card02 href="/shop?pref=愛知" sub="aichi" style="background-image: url({{ asset('img/img-aichi.jpg') }})">愛知</x-guest.card02>
                <x-guest.card02 href="/shop?pref=福岡" sub="fukuoka" style="background-image: url({{ asset('img/img-fukuoka.jpg') }})">福岡</x-guest.card02>
            </x-guest.nav02>
        </x-guest.inner>
        <x-footer></x-footer>
    </x-guest.wrapper>
</x-body>
</html>
