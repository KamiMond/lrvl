@extends('layouts.main')
@section('title') Новость {{$news['title']}} @parent @stop
@section('content')
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 mt-1">
            <div >
                <h1>{{$news['title']}}</h1>
                <img src="{{$news['img']}}">
            </div>
            <div class="align-self-center">
                <h2>{{$news['description']}}</h2>
                <p>{{$news['author']}}</p>
                <p>{{$news['created_at']}}</p>
                <p>{{$news['status']}}</p>
            </div>
        </div>
    </div>
@endsection

