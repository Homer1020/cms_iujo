<div class="mb-3">
  <div id="preview-image">
    @if ($post->thumbnail)
      <img src="{{ asset("storage/posts/{$post->thumbnail}") }}" alt="" class="img-preview">
    @endif
  </div>
  <label for="thumbnail" class="btn btn-dark">Cargar imagen de miniatura</label>
  <input type="file" name="thumbnail" id="thumbnail" class="d-none @error('thumbnail') is-invalid @enderror">
  @error('thumbnail')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
</div>
<div class="mb-3">
  <label class="form-label" for="title">Título</label>
  <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Ingrese un título" value="{{ old('title', $post->title) }}">
  @error('title')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
</div>
<div class="row">
  <div class="mb-3 col-md-6">
    <label class="form-label" for="slug">Slug</label>
    <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" placeholder="Ingrese un slug" value="{{ old('slug', $post->slug) }}">
    @error('slug')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="mb-3 col-md-6">
    <label for="category" class="form-label">Categoria</label>
    <select name="category" id="category" class="form-select @error('category') is-invalid @enderror">
      <option selected disabled>Seleccione una categoria</option>
      @foreach ($categories as $category)
        <option {{ $category->id == $post->category_id ? ' selected ' : '' }} value="{{ $category->id }}">{{ $category->category }}</option>
      @endforeach
    </select>
    @error('category')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
</div>
<div class="mb-3">
  <label class="form-label" for="excerpt">Extracto</label>
  <textarea name="excerpt" id="excerpt" rows="5" class="form-control @error('excerpt') is-invalid @enderror" placeholder="Ingrese el extracto">{{ old('excerpt', $post->excerpt) }}</textarea>
  @error('excerpt')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
</div>
<div class="mb-3">
  <label class="form-label" for="content">Contenido</label>
  <textarea name="content" id="content" rows="7" class="form-control @error('content') is-invalid @enderror" placeholder="Ingrese el contenido">{{ old('content', $post->content) }}</textarea>
  @error('content')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
</div>