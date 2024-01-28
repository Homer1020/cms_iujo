@extends('layouts.dashboard')

@section('content')
  <section class="container-fluid">
    <div class="my-3">
      <h1 class="h3 text-uppercase mb-3">Mis publicaciones</h1>
      <a href="{{ route('blog.create') }}" class="btn btn-primary">Agregar entrada</a>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div>
          <table class="table table-bordered table-responsive">
            <thead>
              <tr>
                <th>Miniatura</th>
                <th>Titulo</th>
                <th>Slug</th>
                <th>Extracto</th>
                <th>Categoria</th>
                <th>Creacion</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($posts as $post)
                <tr>
                  <td>
                    <img src="{{ asset("storage/posts/{$post->thumbnail}") }}" alt="" width="120 " style="aspect-ratio: 16/9; object-fit: cover;">
                  </td>
                  <td>{{ $post->title }}</td>
                  <td>{{ $post->slug }}</td>
                  <td>{{ $post->excerpt }}</td>
                  <td>
                    <span class="badge bg-dark">
                      {{ $post->category->category }}
                    </span>
                  </td>
                  <td>{{ $post->created_at->diffForHumans() }}</td>
                  <td>
                    <form action="{{ route('blog.destroy', $post) }}" method="POST" class="d-inline-block">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                    <a href="{{ route('blog.edit', $post) }}" class="btn btn-warning btn-sm">Editar</a>
                    <a href="{{ route('blog.show', $post) }}" class="btn btn-info btn-sm">Ver entrada</a>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="7">
                    <div class="alert m-0 alert-primary">
                      No tiene publicaicones aun
                    </div>
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
@endsection
