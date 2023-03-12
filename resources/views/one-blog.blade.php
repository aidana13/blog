@extends('layouts.app')

@section('title-block')
    Блог
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Пост #{{ $data->id }}</h1>
</div>
@include('inc.messages')
        <div class="alert alert-info">
        <h3>{{ $data->blog_title }}</h3>
            <p>{{ $data->content }}</p>
            <br>
            <p>{{ $data->author_name }}</p>
            <p><small>{{ $data->created_at }}</small></p>
            <a href="{{ route('blog-update', $data->id) }}"><button class="btn btn-primary">Редактирование</button></a>
            <a href="{{ route('blog-delete', $data->id) }}"><button class="btn btn-danger">Удаление</button></a>
        </div>
<br>
<form action="{{ route('comment-form', $data->id) }}" enctype="multipart/form-data" method="post">
    @csrf
    
    <div class="alert alert-info">
    <div class="form-group">
            <input type="text" name="commentator" placeholder="Ваше имя.." id="commentator" class="form-control">
        </div>
        <div class="form-group">
            <input type="text" name="comment" placeholder="Ваш комментарий..." id="comment" class="form-control">
        </div>
        <div class="form-group">
            <input type="file" name="image">
        </div>
        <br>
        <button type="submit" class="btn btn-success">Добавить</button>
    </div>
    </form>

    <br><br>
@if(isset($comments)&&!empty($comments))
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
            @foreach($comments as $com)
            <div class="comment">
                <p><strong>Имя    </strong>{{ $com->commentator }}</p>
                <p><strong>Комментарий    </strong>{{ $com->comment }}</p>
                <img src="{{ $com->image }}">
                <a href="{{ route('comment-one', [$data->id, $com->id] ) }}">More</a>
            </div>
            <br>
            @endforeach
        </div>
        </div>
@endif
@endsection

