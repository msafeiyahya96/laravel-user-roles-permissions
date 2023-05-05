@extends('layouts.app-master')

@section('content')
    <h1 class="mb-3">Index Posts</h1>
    <div class="bg-light p-4 rounded">
        <h2>Posts</h2>
        <div class="lead">
            Manage your posts here.
            <a href="{{ route('posts.create') }}" class="btn btn-primary btn-sm float-right">Add Post</a>
        </div>

        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>

        <table class="table-bordered">
            <thead>
                <tr>
                    <th width="1%">No</th>
                    <th>Title</th>
                    <th width="3%" colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info btn-sm">Show</a>
                        </td>
                        <td>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        </td>
                        <td>
                            {!! Form::open(['method' => 'DELETE', 'route' => 'posts.destroy', $post->id], 'style' => 'display:inline') !!}
                            {!! Form::submit(['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex">
            {!! $posts->links('pagination::bootstrap-5') !!}
        </div>
    </div>
@endsection