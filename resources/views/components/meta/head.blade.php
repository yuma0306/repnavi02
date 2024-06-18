@props([
    'title',
    'desc'
])

<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }} | レプナビ</title>
    <meta name="description" content="{{ $desc }}レプナビは爬虫類と飼育者を繋ぐマッチングサービスです。">
	<link rel="canonical" href="{{ url()->current() }}">
	<meta name="format-detection" content="telephone=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{ asset('img/favicon.ico') }}">
	<meta property="og:title" content="{{ $title }} | レプナビ">
	<meta property="og:description" content="{{ $desc }}レプナビは爬虫類と飼育者を繋ぐマッチングサービスです。">
	<meta property="og:url" content="{{ url()->current() }}">
	<meta property="og:image" content="{{ asset('img/ogp.png') }}">
	<meta property="og:site_name" content="ヘビ牧場どらんごファーム">
	<meta property="og:type" content="website">
	<meta property="og:locale" content="ja_JP">
    {{--  <link rel="preconnect" href="https://fonts.bunny.net">  --}}
    {{--  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">  --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{ $slot }}
</head>
