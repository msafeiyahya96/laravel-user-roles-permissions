@extends('layouts.auth-master')

@section('content')
    <form action="{{ route('login.perform') }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <img src="{!! url('images/bootstrap-logo.svg') !!}" alt="" class="mb-4" width="72" height="57">

        <h1 class="h3 mb-3 fw-normal">Login</h1>

        @include('layouts.partials.messages')

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="username" id="" value="{{ old('username') }}" placeholder="Username" required="required" autofocus>
            <label for="floatingName">Email or Username</label>
            @if ($errors->has('username'))
                <div class="text-danger text-left">{{ $errors->first('username') }}</div>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password" id="" value="{{ old('password') }}" placeholder="Password" required="required">
            <label for="floatingPassword">Password</label>
            @if ($errors->has('password'))
                <div class="text-danger text-left">{{ $errors->first('password') }}</div>
            @endif
        </div>

        <button type="submit" class="w-100 btn btn-lg btn-primary">Login</button>

        @include('layouts.partials.copy')
    </form>
@endsection