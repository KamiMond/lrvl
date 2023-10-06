@extends('layouts.admin')
@section('content')

    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert :message="$error" type="danger"></x-alert>
        @endforeach
    @endif

    @include('inc.message')
    <form method="post" enctype="multipart/form-data" action="@if(isset($user)) {{ route('admin.users.update', $user) }}@else{{ route('admin.users.store') }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Создать нового пользователя</label>
            <input type="text" class="form-control" name="name"
                   id="name" placeholder="Пользователь"
                   value="{{old('name') ?? $user->name}}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="text" class="form-control" name="email"
                   id="email" placeholder="ivan@ivanov.ru"
                   value="{{old('email') ?? $user->email}}">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Описание</label>
            <textarea class="form-control" name="password" id="password" rows="3">
                {{old('password') ?? $user->password}}
            </textarea>
        </div>

        <button class="btn btn-primary mt-2" type="submit">Создать</button>
    </form>
@endsection
