@extends('layouts.header')
<style>
    .page{
        background-color: #1D1D1D;
        padding: 40px !important;
    }
    .card{
        background-color: #1D1D1D !important;
    color: white !important;
    border: 1px solid purple !important;
    }
    .card-header{
    border: 1px solid purple !important;

    }
    input{
        background-color: #1D1D1D !important;
    border-radius: 23px !important;
    border: 1px solid gray !important;
    }
    .btn-primary{
        background-color: #C42FD5 !important;

    border-radius: 50px !important;
    padding-top: 1px !important;
    padding-bottom: 1px !important;
    color: white !important;
    font-weight: bold !important;
    border: 1px solid #C42FD5 !important;
    }
</style>
@section('body')
<div class="container-fluid page">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
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

