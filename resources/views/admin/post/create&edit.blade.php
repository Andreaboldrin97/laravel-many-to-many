@extends('layouts.app')


@section('content')
    <form class="col-8  offset-2 bg-dark p-4 rounded" method="POST" action="{{ $route }}" enctype="multipart/form-data">
        @method($method)
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label text-white">TITLE</label>
            @error('title')
                <p class="text-danger fs-6">
                    {{ $message }}
                </p>
            @enderror
            <input type="text" name="title" class="form-control" required value="{{ old('title', $post->title) }}"
                id="title">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label text-white">DESCRIPTION</label>
            @error('description')
                <p class="text-danger fs-6">
                    {{ $message }}
                </p>
            @enderror
            <textarea class="form-control" name="description" id="description" rows="3" required>
            {{ old('description', $post->description) }}
        </textarea>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label text-white">CATEGORY</label>
            @error('category_id')
                <p class="text-danger fs-6">
                    {{ $message }}
                </p>
            @enderror
            <select id="input-category" class="form-control" name="category_id">
                <option value="">NO CATEGORY</option>
                @foreach ($categoris as $category)
                    <option value="{{ old('category', $category->id) }}"
                        @isset($post->category)
                                {{ $category->id === $post->category->id ? 'selected' : '' }}
                            @endisset>
                        {{ old('category', $category->name) }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            @foreach ($tags as $tag)
                <div class="form-check form-switch text-white">
                    @if ($errors->any())
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"
                            name="tag[]" value="{{ $tag->id }}"
                            {{ in_array($tag->id, old('tag', [])) ? 'checked' : '' }}>
                    @else
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"
                            name="tag[]" value="{{ $tag->id }}" {{ $post->tags->contains($tag) ? 'checked' : '' }}>
                    @endif
                    <label class="form-check-label" for="flexSwitchCheckDefault">
                        {{ $tag->name }}
                    </label>
                </div>
            @endforeach
        </div>
        <div class="mb-3">
            <label for="image_url" class="form-label text-white">IMAGE_URL</label>
            @error('image_url')
                <p class="text-danger fs-6">
                    {{ $message }}
                </p>
            @enderror
            <input type="file" name="image_url" class="form-control" id="image_url" required
                value="{{ old('image_url', $post->image_url) }}">
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
    </form>
@endsection
