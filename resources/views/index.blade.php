@extends('layouts.master')

@section('page-title','Shankaraayan - A Help Initiative')
@section('page-css','body{background:white;}')

@extends('layouts.footer')

@section('content')
<main class="main-content">
    <!--== Start: Hero Section Wrapper ==-->
    <div class="hero-slider-section position-relative">
        <div class="swiper hero-slider-container">
            <div class="swiper-wrapper">
                @foreach($banner as $banner)
                <div class="swiper-slide hero-slide-item">
                    <div class="container-fluid">
                        <div class="hero-slide-content">
                           
                            <h1 class="hero-slide-title">{!!$banner['heading']!!}</h1>
                            <p class="hero-slide-desc">{!!$banner['subHeading']!!}</p>
                            <a class="btn btn-primary btn-icon-right" href="{!!$banner['btnLink']!!}">
                                <span>{!!$banner['btnText']!!}</span>
                                <i class="icofont-double-right icon"></i></a>
                        </div>
                    </div>
                    <div class="hero-slide-shape-one" data-bg-img="{{ asset('/images/slider/slide-bg-color1.jpg') }}"></div>
                    <div class="hero-slide-thumb">
                        <img src="/storage/home/banner/{{ $banner['desktopImg'] }}" width="1208" height="804" alt="Image" />
                        <a data-fancybox data-type="iframe" href="https://player.vimeo.com/video/172601404?autoplay=1"
                            class="hero-video-popup video-popup">
                            <i class="icofont-ui-play"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--== End: Hero Section Wrapper ==-->


    <!--== Start: About Section Wrapper ==-->
    <div class="about-section section section-margin pt-0 pb-0 pt-xl-5 pb-xl-5">
        <div class="container">
            <div class="row mt-n1 pt-0 pt-lg-5 pt-xl-10 pb-6 pb-md-10 pb-lg-5 pb-xl-10 mb-5 mb-lg-0">
                <div class="col-lg-5">
                    <!--== Section Title Start ==-->
                    <div class="section-title-2 mb-0">
                        <h6 class="sub-title">WHO WE ARE</h6>
                        <h2 class="title">{!!$whoWeContent->heading!!}</h2>
                        <p>
                            {!!$whoWeContent->content!!}
                        </p>
                        <a class="btn btn-primary btn-icon-right" href="{!!$whoWeContent->btnURL!!}">
                            <span>{!!$whoWeContent->btnText!!}</span>
                            <i class="icofont-double-right icon"></i></a>
                    </div>
                    <!--== Section Title End ==-->
                </div>
            </div>
        </div>
        <div class="who-we-img-secion section-bg-img section-bg-img-style1" data-bg-img="/storage/home/who_we_section/{{$whoWeContent->image}}">
        </div>
        <div class="section-pattern-img section-pattern-img-style2 pattern-img-move">
            <img src="{{ asset('/images/shape/2.png') }}" width="148" height="190" alt="Image" />
        </div>
    </div>
    <!--== End: About Section Wrapper ==-->



    <!--== Start: Team Section Wrapper ==-->
    <div class="team-section section section-padding">
        <div class="container-fluid team-container-fluid">
            <div class="row align-items-center justify-content-space-between">
                <div class="col-lg-6 team-item-wrap">
                    <div class="row row-gutter-40 mb-n6 mb-xl-n8">
                        <!--== Team Start ==-->
                        <div class="col-sm-6 col-lg-6 mb-6 mb-xl-8">
                            <div class="team-item">
                            <div class="image">
                                    <img src="storage/home/events/shankaraayan-shankraayan-planning-to-implement-the-sabko-shiksha-abiyan-in-government-primary-school,-thanagaji,-alwar-desktopImage-08050711092022.jpg" width="280" height="280"
                                        alt="Shankaraayan" />
                                </div>
                                <div class="content">
                                    <!-- <h4 class="name">Ceyda Ciftci</h4> -->
                                    <!-- <span class="title">Senior Volunteer</span> -->
                                </div>
                            </div>
                        </div>
                        <!--== Team End ==-->

                        <!--== Team Start ==-->
                        <div class="col-sm-6 col-lg-6 mb-6 mb-xl-8">
                            <div class="team-item">
                            <div class="image">
                                    <img src="/storage/home/who_we_section/shankaraayan-a-help-initiative-ngo-india-desktopImage-09540015082022.jpg" width="280" height="280"
                                        alt="Shankaraayan" />
                                </div>
                                <div class="content">
                                    <!-- <h4 class="name">Ceyda Ciftci</h4> -->
                                    <!-- <span class="title">Senior Volunteer</span> -->
                                </div>
                            </div>
                        </div>
                        <!--== Team End ==-->

                        <!--== Team Start ==-->
                        <div class="col-sm-6 col-lg-6 mb-6 mb-xl-8">
                            <div class="team-item">
                            <div class="image">
                                    <img src="/storage/home/who_we_section/shankaraayan-a-help-initiative-ngo-india-desktopImage-09540015082022.jpg" width="280" height="280"
                                        alt="Shankaraayan" />
                                </div>
                                <div class="content">
                                    <!-- <h4 class="name">Ceyda Ciftci</h4> -->
                                    <!-- <span class="title">Senior Volunteer</span> -->
                                </div>
                            </div>
                        </div>
                        <!--== Team End ==-->

                        <!--== Team Start ==-->
                        <div class="col-sm-6 col-lg-6 mb-6 mb-xl-8">
                            <div class="team-item">
                            <div class="image">
                                    <img src="/storage/home/who_we_section/shankaraayan-a-help-initiative-ngo-india-desktopImage-09540015082022.jpg" width="280" height="280"
                                        alt="Shankaraayan" />
                                </div>
                                <div class="content">
                                    <!-- <h4 class="name">Ceyda Ciftci</h4> -->
                                    <!-- <span class="title">Senior Volunteer</span> -->
                                </div>
                            </div>
                        </div>
                        <!--== Team End ==-->
                    </div>
                </div>
                <div class="col-lg-6 team-content-wrap">
                    <!--== Section Title Start ==-->
                    
                   
                    <div class="section-title-2 mb-0">
                        <h6 class="sub-title">Success Stories</h6>
                        <h2 class="title">{!!$data['successStories']->heading!!}</h2>
                        <span class="shape"><img src="{{ asset('/images/shape/section-title.png') }}" width="99" height="7"
                                alt="Section Title Shape" /></span>
                        <p>
                        {!!$data['successStories']->content!!}</p>
                        <a href="" class="btn btn-dark">View More</a>
                    </div>
                    
                    
                    <!--== Section Title End ==-->
                </div>
            </div>
        </div>
        <div class="section-bg-img section-bg-img-style2" data-bg-img="{{ asset('/images/photos/bg1.jpg') }}"></div>
    </div>
    <!--== End: Team Section Wrapper ==-->

    <!--== Start: Donation Section Wrapper ==-->
    <div class="donation-section section section-padding bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <!--== Start: Section Title ==-->
                    
                    
                    <div class="section-title-2 mb-0 mb-n2">
                        <h6 class="sub-title">QUICK DONATION</h6>
                        <h2 class="title">{!!$data['donationContent']->heading!!}</h2>
                        <span class="shape"><img src="{{ asset('/images/shape/section-title.png') }}" width="99" height="7"
                                alt="Section Title Shape" /></span>
                        <p>{!!$data['donationContent']->content!!}</p>
                    </div>
                    
                    
                    <!--== End: Section Title ==-->
                </div>
                <div class="col-lg-6 align-self-center">
                    <!--== Start: Donation Select Form ==-->
                    <div class="donation-form-select ms-0 ms-xl-9 mt-10 mt-lg-0">
                        <form action="#">
                            <div class="row row-gutter-20 mb-n4">
                                <div class="col-auto mb-4">
                                    <input class="visually-hidden" name="donation-value" id="donate-20" type="radio"
                                        value="20" />
                                    <label for="donate-20">₹20</label>
                                </div>
                                <div class="col-auto mb-4">
                                    <input class="visually-hidden" name="donation-value" id="donate-50" type="radio"
                                        value="50" />
                                    <label for="donate-50">₹50</label>
                                </div>
                                <div class="col-auto mb-4">
                                    <input class="visually-hidden" name="donation-value" id="donate-100" type="radio"
                                        value="100" checked />
                                    <label for="donate-100">₹100</label>
                                </div>
                                <div class="col-auto mb-4">
                                    <input class="visually-hidden" name="donation-value" id="donate-200" type="radio"
                                        value="200" />
                                    <label for="donate-200">₹200</label>
                                </div>
                                <div class="col-auto mb-4">
                                    <input class="visually-hidden" name="donation-value" id="donate-500" type="radio"
                                        value="500" />
                                    <label for="donate-500">₹500</label>
                                </div>
                                <div class="col-auto mb-4">
                                    <input class="custom-input" name="donation-value" id="custom" type="number"
                                        placeholder="Custom" />
                                    <label class="visually-hidden" for="custom">custom</label>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary btn-icon-right">
                                <a href="/contact"><span>Donate Now</span></a>
                                <i class="icofont-double-right icon"></i>
                            </button>
                        </form>
                    </div>
                    <!--== End: Donation Select Form ==-->
                </div>
            </div>
        </div>
        <div class="section-pattern-img section-pattern-img-style5">
            <img src="{{ asset('/images/shape/5.png') }}" width="229" height="241" alt="Image" />
        </div>
    </div>
    <!--== End: Donation Section Wrapper ==-->

    <!--== Start: Event Section Wrapper ==-->
    <div class="event-section section section-padding">
        <div class="container">
            <!--== Start: Section Title ==-->
            <div class="section-title center mt-n3">
                <h2 class="title">Recent Event’s</h2>
                
                <span class="shape"><img src="{{ asset('/images/shape/section-title.png') }}" width="99" height="7"
                        alt="Section Title Shape" /></span>
            </div>
            <!--== End: Section Title ==-->

            <div class="row mb-n6">
                <!--== Start: Event Title ==-->
                <div class="col-12 mb-6">
                    <div class="event-item">
                        <a href="event-details.html" class="image">
                            <img src="/storage/home/events/{{$events->desktopImg}}" width="350" height="315"
                                alt="{!!$events->eventName!!}" />
                        </a>
                        <div class="content">
                            <div class="details">
                                <span class="location"><span>Venue:</span> {!!$events->venue!!}</span>
                                <h4 class="title">
                                    <a href="event-details.html">{!!$events->eventName!!}</a>
                                </h4>
                                <p>
                                {!!$events->shortContent!!}
                                </p>
                                <span class="date"><span>Date:</span> {!!$events->date!!}</span>
                            </div>
                            <div class="button">
                            <a class="btn btn-primary btn-icon-right btn-lg" href="/contact"><span>Join
                                        Now</span>
                                    <i class="icofont-double-right icon"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--== End: Event Title ==-->
            </div>
        </div>
    </div>
    <!--== End: Event Section Wrapper ==-->

    <!--== Start: Testimonial Section Wrapper ==-->
    <div class="testimonial-section section section-padding-t bg-light">
        <div class="container">
            <!--== Start: Section Title ==-->
            <div class="section-title center mt-n3">
            <h6 class="sub-title">AMBASSADORS</h6>
                <h2 class="title">HEARTSPEAK</h2>
                <p>
                    
                </p>
                <span class="shape"><img src="{{ asset('/images/shape/section-title.png') }}" width="99" height="7"
                        alt="Section Title Shape" /></span>
            </div>
            <!--== End: Section Title ==-->

            <div class="row">
                <div class="col-12">
                    <div class="swiper testimonial-slider-container testi-border mb-0 mb-lg-n2">
                        <div class="swiper-wrapper">
                            <!--== Start: Testimonial Title ==-->
                            @foreach($testimonials as $testimonials)
                            <div class="swiper-slide">
                                <div class="testimonial-item bg-white">
                                    <div class="inner">
                                        <img src="{{ asset('/images/icons/quote-icon.png') }}" width="144" height="102"
                                            alt="quote icon" class="icon" />
                                        <p>
                                            {{$testimonials['content']}}
                                        </p>
                                        <h4 class="name">{{$testimonials['name']}}</h4>
                                        <h5 class="title">{{$testimonials['post']}}</h5>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="testimonial-swiper-pagination text-center d-none mt-10 mb-n2"></div>
                </div>
            </div>
        </div>
        <div class="section-pattern-img section-pattern-img-style4">
            <img src="{{ asset('/images/shape/4.png') }}" width="318" height="291" alt="Image" />
        </div>
    </div>
    <!--== End: Testimonial Section Wrapper ==-->
<hr>
    
    <!--== Start: Divider Section Wrapper ==-->
    <div class="divider-section divider-donation section bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start">
                    <div class="divider-content">
                        <h4 class="sub-title">MAKE DONATION</h4>
                        <h2 class="title">{!!$data['connectusContent']->heading!!}</h2>
                        <p>{!!$data['connectusContent']->content!!}</p>
                    </div>
                </div>
                <div class="col-lg-6 text-center text-lg-end">
                    <<a class="btn btn-primary btn-icon-right" href="/contact"><span>Join Now</span>
                        <i class="icofont-double-right icon"></i></a>
                </div>
            </div>
        </div>
        <div class="section-pattern-img section-pattern-img-style6">
            <img src="{{ asset('/images/shape/6.png') }}" width="131" height="168" alt="Image" />
        </div>
    </div>
</main>

@endsection