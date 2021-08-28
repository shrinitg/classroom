@extends('layout') @section('content')

<div class="login-div">
    <form class="login-form" method="POST">
    @csrf
    <h1 class="login-top-text">Please Login Here</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="mb-3">
        <label for="exampleInputUsername" class="form-label">Username</label>
        <input type="text" class="form-control" id="exampleInputUsername" name="username" placeholder="Enter your username">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Enter your password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection