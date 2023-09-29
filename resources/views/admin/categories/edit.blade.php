@extends('layouts.admin')
@section('content')
    @include('inc.message')
    <form method="post" action="{{ route('admin.categories.update', $category) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="titleNews" class="form-label">Редактировать категорию</label>
            <input type="text" class="form-control" name="title" id="titleNews" placeholder="Категория" value="{{old('title') ?? $category->title}}">
        </div>
        <div class="mb-3">
            <label for="descriptionNews" class="form-label">Описание</label>
            <textarea class="form-control" name="description" id="descriptionNews" rows="3">
                {{old('description') ?? $category->description}}
            </textarea>
        </div>
        <button class="btn btn-primary mt-2" type="submit">Редактировать</button>
    </form>
@endsection
