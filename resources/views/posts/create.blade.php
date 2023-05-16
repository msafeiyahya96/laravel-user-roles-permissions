@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h2>Add new post</h2>
        <div class="lead">
            Add new post.
        </div>
        <div class="container mt-4">
            <form action="{{ route('posts.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" placeholder="Title" required>
                    @if ($errors->has('title'))
                        <span class="text-danger text-left">{{ $errors->first('title') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" name="description" id="description" class="form-control" value="{{ old('description') }}" placeholder="Description" required>
                    @if ($errors->has('description'))
                        <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    <textarea name="body" id="body" class="form-control">{{ old('body') }}</textarea>
                    @if ($errors->has('body'))
                        <span class="text-danger text-left">{{ $errors->first('body') }}</span>
                    @endif
                </div>

                @can('posts.store')
                    <button type="submit" class="btn btn-primary">Save Post</button>
                @endcan
                <a href="{{ route('posts.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>
    </div>
@endsection