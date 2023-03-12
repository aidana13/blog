@extends('layouts.app')

@section('title-block')
    Комментарий
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Комментарий #{{ $comment->id }}</h1>
</div>
@include('inc.messages')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="comment">
            <p><strong>Имя</strong>{{ $comment->commentator }}</p>
            <p><strong>Комментарий</strong>{{ $comment->comment }}</p><br>
            <img src="{{ $comment->image }}">
            <a href="{{ route('comment-update', [$data->id, $comment->id]) }}">Редактировать</a>
            <a href="{{ route('comment-delete', [$data->id, $comment->id]) }}">Удалить</a>
        </div>
    </div>
</div>
@endsection


