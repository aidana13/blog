@extends('layouts.app')

@section('title-block')
    Редактирование поста
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Блог #{{ $data->id }}</h1>
</div>
    <h2>Редактирование поста</h2>

    <form action="{{ route('blog-update-submit', $data->id) }}" method="post">
    @csrf
    
    <div class="form-group">
            <label for="author_name">Введите имя</label>
            <input type="text" name="author_name" value="{{$data->author_name}}" placeholder="Введите имя" id="author_name" class="form-control">
        </div>
        <div class="form-group">
            <label for="blog_title">Тема сообщения</label>
            <input type="text" name="blog_title" value="{{$data->blog_title}}" placeholder="Тема сообщения" id="blog_title" class="form-control">
        </div>
        <div class="form-group">
            <label for="content">Сообщение</label>
            <textarea name="content" placeholder="Введите сообщение" id="content" class="form-control">{{$data->content}}</textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-success">Обновить</button>
    </form>
@endsection