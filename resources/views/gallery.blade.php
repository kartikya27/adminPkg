@extends('layouts.master')

@section('page-title','What we do - education | Shankaraayan - A Help Initiative')
@section('page-css','body{background:white;}')
@extends('layouts.footer')
@section('content')

<main class="main-content">
    <!--== Start: Page Header Area Wrapper ==-->
    <div class="section page-header-area" data-bg-img="{{ asset('/images/photos/bg.jpg') }}">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-sm-auto text-center text-sm-start">
                    <h1 class="page-header-title">Gallery</h1>
                </div>

            </div>
        </div>
    </div>

    <div class="event-section section section-padding">
        <div class="container">
            <div class="row mb-n6">
                <div class="col-lg-12">
                <div class="gallery-tab">
                    <a href="#">album 1</a>
                    <a href="#">album 2</a>
                    <a href="#">album 3</a>
                    <a href="#">all</a>
                </div>
                <div class="image-container ">

                    <img src="https://placeimg.com/640/480/animals" alt="" data-album="album 1">
                    <img src="https://placeimg.com/640/480/arch" alt="" data-album="album 1">
                    <img src="https://placeimg.com/640/480/nature" alt="" data-album="album 1">
                    <img src="https://placeimg.com/640/480/people" alt="" data-album="album 2">
                    <img src="https://placeimg.com/640/480/tech" alt="" data-album="album 2">
                    <img src="https://placeimg.com/640/480/animals" alt="" data-album="album 2">
                    <img src="https://placeimg.com/640/480/arch" alt="" data-album="album 3">
                    <img src="https://placeimg.com/640/480/nature" alt="" data-album="album 3">
                    <img src="https://placeimg.com/640/480/people" alt="" data-album="album 3">

                </div>

                </div>

            </div>
        </div>
    </div>
</main>



@endsection