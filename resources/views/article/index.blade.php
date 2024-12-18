@extends('layout')
@section('content')
@use('App\Models\User', 'User')

@if(session('status'))
  <div class="alert alert-success">
      {{ session('status') }}
  </div>
@endif

<table class="table">
  <thead>
    <tr>
      <th scope="col">Дата</th>
      <th scope="col">Имя</th>
      <th scope="col">Описание</th>
      <th scope="col">Автор</th>
    </tr>
  </thead>
  <tbody>
    @foreach($articles as $article)
    <tr>
      <th scope="row">{{$article->date}}</th>
      <td><a href="/article/{{ $article->id }}">{{$article->name}}</a></td>
      <td>{{$article->desc}}</td>
      <td>{{ User::findOrFail($article->user_id)->name }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
{{ $articles->links() }}
@endsection