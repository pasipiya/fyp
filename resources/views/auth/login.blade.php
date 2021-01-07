@extends('dashboard.layouts.app')

@section('content')
<div class="row">
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
      <div class="login-brand login-brand-color">
          <img alt="image" src="{{asset('admin/assets/img/logo.png')}}" />
      </div>
      <div class="card">
        <div class="card-header card-header-auth">
          <h4>Login</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
            <div class="form-group">
              <label for="email" >{{ __('E-Mail Address') }}</label>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
              @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
            </div>
            <div class="form-group">
              <div class="d-block">
                <label for="password" >{{ __('Password') }}</label>
                <div class="float-right">
                    @if (Route::has('password.request'))
                    <a class=" text-small" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
                </div>
              </div>
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-lg btn-block btn-auth-color" tabindex="4">
                Login
              </button>
            </div>
          </form>
          <div class="text-center mt-4 mb-3">
            Don't have an account? <a href="{{ route('register') }}">{{ __('Register') }}</a>
          </div>
        </div>
      </div>

    </div>
  </div>
@endsection


