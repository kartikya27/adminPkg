@extends('layouts.master')

@section('page-title','What we do - education | Shankaraayan - A Help Initiative')
@section('page-css','body{background:white;}.btn{padding: 8px 24px;margin-bottom: 1px;}.title-hidden{display:
-webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 2;overflow: hidden;}.font-size{font-size: 24px;}
.content-hidden{display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 5;overflow:
hidden;}.font-size{font-size: 24px;}')
@extends('layouts.footer')
@section('content')

<div class="event-section section section-padding">
    <div class="container">
        <div class="row row-gutter-60 mb-n6">
            <div class="col-md-10 letter_space offset-md-1 text-center">
                <div class="mb-4 text-sm text-gray-600">
                    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                </div>

                @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
                @endif

                <div class="mt-4 flex items-center justify-between">
                <div class="row justify-content-center">
                    <div class="col-md-4 col-xs-12 col-sm-6">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <div>
                            <button class="btn">
                                {{ __('Resend Verification Email') }}
                            </button>
                        </div>
                    </form>
                    </div>
                    <div class="col-md-3 col-xs-12 col-sm-6">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit" class="btn ">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection