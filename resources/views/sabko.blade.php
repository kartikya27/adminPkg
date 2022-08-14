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
                            <h1 class="page-header-title">About Us</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!--== End: Page Header Area Wrapper ==-->

            <!--== Start: About Section Wrapper ==-->
            <div class="about-section section section-padding section-margin-t">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="about-image">
                                <img src="{{ asset('/images/photos/swatantra-shikshaantra1-1.jpg') }}" width="500" height="500" alt="Image">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="about-content">
                                <h6 class="sub-title">OUR MISSION AND VISSION</h6>
                                <h2 class="title">We are trusted fund raising organization.</h2>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry has been the industry's standard dummy text ever since the 150 when unknown printer took a galley of type and scrambled it to make a type specimen book has survived not only five centuries.</p>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry has been the industry's standard dummy text ever since the 150 when unknown has survived not only five centuries.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section-bg-color-shape section-bg-color-shape-style1 bg-grey"></div>
                <div class="section-bg-color-shape section-bg-color-shape-style3 bg-secondary"></div>
                <div class="section-pattern-img section-pattern-img-style7 pattern-img-zoom">
                    <img src="{{ asset('/images/shape/1.png') }}" width="127" height="125" alt="Image">
                </div>
            </div>

            <div class="about-section section section-padding">
                <div class="container"> 
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="about-image">
                                <img src="{{ asset('/images/photos/bg1.jpeg') }}" width="500" height="300" alt="Image">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <p class="line-height ">
                                In 2006, the Swatantra Shikhaantra centre was established in L1, Sangam Vihar, New Delhi as a response to the high rate of drop-outs in the urban community. KHUSHII traced this down to factors such as poor foundational skills, lack of access to quality teaching, safe infrastructure or even nutritious meals. An empty stomach never devoured much knowledge!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="about-section section section-padding ">
                <div class="container">
                    <!-- <h6 class="sub-title">OUR MISSION AND VISSION</h6> -->
                    <div class="about-content">
                        <h2 class="title ">Accomplishments</h2>
                    </div>
                    <div class="row mt-5">
                        <div class="col-lg-3">
                            <img width="25%" src="https://khushii.org/wp-content/uploads/2020/10/Sicon-5.png" alt="">
                          <h4>15000</h4>  
                          <p>children benefitted</p>
                        </div>
                        <div class="col-lg-3">
                        <img width="25%" src="https://khushii.org/wp-content/uploads/2020/10/Sicon-5.png" alt="">
                          <h4>15000</h4>  
                          <p>children benefitted</p>
                        </div>
                        <div class="col-lg-3">
                        <img width="25%" src="https://khushii.org/wp-content/uploads/2020/10/Sicon-5.png" alt="">
                          <h4>15000</h4>  
                          <p>children benefitted</p>
                        </div>
                        <div class="col-lg-3">
                        <img width="25%" src="https://khushii.org/wp-content/uploads/2020/10/Sicon-5.png" alt="">
                          <h4>15000</h4>  
                          <p>children benefitted</p>
                        </div>
                    </div>
                    <p class="mt-5">Last Year*</p>
                </div>
                <div class="section-bg-color-shape section-bg-color-shape-style1 bg-grey"></div>
                <!-- <div class="section-bg-color-shape section-bg-color-shape-style3 bg-secondary"></div> -->
                <div class="section-pattern-img section-pattern-img-style7 pattern-img-zoom">
                    <img src="{{ asset('/images/shape/1.png') }}" width="127" height="125" alt="Image">
                </div>
            </div>

            <div class="about-section section section-padding">
                <div class="container"> 
                    <div class="row">
                        <div class="col-lg-6">
                            <iframe width="100%" height="300px" src="https://www.youtube.com/embed/c9Asc4vnROA" title="Help life foundation(2)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div class="col-lg-6">
                            <iframe width="100%" height="300px" src="https://www.youtube.com/embed/c9Asc4vnROA" title="Help life foundation(2)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
            
        </main>


@endsection