@extends('layouts.app')

@section('title-block')
    Новый пост
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить пост</h1>
</div>
@include('inc.messages')

    <form action="{{ route('blog-form') }}" method="post">
    @csrf
    <div class="form-group">
            <label for="author_name">Введите имя автора</label>
            <input type="text" name="author_name" placeholder="Введите имя автора" id="author_name" class="form-control">
        </div>
        <div class="form-group">
            <label for="blog_title">Введите название поста</label>
            <input type="text" name="blog_title" placeholder="Введите название книги" id="blog_title" class="form-control">
        </div>
        <div class="form-group">
            <label for="content">Содержание поста</label>
            <textarea name="content" placeholder="Введите краткое описание книги" id="content" class="form-control"></textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-success">Добавить</button>
    </form>
@endsection