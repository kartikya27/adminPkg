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
                <div class="col-lg-4 mb-6 mb-xl-60">
                    <div class="campaign-item campaign2-item-style">
                        <a href="causes-details.html" class="image">
                            <img src="{{ asset('/images/campaign/campaign-1.jpg') }}" width="350" height="250"
                                alt="Save for animal’s">
                        </a>
                        <div class="content">
                            <h4 class="title"><a href="causes-details.html">Save for animal’s</a></h4>
                            <div class="campaign-progress">
                                <div class="progress-info">
                                    <p>Goal: <span>$8,957</span></p>
                                    <p>Rised: <span>58%</span></p>
                                </div>
                                <div class="progress-bar">
                                    <div class="bar" style="width: 58%;"></div>
                                </div>
                            </div>
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text has roots in a piece
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-6 mb-xl-60">
                    <div class="campaign-item campaign2-item-style">
                        <a href="causes-details.html" class="image">
                            <img src="{{ asset('/images/campaign/campaign-1.jpg') }}" width="350" height="250"
                                alt="Save for animal’s">
                        </a>
                        <div class="content">
                            <h4 class="title"><a href="causes-details.html">Save for animal’s</a></h4>
                            <div class="campaign-progress">
                                <div class="progress-info">
                                    <p>Goal: <span>$8,957</span></p>
                                    <p>Rised: <span>58%</span></p>
                                </div>
                                <div class="progress-bar">
                                    <div class="bar" style="width: 58%;"></div>
                                </div>
                            </div>
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text has roots in a piece
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-6 mb-xl-60">
                    <div class="campaign-item campaign2-item-style">
                        <a href="causes-details.html" class="image">
                            <img src="{{ asset('/images/campaign/campaign-1.jpg') }}" width="350" height="250"
                                alt="Save for animal’s">
                        </a>
                        <div class="content">
                            <h4 class="title"><a href="causes-details.html">Save for animal’s</a></h4>
                            <div class="campaign-progress">
                                <div class="progress-info">
                                    <p>Goal: <span>$8,957</span></p>
                                    <p>Rised: <span>58%</span></p>
                                </div>
                                <div class="progress-bar">
                                    <div class="bar" style="width: 58%;"></div>
                                </div>
                            </div>
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text has roots in a piece
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>


@endsection