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
                    <h1 class="page-header-title"><?= $title?></h1>
                </div>
                
            </div>
        </div>
    </div>

    <div class="event-section section section-padding">
        <div class="container">
            <div class="row mb-n6">

            @foreach($events as $event)
                <div class="col-12 mb-6">
                    <div class="event-item  ">
                        <a href="event-details.html" class="image">
                            <img src="/storage/home/events/{{$event->desktopImg}}" width="350" height="315"
                                alt="Fund raising for save forest.">
                        </a>
                        <div class="content">
                            <div class="details">
                                <span class="location"><span>Venue:</span> {!!$event->venue!!}</span>
                                <h4 class="title"><a href="event-details.html">{!!$event->eventName!!}</a></h4>
                                <p>{!!$event->shortContent!!}</p>
                                <span class="date"><span>Date:</span> {!!$event->date!!}</span>
                            </div>
                            <div class="button">
                                <a class="btn btn-primary btn-icon-right btn-lg" href="/contact"><span>Join
                                        Now</span> <i class="icofont-double-right icon"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
                

            </div>
        </div>
    </div>
</main>



@endsection