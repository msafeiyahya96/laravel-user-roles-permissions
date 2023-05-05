@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h2>Edit permission</h2>
        <div class="lead">
            Editing permission.
        </div>
        <div class="container mt-4">
            <form action="{{ route('permissions.update', $permission->id) }}" method="post">
                @method('PATCH')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $permission->name) }}" placeholder="Name" required>
                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Update Permission</button>
                <a href="{{ route('permissions.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>
    </div>
@endsection