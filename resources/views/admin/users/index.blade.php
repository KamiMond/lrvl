@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список пользователей</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.users.create') }}">Добавить пользователя</a>
            </div>
        </div>
    </div>
    <div class="table-responsive small">
        @include('inc.message')

        <select id="filter">
            <option>selected</option>
            <option>{{\App\Enums\News\Status::DRAFT->value}}</option>
            <option>{{\App\Enums\News\Status::ACTIVE->value}}</option>
            <option>{{\App\Enums\News\Status::BLOCKED->value}}</option>
        </select>

        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Имя</th>
                <th scope="col">E-mail</th>
                <th scope="col">Дата регистрации</th>
                <th scope="col">Группа юзеров</th>
            </tr>
            </thead>
            <tbody>
            @forelse($usersList as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>
                        @if($user->is_admin === true)
                            <a href="{{ route('admin.isadmin', $user) }}" type="button" class="btn btn-danger">Разжаловать</a>
                        @else
                            <a href="{{ route('admin.isadmin', $user) }}" type="button" class="btn btn-success">Назначить</a>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.users.edit', $user) }}" type="button" class="btn">Редактировать</a>
                        <form method="post" enctype="multipart/form-data" action="{{ route('admin.users.destroy', $user) }}">
                            @csrf
                            @method('DELETE')

                            <button type="submit">Удалить</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">
                        Записей нет
                    </td>
                </tr>
            @endforelse
{{--            {{$usersList->links()}}--}}
            </tbody>
        </table>
    </div>

@endsection
@push('js')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let filter = document.getElementById('filter');
            filter.addEventListener("change", function (event) {
                location.href = "?f=" + this.value;
            })
        })
    </script>
@endpush
