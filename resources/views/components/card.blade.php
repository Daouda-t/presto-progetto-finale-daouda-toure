<div class="card- mx-auto card-w shadow text-center mb-3">
    <img src="https://picsum.photos/200" class="card-img-top" alt="Immagine dell articolo{{ $article->title }}">
    <div class="card-body">
        <h4 class="card-title">{{ $article->title }}</h4>
        <h6 class="card-text">{{ $article->price }}</h6>
    <div class="d-flex justify-content-bevenly align-items-center mt-5">
        <a href="{{ route('article.show', compact('article')) }}" class="btn btn-primary">Dettaglio</a>
        <a href="{{route('bycategory', ['category' => $article->category]) }}" 
        class="btn btn-info">{{ $article->category->name }}</a>
    </div>
</div>
</div>