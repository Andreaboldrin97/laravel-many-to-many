@extends('layouts.app')


@section('content')
    <div class="mt-3 container">
        @if (session('create'))
            <div class="alert alert-success">
                {{ session('create') }} : questo elemento è stato creato corettamente
            </div>
        @endif
        @if (session('delete'))
            <div class="alert alert-danger">
                {{ session('delete') }} : questo elemento è stato eliminato corettamente
            </div>
        @endif
        INDEX POSTS
        <table class="table table-dark table-striped">
            <thead>
                <th>ID</th>
                <th>NAME</th>
                <th>COLOR</th>
                <th class="col-2">
                    <a class="nav-link btn-outline-info" href="{{ route('admin.category.create') }}">NEW CATEGORY</a>
                </th>

            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>
                            <a href="{{ route('admin.category.show', $category->id) }}">
                                {{ $category->name }}
                            </a>
                        </td>
                        <td>
                            <span class="badge badge-fill p-2" style="background-color:{{ $category->color }}">
                                {{ $category->color }}
                            </span>
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{ route('admin.category.edit', $category->id) }}">
                                Edit
                            </a>
                            <form action="{{ route('admin.category.destroy', $category->id) }}"
                                class="delete-method d-inline" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger" type="submit">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Non ci sono post da visualizzare</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
