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

            <div class="col-md-6">

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="g-3 align-items-center">
                        <label for="name" :value="__('Name')" class="form-label">Name</label>

                        <input id="name" class="block mt-1 w-full form-control" type="text" name="name"
                            :value="old('name')" required autofocus />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <label for="email" :value="__('Email')" class="form-label">Email</label>

                        <input id="email" class="block mt-1 w-full form-control" type="email" name="email"
                            :value="old('email')" required />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <label for="password" :value="__('Password')" class="form-label">Password</label>

                        <input id="password" class="block mt-1 w-full form-control" type="password" name="password"
                            required autocomplete="new-password" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <label for="password_confirmation" :value="__('Confirm Password')" class="form-label">Confirm
                            Password</label>

                        <input id="password_confirmation" class="block mt-1 w-full form-control" type="password"
                            name="password_confirmation" required />
                    </div>
                    <div class="mt-4">
                        <label for="password_confirmation" :value="__('Refered By')" class="form-label">
                            Refered By (Optional)</label>

                        <input id="refered_by" class="block mt-1 w-full form-control" type="text"
                            name="referredBy" />
                    </div>
                    <br>
                    <button class="ml-4 btn">
                        {{ __('Register') }}
                    </button>
                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
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