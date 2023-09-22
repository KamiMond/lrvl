@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список категорий</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{route('admin.categories.create')}}">Добавить категорию</a>
            </div>
        </div>
    </div>

    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Заголовок</th>
                <th scope="col">Статус</th>
                <th scope="col">Автор</th>
                <th scope="col">Дата создания</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categoriesNewsList as $category)

                <tr>
                    <td>{{$category['id']}}</td>
                    <td>{{$category['title']}}</td>
                    <td>{{$category['description']}}</td>
                    <td><a href="">Редактировать</a><a href="" style="color: red">Удалить</a> </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">
                        Нет записей
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
