@extends('layouts.main')

@section('container')
    
<div class="row justify-content-center">
    <div class="col-lg-8">
        <main class="form-signin">
            <h1 class="h3 mb-3 fw-normal text-center mt-2">Please Login</h1>
            <form action="/login" method="post">
              @csrf
              <div class="form-floating">
                <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" autofocus required>
                <label for="email">Email Address</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password123" required>
                    <label for="password">Password</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
            </form>
            <small class="d-block text-center mt-3">
                Not registered? <a href="/register">Register Now</a>
            </small>
        </main>
    </div>
</div>
@endsection