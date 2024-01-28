@extends('layouts.dashboard')

@section('content')
  <section class="container-fluid">
    <div class="my-3">
      <h1 class="h3 text-uppercase mb-3">Categorias</h1>
      <a href="{{ route('categories.create') }}" class="btn btn-primary">Crear categoria</a>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div>
          <ul class="list-group mb-3">
            @foreach ($categories as $category)
              <li class="list-group-item d-md-flex justify-content-between p-3">
                <div class="mb-3 mb-0">
                  <p class="mb-1"><strong>Categoría:</strong> {{ $category->category }}</p>
                  <p class="mb-1"><strong>Slug:</strong> {{ $category->slug }}</p>
                </div>

                <div>
                  <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                  </form>
                  <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning btn-sm">Editar</a>
                  <a href="{{ route('categories.show', $category) }}" class="btn btn-info btn-sm">Ver categoría</a>
                </div>
              </li>
            @endforeach
          </ul>
          {{ $categories->links('vendor.pagination.bootstrap-5') }}
        </div>
      </div>
    </div>
  </section>
@endsection
