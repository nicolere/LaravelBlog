@extends('layouts.main')

@section('content')

<div class="container" id="app">
    <div class="row justify-content-center">
        <chat-component></chat-component>
        <user-component></user-component>
    </div>
</div>
@endsection