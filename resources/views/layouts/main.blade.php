@extends('layouts.app')
<link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
@section('contentP')
<div class="top-bar">
    <div class="top-bar-left">
        <ul class="menu">
            <li class="menu-text">Blog</li>
            <li><a href="/">Home</a></li>
            <li><a href="/articles">Articles</a></li>
            <li><a href="/contact">Contact</a></li>
            <li><a href="/chat">Web Chat</a></li>
        </ul>
    </div>
</div>

<div class="callout large primary">
    <div class="text-center">
        <h1>Notre {{ $titre }}</h1>
        <h2 class="subheader"> {{ Auth::user()->name }} {{ $subheader }}</h2>
    </div>
</div>

<article class="grid-container">
    <div class="grid-x align-center">
        <div class="cell medium-8">
            @yield('content')
        </div>
    </div>
</article>
@endsection
