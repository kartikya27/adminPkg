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
                    <h1 class="page-header-title">Volunteer</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="about-section section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-image">
                        <img src="https://khushii.org/wp-content/themes/khushii/images/kite-volunteer/kiteimage2.jpg" width="500" height="300" alt="Image">
                    </div>
                </div>
                <div class="col-lg-6">
                    <p class="line-height ">
                    By getting a child the education that they need and allowing them the opportunity to lead a more normal life, your donation will help them become a useful member of society. The more children that grow up to work jobs and contribute to the economy, the better off we are as a society, nation, and world. While you won’t see this effect the minute you donate your money, know that your efforts are working towards creating a better future for everyone. Children are our future, so why not give as many children as possible the opportunity for a brighter one?
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="about-section section section-padding ">
        <div class="container">
            <!-- <h6 class="sub-title">OUR MISSION AND VISSION</h6> -->
            <div class="about-content">
                <h2 class="title ">Impact</h2>
            </div>
            <div class="row mt-8">
                <div class="col-lg-12">
                    <ul class="impact_detail d-flex">
                        <li>
                            <img src="https://khushii.org/wp-content/themes/khushii/images/kite-volunteer/education.png"
                                alt="">
                            <p class="poppinspara txt-ctr">Help in educating the under privileged</p>
                        </li>
                        <li>
                            <img src="https://khushii.org/wp-content/themes/khushii/images/kite-volunteer/teaching.png"
                                alt="">
                            <p class="poppinspara txt-ctr">Gain new teaching skills</p>
                        </li>
                        <li>
                            <img src="https://khushii.org/wp-content/themes/khushii/images/kite-volunteer/cv.png"
                                alt="">
                            <p class="poppinspara txt-ctr">Add to their CV or resume</p>
                        </li>
                        <li>
                            <img src="https://khushii.org/wp-content/themes/khushii/images/kite-volunteer/self-worth.png"
                                alt="">
                            <p class="poppinspara txt-ctr">Build a feeling of self-worth</p>
                        </li>
                        <li>
                            <img src="https://khushii.org/wp-content/themes/khushii/images/kite-volunteer/volunteerc.png"
                                alt="">
                            <p class="poppinspara txt-ctr">Earn KHUSHII Volunteer Certificate</p>
                        </li>
                    </ul>
                </div>

            </div>
           
        </div>
        <div class="section-bg-color-shape section-bg-color-shape-style1 bg-grey"></div>
        <!-- <div class="section-bg-color-shape section-bg-color-shape-style3 bg-secondary"></div> -->
        
    </div>

    <div class="section section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                           
                            <div class="contact-form">
                                <form id="contact-form" action="https://whizthemes.com/mail-php/raju/arden/mail.php" method="POST">
                                    <div class="form-group mb-3 mb-xl-4">
                                        <input class="form-control" type="text" name="name" placeholder="Name:">
                                    </div>
                                    <div class="form-group mb-3 mb-xl-4">
                                        <input class="form-control" type="text" name="phone" placeholder="Phone:">
                                    </div>
                                    <div class="form-group mb-3 mb-xl-4">
                                        <input class="form-control" type="email" name="email" placeholder="Email:">
                                    </div>
                                    <div class="form-group mb-3 mb-xl-4">
                                        <input class="form-control" type="email" name="qualification" placeholder="Qualification*">
                                    </div>
                                    <div class="form-group mb-3 mb-xl-4">
                                        <label class="form-control" for="files" class="">Upload Resume</label>
                                        <input id="files" style="visibility:hidden;" type="file">
                                    </div>
                                    
                                    <div class="form-group">
                                        <button class="contact-form-btn btn btn-primary btn-icon-right" type="submit"><span>Send Now</span> <i class="icofont-double-right icon"></i></button>
                                    </div>
                                </form>

                                <!--== Message Notification ==-->
                                <div class="form-message"></div>
                            </div>
                            <!--== End Contact Form ==-->
                        </div>
                    </div>
                </div>

                
            </div>


</main>



@endsection