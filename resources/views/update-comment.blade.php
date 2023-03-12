@extends('layouts.app')

@section('title-block')
    Редактирование коммента
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Комментарий #{{ $comment->id }}</h1>
</div>
    <h2>Редактирование коммента</h2>

    <form action="{{ route('comment-update-submit', [$data->id, $comment->id]) }}" method="post">
    @csrf
    
    <div class="form-group">
            <label for="commentator">Введите имя</label>
            <input type="text" name="commentator" value="{{$comment->commentator}}" placeholder="Введите имя" id="commentator" class="form-control">
        </div>
        <div class="form-group">
            <label for="comment">Комментарий</label>
            <input type="text" name="comment" value="{{$comment->comment}}" placeholder="Тема сообщения" id="comment" class="form-control">
        </div>
        <div class="form-group">
            <input type="file" name="image">
        </div>
        <br>
        <button type="submit" class="btn btn-success">Обновить</button>
    </form>
@endsection