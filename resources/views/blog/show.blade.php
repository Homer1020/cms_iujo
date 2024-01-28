@extends('layouts.app')

@section('content')
<div class="container">
  <div style="background-image: url({{ asset("storage/posts/{$post->thumbnail}") }})" class="banner">
    <div class="container text-white">
      <h1 class="display-4">{{ $post->title }}</h1>
      <p class="lead">{{ $post->excerpt }}</p>
    </div>
  </div>
  <div>
    
  <div class="mt-2 d-flex">
    <p class="text-muted m-0 me-3"><strong>Categoria:</strong> {{ $post->category->category }}</p>
    <p class="text-muted m-0 me-3"><strong>Escrito por:</strong> {{ $post->user->name }}</p>   
    <p class="text-muted m-0 me-3"><strong>Fecha:</strong> {{ $post->created_at }}</p>   
  </div>
  </div>
  <div class="content mt-3">
    {!!  $post->content !!}
  </div>
</div>
@endsection
