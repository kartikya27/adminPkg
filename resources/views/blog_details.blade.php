@extends('layouts.master')

@section('page-title','What we do - education | Shankaraayan - A Help Initiative')
@section('page-css','body{background:white;}.title-hidden{display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 2;overflow: hidden;}.font-size{font-size: 24px;}
.content-hidden{display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 5;overflow: hidden;}.font-size{font-size: 24px;}.w-70{width:70%;display:block;margin:auto}')
@extends('layouts.footer')
@section('content')

<main class="main-content">
    <!--== Start: Page Header Area Wrapper ==-->
    <div class="section page-header-area" data-bg-img="{{ asset('/images/photos/bg.jpg') }}">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-sm-auto text-center text-sm-start">
                    <h1 style="" class="page-header-title"><?= $title?></h1>
                </div>
                
            </div>
        </div>
    </div>



            <div class="blog-details-section section section-padding-t">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="post-details-info text-center mt-n2">
                                <div class="meta">
                                    <span class="author">By <a href="blog.html">Shankaraayan Foundation</a></span>
                                    <span class="dots"></span>
                                    <span class="post-date"><?php $date = date_create($events['date']); echo date_format($date, "D d, M Y") ?></span>
                                    <span class="dots"></span>
                                    <!-- <span class="post-time"> 10 min read</span> -->
                                </div>
                                <h4 class="title"><?= $events['eventName']?></h4>
                                
                            </div>
                            <div class="post-details-thumb">
                                <img class="w-70" src="/storage/home/events/{{$events['desktopImg']}}" alt="Image" width="1170" height="550">
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <div class="post-details-content">
                               
                                <p>{!!$events['shortContent']!!}</p>
                                <p>{!!$events['content']!!}</p>
                               
                               
                               
                              <blockquote class="blockquote-item">
                                    <p>We need <span>{!!$events['goal_amt']!!}</span> Rupees for this Project.</p>
                                </blockquote>
                                
                                <div class="post-details-footer">
                                    <div class="post-details-social-icons">
                                        <span>Share this article:</span>
                                        <div class="social-icons">
                                            <a href="https://www.facebook.com" target="_blank" rel="noopener"><i class="icofont-facebook"></i></a>
                                            <a href="https://www.instagram.com" target="_blank" rel="noopener"><i class="icofont-instagram"></i></a>
                                            <a href="https://twitter.com" target="_blank" rel="noopener"><i class="icofont-twitter"></i></a>
                                            <a href="https://www.linkedin.com/signup" target="_blank" rel="noopener"><i class="icofont-linkedin"></i></a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

</main>



@endsection