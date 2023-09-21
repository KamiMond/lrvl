@extends('layouts.main')
@section('title') Категория новости: {{$categoryNews['title']}} @parent @stop
@section('content')
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 mt-1">
            <div >
                <h1>{{$categoryNews['title']}}</h1>
                <a href="<?=route('news') ?>">Перейти к новостям</a>
            </div>
            <div class="align-self-center">
                <h2>{{$categoryNews['description']}}</h2>
            </div>
        </div>
    </div>
@endsection







