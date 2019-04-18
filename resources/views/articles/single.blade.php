@extends('layouts/main')

@section('content')

    <div class="blog-post">
        <h3>{{ $post->post_title }} <small> {{ $post->post_date }} </small></h3>
        <img class="thumbnail" src="/images/img_card.jpg">
        <p> {{ $post->post_content }} </p>
        <p> Author : {{ $nameauthor }}</p>
        
        <div class="callout">
            <h4>  Commentaires </h4>
        <div>
        @foreach($post->comments as $comment)
        <div class="card text-center border-dark mb-3 mx-auto" style="width: 100ù; border-radius: 1em">
            <h5 class="card-title text-info ">{{ $comment->id }}</h5>
            <div class="card-body">
			<p>{{ $comment->comment_content }}</p>
            </div>
            <div class="card-footer text-muted">
            Post by : {{ $comment->comment_author }} 
            </div>
        </div>
        @endforeach
        </div>
    </div>

    <!-- <div class="card text-center border-dark mb-3 mx-auto" style="width: 18rem; border-radius: 1em">
        <img class="card-img-top" src="/images/img_card.jpg" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title text-info ">{{ $post->post_title }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ $post->post_name }}</h6>
            <p class="card-text">{{ $post->post_content }}</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
        <div class="card-footer text-muted">
            Post at : {{ $post->post_date }} by {{ $nameauthor }}
        </div>
    </div> -->

@endsection