@extends('layouts.app')
    @section('title') Категория новости: {{$category->id}} @parent @stop
    @section('content')
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 mt-1">
                <div >
                    <h1>{{$category['title']}}</h1>
                    <a href="<?=route('news') ?>">Перейти к новостям</a>
                </div>
                <div class="align-self-center">
                    <h2>{{$category['description']}}</h2>
                </div>
            </div>
            <h2>Похожие новости</h2>
            @forelse($categoryNews->news as $news)
                <div class="col">
                    <div class="card shadow-sm mb-3">
                        <div class="card-body">
                            <p class="card-text">{{$news->title}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ route('news.show', $news) }}"Показать</a>
                                </div>
                                <small class="text-body-secondary">{{$news->author}} ({{$news->created_at}})</small>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <h2>Новостей нет</h2>
            @endforelse
        </div>
    @endsection
