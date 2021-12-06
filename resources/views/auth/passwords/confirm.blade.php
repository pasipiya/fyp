@extends('dashboard.layouts.app')

@section('content')
<div class="row">
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
      <div class="login-brand login-brand-color">
          <img alt="image" src="{{asset('admin/assets/img/logo.png')}}" />
         FMS
      </div>
      <div class="card">
        <div class="card-header card-header-auth">
          <h4>Confirm Password</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf
                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group">
                        <button type="submit" class="btn btn-block btn-primary">
                            {{ __('Confirm Password') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-block btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
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


