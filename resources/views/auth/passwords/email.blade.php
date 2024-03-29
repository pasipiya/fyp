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
          <h4>{{ __('Reset Password') }}</h4>
        </div>
        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group ">
                <label for="email">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-lg btn-block btn-primary">
                    {{ __('Send Password Reset Link') }}
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


