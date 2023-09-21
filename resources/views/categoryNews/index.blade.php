@extends('layouts.main')
@section('title') Категория новостей @parent @stop
@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Категории новостей</h1>
            </div>
        </div>
    </section>

    <div class="album py-5 bg-body-tertiary">

        <div class="container">


            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                @forelse($categoryNewsList as $category)
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <p class="card-text">{{$category['title']}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="<?=route('categoryNews.show', ['id' => $category['id']]) ?>">Подробнее</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <h2>Новостей нет</h2>
                @endforelse
            </div>

        </div>
    </div>
@endsection
