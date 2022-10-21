@extends('layouts.master')

@section('page-title','What we do - education | Shankaraayan - A Help Initiative')
@section('page-css','body{background:white;}.btn{padding: 8px 24px;margin-bottom: 1px;}.title-hidden{display:
-webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 2;overflow: hidden;}.font-size{font-size: 24px;}
.content-hidden{display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 5;overflow:
hidden;}.font-size{font-size: 24px;}.btn{padding: 8px 24px;margin-bottom: 1px;}')
@extends('layouts.footer')
@section('content')

<div class="event-section section section-padding">
    <div class="container">
        <div class="row row-gutter-60 mb-n6">

            <div class="col-md-6">
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="g-3 align-items-center">

                        <label for="email" class="form-label" :value="__('Email')" >Email</label>

                        <input id="email" class="block mt-1 w-full form-control" type="email" name="email"
                            :value="old('email')" required autofocus />

                    </div>

                    <!-- Password -->
                    <div class="">
                        <label for="password" class="form-label" :value="__('Password')" />Password</label>

                        <input id="password" class="block mt-1 w-full form-control" type="password" name="password"
                            required autocomplete="current-password" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center form-label">
                            <input id="remember_me" type="checkbox"
                                class="form-check-input rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>
                    <button class="btn ml-3">
                        {{ __('Log in') }}
                    </button>
                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                        @endif
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                            {{ __('Do not have any account?') }}
                        </a>
                    </div>
                </form>
            </div>
            <div class="col-md-6 d-none d-sm-block">
                <div class="who-we-img-secion section-bg-img section-bg-img-style1"
                    data-bg-img="/storage/home/who_we_section/shankaraayan-a-help-initiative-ngo-india-desktopImage-09540015082022.jpg"
                    style="background-image: url(&quot;/storage/home/who_we_section/shankaraayan-a-help-initiative-ngo-india-desktopImage-09540015082022.jpg&quot;);">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection