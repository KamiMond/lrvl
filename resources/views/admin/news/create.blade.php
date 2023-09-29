@extends('layouts.admin')
@section('content')
    @include('inc.message')
    <form method="post" enctype="multipart/form-data" action="{{ route('admin.news.store') }}">
        @csrf
        <div class="mb-3">
            <label for="titleNews" class="form-label">Название новости</label>
            <input type="text" class="form-control" name="title" id="titleNews" placeholder="Ведите заголовок" value="{{ old('title') }}">
        </div>

        <div class="mb-3">
            <label for="authorNews" class="form-label">Автор</label>
            <input type="text" class="form-control" name="author" id="authorNews" placeholder="Укажите втора" value="{{ old('author') }}">
        </div>

        <div class="mb-3">
            <label for="descriptionNews" class="form-label">Описание</label>
            <textarea class="form-control" name="description" id="descriptionNews" placeholder="Добавьте описание" rows="3">{{ old('description') }}</textarea>
        </div>

        <select class="form-select mb-3" name="status" aria-label="statusNews">
            <option selected>Open this select menu</option>
            <option @if(old('status') === 'DRAFT') selected @endif >DRAFT</option>
            <option @if(old('status') === 'ACTIVE') selected @endif >ACTIVE</option>
            <option @if(old('status') === 'BLOCKED') selected @endif >BLOCKED</option>
        </select>

        <select class="form-select mb-3" name="category_id" aria-label="statusNews">
            @foreach($categories as $category)
                <option value="{{$category->id}}" @selected($category->id == old('category_id')) >{{$category->title}}</option>
            @endforeach
        </select>

        <input type="file" name="img" placeholder="Загрузить изображение" id="image">
        <button class="btn btn-primary mt-2" type="submit">Сохранить</button>
    </form>
@endsection
