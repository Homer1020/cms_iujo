@extends('layouts.dashboard')

@section('content')
  <section class="container-fluid">
    <div class="my-3">
      <h1 class="h3 text-uppercase mb-3">Editar Categoría</h1>
      <a href="{{ route('categories.index') }}" class="btn btn-primary">Ver categorias</a>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card card-body">
          <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            @include('categories.form')
            <input type="submit" value="Guardar" class="btn btn-success">
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection
