@extends('layouts.app')


@section('content')
    <div class="card text-center col-8 offset-2 ">
        <div class="card-header">
            POST N: {{ $post->id }}
        </div>
        <div class="my-3">
            @if (filter_var($post->image_url, FILTER_VALIDATE_URL))
                <img class="w-50" src="{{ $post->image_url }}" class="card-img-top" alt="imge {{ $post->title }}">
            @else
                <img class="w-50" src="{{ asset('storage/' . $post->image_url) }}" class="card-img-top" alt="image">
            @endif

        </div>
        <div class="card-body">
            <h3 class="card-title">{{ $post->user->name }}</h3>
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->description }}</p>
            <p class="card-text">
                POST DATE : {{ $post->sale_date }}
            </p>
            <p>
                @if (isset($post->tags))
                    TAG :
                    @foreach ($post->tags as $tag)
                        {{ $tag->name }}
                    @endforeach
                @else
                    No tag
                @endif

            </p>
        </div>
        <div class="card-footer d-flex justify-content-center">
            <div class="mx-3">
                <a class="btn btn-success" href="#">
                    Edit
                </a>
            </div>
            <div class="mx-3">
                <form action="#" class="delete-method" method="POST">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger" type="submit">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
