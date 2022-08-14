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
                    <h1 class="page-header-title">Events</h1>
                </div>
                
            </div>
        </div>
    </div>

    <div class="event-section section section-padding">
        <div class="container">
            <div class="row mb-n6">

                <div class="col-12 mb-6">
                    <div class="event-item  ">
                        <a href="event-details.html" class="image">
                            <img src="{{ asset('/images/event/event-3.jpg') }}" width="350" height="315"
                                alt="Fund raising for save forest.">
                        </a>
                        <div class="content">
                            <div class="details">
                                <span class="location"><span>Venue:</span> Smithville, Texas(TX), 78957</span>
                                <h4 class="title"><a href="event-details.html">Fund raising for save forest.</a></h4>
                                <p>That neces ecommerce platform optime your store ecommerce platform</p>
                                <span class="date"><span>Date:</span> 30 February, 2021</span>
                            </div>
                            <div class="button">
                                <a class="btn btn-primary btn-icon-right btn-lg" href="event-details.html"><span>Join
                                        Now</span> <i class="icofont-double-right icon"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-6">
                    <div class="event-item  ">
                        <a href="event-details.html" class="image">
                            <img src="{{ asset('/images/event/event-3.jpg') }}" width="350" height="315"
                                alt="Fund raising for save forest.">
                        </a>
                        <div class="content">
                            <div class="details">
                                <span class="location"><span>Venue:</span> Smithville, Texas(TX), 78957</span>
                                <h4 class="title"><a href="event-details.html">Fund raising for save forest.</a></h4>
                                <p>That neces ecommerce platform optime your store ecommerce platform</p>
                                <span class="date"><span>Date:</span> 30 February, 2021</span>
                            </div>
                            <div class="button">
                                <a class="btn btn-primary btn-icon-right btn-lg" href="event-details.html"><span>Join
                                        Now</span> <i class="icofont-double-right icon"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>



@endsection