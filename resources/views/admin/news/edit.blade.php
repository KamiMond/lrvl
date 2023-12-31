@extends('layouts.admin')
@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert :message="$error" type="danger"></x-alert>
        @endforeach
    @endif
    @include('inc.message')
    <form method="post" enctype="multipart/form-data" action="{{ route('admin.news.update', $news) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="titleNews" class="form-label">Редактировать новость</label>
            <input type="text" class="form-control" name="title"
                   id="titleNews" placeholder="Новость"
                   value="{{old('title') ?? $news->title}}">
        </div>

        <select class="form-select mb-3" name="category_id" aria-label="statusNews">
            @foreach($categories as $category)
                <option value="{{$category->id}}"
                    @selected(old('category_id', $news->category_id) == $category->id)>
                    {{$category->title}}
                </option>
            @endforeach
        </select>

        <div class="mb-3">
            <label for="authorNews" class="form-label">Автор</label>
            <input type="text" class="form-control" name="author" id="authorNews" placeholder="Автор" value="{{old('author') ?? $news->author}}">
        </div>

        <div class="mb-3">
            <label for="descriptionNews" class="form-label">Описание</label>
            <textarea class="form-control" name="description" id="descriptionNews" placeholder="Описание" rows="3">
                {{old('description') ?? $news->description}}
            </textarea>
        </div>

        <select class="form-select mb-3" name="status" aria-label="statusNews">
            @foreach(\App\Enums\News\Status::getEnums() as $enum)
                <option @selected(old('status', $news->status) === $enum) >
                    {{ $enum }}
                </option>
            @endforeach
        </select>

        <div class="mb-3">
            <label for="image">Изображение</label>
            <IMG src="{{$news->img}}" width="100">
            <input type="file" class="form-control" name="img" id="image">
        </div>

        <button class="btn btn-primary mt-2" type="submit">Изменить</button>
    </form>
@endsection
