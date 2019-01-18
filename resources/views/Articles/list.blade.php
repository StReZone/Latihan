@foreach($articles as $article)
<article class="row">
    <h1>{!!$article->title!!}</h1>
    <p>
        {!! str_limit($article->content, 250) !!}
        {!! link_to(route('articles.show', $article->id), 'Read More') !!}
    </p>
</article>
@endforeach
<div class="row"> 
    <div class="col-md-6 col-md-offset-4"> 
        {!! $articles->render()!!}
    </div>  
</div>