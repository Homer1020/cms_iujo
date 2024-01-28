@extends('layouts.dashboard')

@section('content')
  <section class="container-fluid">
    <div class="my-3">
      <h1 class="h3 text-uppercase mb-3">Editar publicacion</h1>
      <a href="{{ route('blog.index') }}" class="btn btn-primary">Ver entradas</a>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card card-body">
          <form action="{{ route('blog.update', $post) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('blog.form')
            <input type="submit" value="Guardar" class="btn btn-success">
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection
