@extends('layouts/main')

@section('content')

    <div class="blog-post">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div>
            <h1 class="mt-4">{{ $post->post_title }}</h1>

            <p class="lead">by {{ $nameauthor }}</p>

            <p>Posted : {{ $post->post_date }}</p>

            
            <div>
                <img class="img-fluid rounded" src="/images/img_card.jpg">

                <blockquote class="blockquote">
                    <p class="mb-0">{{ $post->post_content }} </p>
                    <cite title="Source Title">Génération de contenu avec seed</cite>
                    </footer>
                </blockquote>
            </div>

            <p class="lead">Tantus est igitur innatus in nobis cognitionis amor et scientiae ut nemo dubitare possit 
            quin ad eas res hominum natura nullo emolumento invitata rapiatur.<p> 

            <p> Videmusne ut pueri ne verberibus quidem a contemplandis rebus perquirendisque deterreantur ? 
            Ut pulsi recurrant? Ut aliquid scire se gaudeant ? 
            Ut id aliis narrare gestiant ? Ut pompa, ludis atque eius modi spectaculis teneantur ob eamque rem vel famem et sitim perferant ? 
            Quid vero ? Qui ingeniis studiis atque artibus delectantur, nonne videmus eos nec valetudinis nec rei 
            familiaris habere rationem omniaque perpeti ipsa cognitione et scientia captos et cum maximis 
            curis et laboribus compensare eam quam ex discendo capiant voluptatem ?<p>

        </div>

        <div class="callout">
            <h4>  Commentaires </h4>
        <div>

        @foreach($post->comments as $comment)
            <div class="card text-center border-dark mb-3 mx-auto" style="width: 100ù; border-radius: 1em">
                <h5 class="card-title text-info ">{{ $comment->comment_date }}</h5>
                <div class="card-body">
                <p>{{ $comment->comment_content }}</p>
                </div>
                <div class="card-footer text-muted">
                Post by : {{ $comment->comment_author }} 
                </div>
            </div>
        @endforeach

        <form class="col-md" method="POST">
            @csrf
            <legend>Commentez l'article</legend>
            <div>
                <label>Entrez votre pseudo :</label>
                <input type="text" class="form-control {{ $errors->has('author') ? 'is-invalid' : '' }}" name="author" id="author" placeholder="Votre pseudo">
            </div>
            <div>
                <label>Entrez votre commentaire :</label>
                <textarea type="textarea" class="form-control {{ $errors->has('author') ? 'is-invalid' : '' }}" name="content" id="content" placeholder="Votre commentaire"></textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>

        </div>
    </div>

@endsection