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


                <div class="img-box col-md-3 ">
                    <div class="box__img">
                        <img class="box__img1" src="storage/home/events/shankaraayan-fund-raising-for-save-forest.-desktopImage-14351518082022.jpg"
                            alt="">
                    </div>
                </div>
                <div class="img-box col-md-3 ">
                    <div class="box__img">
                        <img class="box__img1" src="storage/home/gallery/1.jpg"
                            alt="">
                    </div>
                </div>
                <div class="img-box col-md-3 ">
                    <div class="box__img">
                        <img class="box__img1" src="storage/home/gallery/2.jpg"
                            alt="">
                    </div>
                </div>
                <div class="img-box col-md-3 ">
                    <div class="box__img">
                        <img class="box__img1" src="storage/home/gallery/3.jpg"
                            alt="">
                    </div>
                </div>
                <div class="img-box col-md-3 ">
                    <div class="box__img">
                        <img class="box__img1" src="storage/home/gallery/4.jpg"
                            alt="">
                    </div>
                </div>

                

            </div>
        </div>
    </div>
</main>



@endsection