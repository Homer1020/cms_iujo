<div class="mb-3">
  <label class="form-label" for="category">Categoría</label>
  <input type="text" class="form-control @error('category') is-invalid @enderror" name="category" id="category" placeholder="Ingrese la categoría" value="{{ old('category', $category->category) }}">
  @error('category')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
</div>

<div class="mb-3">
  <label class="form-label" for="slug">Slug</label>
  <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" placeholder="Ingrese el slug" value="{{ old('slug', $category->slug) }}">
  @error('slug')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
</div>