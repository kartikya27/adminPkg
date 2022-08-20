@extends('layouts.master')

@section('page-title','What we do - education | Shankaraayan - A Help Initiative')
@section('page-css','body{background:white;}')
@extends('layouts.footer')
@section('content')

<main class="main-content">
    <!--== Start: Page Header Area Wrapper ==-->
    <div class="section page-header-area"
        data-bg-img="/storage/home/programs/@php echo str_replace(' ','-',$scheme['program_code']) @endphp/@php echo $scheme['program_pic1'] @endphp">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-sm-auto text-center text-sm-start">
                    <h1 class="page-header-title">{!!$scheme->programName!!}</h1>
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
                        <img src="/storage/home/programs/@php echo str_replace(' ','-',$scheme['program_code']) @endphp/@php echo $scheme['program_pic2'] @endphp"" width="500" height="500"
                            alt="Image">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content">
                        <h6 class="sub-title">OUR MISSION AND VISSION</h6>
                        <h2 class="title">{!!$scheme->heading!!}</h2>
                        <p>{!!$scheme->programDescription!!}</p>
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
                        <img src="/storage/home/programs/@php echo str_replace(' ','-',$scheme['program_code']) @endphp/@php echo $scheme['program_pic3'] @endphp"" width="100%" height="300" alt="Image">
                    </div>
                </div>
                <div class="col-lg-6">
                    <h2 class="title">{!!$scheme->subHeading!!}</h2>
                    <p class="line-height ">
                        {!!$scheme->description!!}
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
            <div class="row pb-5">
                <div class="col-lg-6">
                    <h2 class="title">{!!$scheme->parent_heading!!}</h2>
                    <p>{!!$scheme->program_additional!!}</p>
                </div>
            
            @if($scheme->video_link != '')
            <div class="col-lg-6">
                    <iframe width="100%" height="400px" src="{{$scheme->video_link}}" title="Help life foundation(2)"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
                
            </div>
            @else
            <div class="col-lg-6">
                    <div class="about-image">
                        <img src="/storage/home/programs/@php echo str_replace(' ','-',$scheme['program_code']) @endphp/@php echo $scheme['program_pic4'] @endphp"" width="100%" height="500"
                            alt="Image">
                    </div>
                </div>
            
            @endif

        </div>
    </div>

</main>


@endsection