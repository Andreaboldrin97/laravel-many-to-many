@extends('layouts.app')


@section('content')
    <form class="col-8  offset-2 bg-dark p-4 rounded" method="POST" action="{{ $route }}">
        @method($method)
        @csrf

        <div class="row">
            <div class="mb-3 col-9">
                <label for="name" class="form-label text-white">TITLE</label>
                @error('name')
                    <p class="text-danger fs-6">
                        {{ $message }}
                    </p>
                @enderror
                <input type="text" name="name" class="form-control" required value="{{ old('name', $category->name) }}"
                    id="name">
            </div>

            <div class="mb-3 col-3">
                <label for="color" class="form-label text-white">TITLE</label>
                @error('color')
                    <p class="text-danger fs-6">
                        {{ $message }}
                    </p>
                @enderror
                <input type="color" name="color" class="form-control" required
                    value="{{ old('color', $category->color) }}" id="color">
            </div>
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
    </form>
@endsection
