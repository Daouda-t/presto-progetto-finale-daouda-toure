<x-layout>
    <div class="container-fluid pt-5">

        <div class="row justify-content-center mb-4">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="rounded shadow bg-body-secondary p-3">
                    <h1 class="display-5 text-center mb-0">
                        Revisor Dashboard
                    </h1>
                </div>
            </div>
        </div>

        @if ($article_to_check)
            <div class="row g-4">
                <div class="col-12 col-lg-8">
                    <div class="row g-3">
                        @if ($article_to_check->images->count())
                            @foreach ($article->images as $key => $image)
                                <div class="carousel-item @if ($loop->first) active @endif">
                                    <img src="{{ $image->getFullUrl(300, 300) }}" class="d-block w-100 rounded shadow"
                                     alt="Immagine {{ $key + 1 }} dell'articolo {{ $article->title }}">
                                </div>
                            @endforeach
                        @else
                            @for ($i = 0; $i < 6; $i++)
                                <div class="col-6 col-md-4 mb-4 text-center">
                                    <img
                                        src="https://picsum.photos/300?random={{ $i }}"
                                        alt="Immagine segnaposto"
                                        class="img-fluid rounded shadow"
                                    >
                                </div>
                            @endfor
                        @endif
                    </div>
                </div>

                <div class="col-12 col-lg-4 ps-lg-4 d-flex flex-column justify-content-between">
                    <div>
                        <h1>{{ $article_to_check->title }}</h1>
                        <h3>Autore: {{ $article_to_check->user->name }}</h3>
                        <h4>{{ $article_to_check->price }} €</h4>
                        <h4 class="fst-italic text-muted">
                            #{{ $article_to_check->category->name }}
                        </h4>
                        <p class="h6">{{ $article_to_check->description }}</p>
                    </div>

                    <div class="d-flex gap-3 pb-4 justify-content-start mt-4">
                        <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-danger py-2 px-5 fw-bold">
                                Rifiuta
                            </button>
                        </form>

                        <form action="{{ route('accept', ['article' => $article_to_check]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-success py-2 px-5 fw-bold">
                                Accetta
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <div class="row justify-content-center align-items-center text-center py-5">
                <div class="col-12">
                    <h1 class="fst-italic display-4">
                        Nessun articolo da revisionare al momento!
                    </h1>
                    <a href="{{ route('homepage') }}" class="mt-5 btn btn-success">
                        Torna alla homepage
                    </a>
                </div>
            </div>
        @endif

        @if (session()->has('message'))
            <div class="row justify-content-center mt-4">
                <div class="col-12 col-md-6 alert alert-success text-center shadow rounded">
                    {{ session('message') }}
                </div>
            </div>
        @endif
    </div>
</x-layout>