@extends('articles/single')

@section('comment')
    <div class="card text-center border-dark mb-3 mx-auto" style="width: 100%; border-radius: 1em">
        <img class="card-img-top" src="/images/img_card.jpg" alt="Card image cap">
        <div class="card-body">
            <h4>Comment</h4>
        </div>
        <div class="card-footer text-muted">
            Post at : {{ $post->post_date }} by {{ $nameauthor }}
        </div>
    </div>
@endsection
