@extends('layouts.master')

@section('page-title','What we do - education | Shankaraayan - A Help Initiative')
@section('page-css','body{background:white;}.title-hidden{display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 2;overflow: hidden;}.font-size{font-size: 24px;}
.content-hidden{display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 5;overflow: hidden;}.font-size{font-size: 24px;}')
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
       
            <div class="row row-gutter-60 mb-n6">

            @foreach($events as $event)
            
                <div class="col-md-6 mb-6">
                    <div class="post-item">
                        <a href="details?type=activity&id={!!$event->id!!}&{!!$event->eventName!!}" class="image">
                            <img src="/storage/home/events/{{$event->desktopImg}}" width="475" height="475" alt="News Post Image" />
                        </a>
                        <div class="content">
                            <ul class="post-meta">
                                <li class="post-date">
                                    <span>Date:</span> {!!$event->date!!}
                                </li>
                                <li class="post-info">
                                    <ul class="d-flex">
                                        <li class="post-comment">
                                            <span>Venue:</span> {!!$event->venue!!}</span>
                                        </li>
                                        <!-- <li class="post-like ms-5"><span>Like:</span> 78K</li> -->
                                    </ul>
                                </li>
                            </ul>
                            <h4 class="title title-hidden">
                                <a class="font-size" href="details?type=activity&id={!!$event->id!!}&{!!$event->eventName!!}">{!!$event->eventName!!}</a>
                            </h4>
                            <p class="content-hidden">{{$event->content}}</p>

                            <div class="button">
                                <a class="btn btn-primary btn-icon-right btn-lg" href="details?type=activity&id={!!$event->id!!}&{!!$event->eventName!!}"><span>Read More</span> <i class="icofont-double-right icon"></i></a>
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