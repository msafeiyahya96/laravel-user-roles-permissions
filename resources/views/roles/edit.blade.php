@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Update Role</h1>
        <div class="lead">
            Edit role and manage permissions.
        </div>

        <div class="container mt-4">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There where some problems with your input. <br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <form action="{{ route('roles.update', $role->id) }}" method="post">
            @method('PATCH')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $role->name) }}" placeholder="Name" class="form-control" required>
            </div>

            <label for="permissions" class="form-label">Assign Permissions</label>

            <table class=" table table-striped">
                <thead>
                    <tr>
                        <th scope="col" width="1%"><input type="checkbox" name="all_permissions"></th>
                        <th scope="col" width="20%">Name</th>
                        <th scope="col" width="1%">Guard</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>
                                <input type="checkbox" name="permission[{{ $permission->name }}]" value="{{ $permission->name }}" class="permission" {{ in_array($permission->name, $rolePermissions) ? 'checked' : '' }}>
                            </td>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->guard_name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @can('roles.update')
                <button type="submit" class="btn btn-primary">Update change</button>
            @endcan
            <a href="{{ route('roles.index') }}" class="btn btn-default">Back</a>
        </form>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('[name=all_permissions]').on('click', function() {
                if($(this).is(':checked')) {
                    $.each($('.permission'), function() {
                        $(this).prop('checked', true);
                    });
                } else {
                    $.each($('.permission'), function() {
                        $(this).prop('checked', false);
                    });
                }
            });
        });
    </script>
@endsection