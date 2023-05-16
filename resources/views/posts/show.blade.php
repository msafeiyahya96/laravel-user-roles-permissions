@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h2>Show post</h2>
        <div class="lead">
            Detail post.
        </div>
        <div class="container mt-4">
            <div>
                Title: {{ $post->title }}
            </div>
            <div>
                Description: {{ $post->description }}
            </div>
            <div>
                Body: {{ $post->body }}
            </div>
        </div>
        <div class="mt-4">
            @can('posts.edit')
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info">Edit</a>
            @endcan
            <a href="{{ route('posts.index') }}" class="btn btn-default">Back</a>
        </div>
    </div>
@endsection