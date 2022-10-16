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
                    <h1 class="page-header-title">Success Stories</h1>
                </div>
                
            </div>
        </div>
    </div>

    <div class="campaign-section section section-padding">
        <div class="container">
            <div class="row row-gutter-60 mb-n6 mb-xl-n60">
                <!--== Start Campaign Item ==-->
                @foreach($activity as $activity)
                <div class="col-lg-4 mb-6 mb-xl-60">
                    <div class="campaign-item campaign2-item-style">
                        <a href="   " class="image">
                            <img src="/storage/home/events/{{$activity->desktopImg}}" width="350" height="250"
                                alt="Save for animal’s">
                        </a>
                        <div class="content">
                            <h5 class="title text-truncate text-truncate--2"><a href="">{!!$activity->eventName!!}</a></h5>
                            <div class="campaign-progress">
                                <div class="progress-info">
                                    <p>Goal: <span>{!!$activity->goal_amt!!}</span></p>
                                    <p>Rised: <span>{!!$activity->funded_amt!!}</span></p>
                                </div>
                                <div class="progress-bar">
                                    <div class="bar" style="width: 58%;"></div>
                                </div>
                            </div>
                            <p class="text-truncate text-truncate--6">
                            {{$activity->content}}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</main>


@endsection