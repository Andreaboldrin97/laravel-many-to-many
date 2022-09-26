@extends('layouts.app')


@section('content')
    <div class="card text-center col-8 offset-2 ">
        <div class="card-header">
            CATEGORY N: {{ $category->id }}
        </div>
        <div>
            <div class="mx-5" style="background-color: {{ $category->color }}">
                {{ $category->name }}
            </div>
        </div>
        {{-- SHOW OF THE POSTS --}}
        <div class="col-8 mt-3 offset-2">
            @foreach ($category->posts as $post)
                <div class="border border-primary mt-3">
                    <div class="my-3">
                        @if (filter_var($post->image_url, FILTER_VALIDATE_URL))
                            <img class="w-50" src="{{ $post->image_url }}" class="card-img-top"
                                alt="imge {{ $post->title }}">
                        @else
                            <img class="w-50" src="{{ asset('storage/' . $post->image_url) }}" class="card-img-top"
                                alt="image">
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
                        <p>
                            CATEGORY :
                            <span class="badge badge-fill p-2"
                                @if (isset($post->category)) style="background-color:{{ $post->category->color }}">
                                {{ $post->category->name }}
                                @else
                                style="background-color:red">
                                ------- @endif
                                </span>
                        </p>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <div class="mx-3">
                            <form action="{{ route('admin.removeCategoryFromPost', $post->id) }}" class="delete-method"
                                method="POST">
                                @csrf
                                @method('PUT')

                                <button class="btn btn-warning" type="submit">
                                    DELETE THE POST FROM THE CATEGORY
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
