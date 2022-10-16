@extends('layouts.master')

@section('page-title','What we do - education | Shankaraayan - A Help Initiative')
@section('page-css','body{background:white;}')
@extends('layouts.footer')
@section('content')

<main class="main-content">
    <!--== Start: Page Header Area Wrapper ==-->
    <div class="section page-header-area"
        data-bg-img="http://127.0.0.1:8000/storage/home/programs/SSA01/Shankaraayan-sabko-shiksha-abhiyan-1.jpg">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-sm-auto text-center text-sm-start">
                    <h1 class="page-header-title">{!!$menu['menuName']!!}</h1>
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
                        <img src="/storage/home/pages/@php echo $page['menu'] @endphp/@php echo $page['img1'] @endphp"" width="500" height="500"
                            alt="Image">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content">
                        <h6 class="sub-title">{!!$page->subheading!!}</h6>
                        <h2 class="title">{!!$page->heading!!}</h2>
                        <p>{!!$page->description!!}</p>
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
                        <img src="/storage/home/pages/@php echo $page['menu'] @endphp/@php echo $page['img2'] @endphp"" width="100%" height="300" alt="Image">
                    </div>
                </div>
                <div class="col-lg-6">
                <h6 class="sub-title">{!!$page->subheading1!!}</h6>
                    <h2 class="title">{!!$page->heading1!!}</h2>
                    <p class="line-height ">
                        {!!$page->description1!!}
                    </p>
                </div>
            </div>
        </div>
    </div>

    

    

</main>


@endsection