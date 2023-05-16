@extends('layouts.app-master')

@section('content')
    <h1 class="mb-3">Index Roles</h1>

    <div class="bg-light p-4 rounded">
        <h1>Roles</h1>
        <div class="lead">
            Manage your roles here.
            @can('roles.create')
                <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm float-right">Add role</a>
            @endcan
        </div>

        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="1%">No</th>
                    <th>Name</th>
                    <th width="3%" colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $key => $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            @can('roles.show')
                                <a href="{{ route('roles.show', $role->id) }}" class="btn btn-info btn-sm">Show</a>
                            @endcan
                        </td>
                        <td>
                            @can('roles.edit')
                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            @endcan
                        </td>
                        <td>
                            @can('roles.destroy')
                                {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display-inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex">
            {{ $roles->links('pagination::bootstrap-5') }}
        </div>
    </div>

@endsection