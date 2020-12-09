@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mx-auto flex justify-center px-6 py-4">
        <div class="col-md-8">
            <div class="card-body bg-gray-100 ">
                <div class="card-header bg-yellow-500 border-teal-400 text-wrap text-center font-bold">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="bg-gray-100">
                            <label for="email" class="text-center">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="card-body bg-gray-100">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="bg-blue-500 text-white p-3 m-2 rounded-full">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
