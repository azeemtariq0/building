@extends('layouts.auth')

@section('content')

<div class="padding-15" style="background: #dddddd;">
    <div class="login-box">
        <!-- login form -->
        <form method="POST" action="{{ route('login') }}" class="sky-form boxed">
            @csrf
            <header><i class="fa fa-users"></i> {{ __('Sign In') }}</header>
                    <!--
                    <div class="alert alert-danger noborder text-center weight-400 nomargin noradius">
                        Invalid Email or Password!
                    </div>

                    <div class="alert alert-warning noborder text-center weight-400 nomargin noradius">
                        Account Inactive!
                    </div>

                    <div class="alert alert-default noborder text-center weight-400 nomargin noradius">
                        <strong>Too many failures!</strong> <br />
                        Please wait: <span class="inlineCountdown" data-seconds="180"></span>
                    </div>
                -->

                @error('email')
                <div class="alert alert-danger noborder text-center weight-400 nomargin noradius">
                    {{ $message }}
                </div>
                @enderror

                @error('password')
                <div class="alert alert-danger noborder text-center weight-400 nomargin noradius">
                    {{ $message }}
                </div>
                @enderror
                <fieldset>  
                    <section>
                        <label class="label">{{ __('Email Address') }}</label>
                        <label class="input">
                            <i class="icon-append fa fa-envelope"></i>
                             <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <span class="tooltip tooltip-top-right">Email Address</span>
                        </label>
                    </section>
                    <section>
                        <label class="label">{{ __('Password') }}</label>
                        <label class="input">
                            <i class="icon-append fa fa-lock"></i>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            <b class="tooltip tooltip-top-right">Type your Password</b>
                        </label>

                        <label class="checkbox">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}><i></i>{{ __('Keep me logged in') }}
                        </label>
                    </section>
                </fieldset>
                <footer>
                    <button type="submit" class="btn btn-primary pull-right">{{ __('Sign In') }}</button>
                    <div class="forgot-password pull-left">
                       @if (Route::has('password.request'))
                       <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}?</a> <br />
                       @endif
                       <!-- <a href="page-register.html"><b>Need to Register?</b></a> -->
                   </div>
               </footer>
           </form>
           <!-- /login form -->
           <hr />
       </div>
   </div>
   
@endsection
