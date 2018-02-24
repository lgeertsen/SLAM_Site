@extends('layouts.app')

@section('customCSS')
  <style media="screen">
  .container-fluid,
  .row {
    height: 100%;
  }
  .container-fluid {
    background-image: url('{{$sports[array_rand($sports->toArray(), 1)]->url}}');
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }
  h3 {
    text-align: center;
  }
  .submit {
    text-align: center;
  }
  .card {
    background-color: rgba(255, 255, 255, 0.8);
  }
  .card-body {
    padding-bottom: 0;
  }
  </style>
@endsection

@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center align-items-center">
      <div class="col-sm-12 col-md-5">
        <div class="card">

          <div class="card-body">
            <h3>Login</h3>
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
              {{ csrf_field() }}

              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email">E-Mail Address</label>

                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                  <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif
              </div>

              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password">Password</label>

                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                  <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                @endif
              </div>

              <div class="form-group">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                  </label>
                </div>
              </div>

              <div class="form-group">
                <div class="submit">
                  <button type="submit" class="btn btn-primary">
                    Login
                  </button>
                  <hr/>
                  <a class="btn btn-link" href="{{ route('password.request') }}">
                    Forgot Your Password?
                  </a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
