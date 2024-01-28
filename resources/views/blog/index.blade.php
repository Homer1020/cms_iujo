@extends('layouts.app')

@section('content')
<div class="container">
	{{ $posts->links('vendor.pagination.bootstrap-5') }}
	<div class="row">
		@foreach ($posts as $post)
			<div class="col-md-4 mb-3">
				<article class="card">
					<img src="{{ asset("storage/posts/{$post->thumbnail}") }}" alt="" class="card-img-top">
					<div class="card-body">
						<h2 class="card-title h5">{{ $post->title }}</h2>
						<p class="card-text">{{ $post->excerpt }}</p>
						<a href="{{ route('blog.show', $post) }}" class="btn btn-success">Ver publicacion</a>
				</article>
			</div>
		@endforeach
  </div>
</div>
@endsection
