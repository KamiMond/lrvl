@extends('layouts.main')
@section('title') Главная страница @parent @stop
@section('content')

<main>
    <h1 class="visually-hidden">Heroes examples</h1>

    <div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
               <img src="{{$img}}">
            </div>
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Все обо всем</h1>
                <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <a href="{{route('categoryNews')}}">Читать новости</a>
                </div>
            </div>
        </div>
    </div>

</main>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>


@endsection
