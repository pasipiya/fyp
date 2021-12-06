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
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group">
                    <label for="email">{{ __('E-Mail Address') }}</label>


                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                </div>

                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="password-confirm" >{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>


            <div class="form-group">
                <button type="submit" class="btn btn-lg btn-block btn-primary">
                    {{ __('Reset Password') }}
                </button>
              </div>
            </form>
        </div>
      </div>

    </div>
  </div>
@endsection


