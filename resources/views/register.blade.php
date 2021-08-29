@extends('layout') @section('content')

<div class="login-div">
    <form class="login-form" method="POST">
    @csrf
    <h1 class="login-top-text">Please Register Here</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
    <div class="alert alert-success">Registration has been done successfully</div>
    @elseif (session('not_success'))
    <div class="alert alert-danger">Registration can not be done. Please try later</div>
    @endif
    <div class="mb-3">
        <label for="exampleInputUsername" class="form-label">Username</label>
        <input type="text" class="form-control" id="exampleInputUsername" name="username" placeholder="Create username" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputName" class="form-label">Full Name</label>
        <input type="text" class="form-control" id="exampleInputName" name="name" placeholder="Your full name" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail" class="form-label">Email</label>
        <input type="email" class="form-control" id="exampleInputEmail" name="email" placeholder="Your email address" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Create Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Create a strong password" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputCPassword1" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="exampleInputCPassword1" name="confirm_password" placeholder="Confirm your password" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection