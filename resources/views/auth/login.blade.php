@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mx-auto flex justify-center px-6 py-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-yellow-500 border-teal-400 text-wrap text-center font-bold">{{ __('LOGIN HERE') }}</div>
                    {{-- {{$users= ''}}  --}}
                <div class="card-body bg-gray-400  ">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row p-2">
                            <label for="email" class="col-md-4 col-form -label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6 p-2">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row p-2">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6 p-2">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0 p-2 text-center ">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="bg-blue-500 text-white p-2 rounded-full">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link mb-0 bg-blue-500 text-white p-2 rounded-full  " href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
