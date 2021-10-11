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
    .btn-link{
        background-color: #C42FD5 !important;

    border-radius: 50px !important;
/* padding: 5px !important; */
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
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-1 m-0 align-baseline">{{ __('click here to request another') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
