@extends('layouts.main')
@foreach($categoryNews as $category)
    @section('title') Категория новости: {{ $category['id']}} @parent @stop

    @section('content')
        <div class="container">
            {{--        @forelse($categoryNews as $category)--}}
            <div class="row row-cols-1 row-cols-sm-2 mt-1">
                <div >
                    <h1>{{$category['title']}}</h1>
                    <a href="<?=route('news') ?>">Перейти к новостям</a>
                </div>
                <div class="align-self-center">
                    <h2>{{$category['description']}}</h2>
                </div>
            </div>

        </div>
    @endsection
@endforeach







