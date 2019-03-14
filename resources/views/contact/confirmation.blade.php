@extends('layouts/main')

@section('content')
    <div class="alert alert-success" role="alert">
        Requête envoyée, vous allez être redirigé :)
    </div>
    <div class="card text-center border-dark mb-3 mx-auto" style="width: 18rem; border-radius: 1em">
        <h5 class="card-header">Contact Request</h5>
        <div class="card-body">
        <p class="card-text"> {{ $message }}</p>
        </div>
    </div>
@endsection