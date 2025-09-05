@extends('ads.layout')

@section('content')
<div class="container">
    <h2 class="mb-4">Create a new Ad</h2>

    <form action="{{ route('ads.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror"
                   id="title" name="title" value="{{ old('title') }}" required>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-control @error('category_id') is-invalid @enderror"
                    id="category_id" name="category_id" required>
                <option value="">Please select a category</option>
                @foreach(\App\Models\Category::all() as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror"
                      id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control @error('price') is-invalid @enderror"
                   id="price" name="price" value="{{ old('price') }}" required step="0.01">
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control @error('location') is-invalid @enderror"
                   id="location" name="location" value="{{ old('location') }}" required>
            @error('location')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="condition" class="form-label">Condition</label>
            <select class="form-control @error('condition') is-invalid @enderror"
                    id="condition" name="condition" required>
                <option value="new" {{ old('condition') == 'new' ? 'selected' : '' }}>New</option>
                <option value="good" {{ old('condition') == 'good' ? 'selected' : '' }}>Good condition</option>
                <option value="used" {{ old('condition') == 'used' ? 'selected' : '' }}>Used</option>
            </select>
            @error('condition')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="photos" class="form-label">Pictures</label>
            <input type="file" class="form-control @error('photos.*') is-invalid @enderror"
                   id="photos" name="photos[]" multiple accept="image/*">
            @error('photos.*')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Create Ad</button>
        <a href="{{ route('ads.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
