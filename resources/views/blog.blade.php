@extends('layouts.app')

@section('title-block')
    Блог
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Лента</h1>
</div>
@include('inc.messages')
    @foreach($data as $el)
        <div class="alert alert-info">
            <h3>{{ $el->blog_title }}</h3>
            <p>{{ $el->author_name }}</p>
            <p><small>{{ $el->created_at }}</small></p>
            <a href="{{ route('blog-one', $el->id) }}"><button class="btn btn-success">Детальнее</button>
        </div>
    @endforeach
@endsection

