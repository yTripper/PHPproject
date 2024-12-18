@extends('layout')
@section('content')

@if(session('status'))
  <div class="alert alert-success">
      {{session('status')}}
  </div> 
@endif

<div class="card text-center mb-3" style="width: 70rem;">
<div class="card-header">
    Автор: {{ $user->name }}
</div>
  <div class="card-body">
    <h5 class="card-title">{{ $article->name }}</h5>
    <p class="card-text">{{ $article->desc }}</p>
    <div class="d-flex justify-content-end gap-3">
      @can('update', $article)
        <a href="/article/{{ $article->id }}/edit" class="btn btn-primary">Редактировать статью</a>
        <form action="/article/{{ $article->id }}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-warning">Удалить статью</button>
        </form>
      @endcan
    </div>

    </div>
  </div>

  <h3 class="text-center">Добавить комментарий</h3>

  @if ($errors->any())
  <div class="alert-danger">
     <ul>
      @foreach($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
@endif

<form action="/comment" method="POST">
  @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Имя</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  <div class="mb-3">
    <label for="desc" class="form-label">Описание</label>
    <input type="text" class="form-control" id="desc" name="desc">
  </div>
  <input type="hidden" name="article_id" value="{{$article->id}}">
  <button type="submit" class="btn btn-primary">Сохранить комментарий</button>
</form>

  <h3 class="text-center">Комментарии</h3>
  <div class="row">
  @foreach($comments as $comment) 
  <div class="col-sm-6 mb-3 mb-sm-0 mt-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{$comment->name}}</h5>
        <p class="card-text">{{$comment->desc}}</p>
        @can('update_comment',$comment)
          <a href="/comment/{{$comment->id}}/edit" class="btn btn-primary">Редактировать комментарий</a>
          <a href="/comment/{{$comment->id}}/delete" class="btn btn-warning">Удалить комментарий</a>
        @endcan
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection