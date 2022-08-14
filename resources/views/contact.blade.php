@extends('layouts.master')

@section('page-title','Contact | Shankaraayan - A Help Initiative')
@section('page-css','body{background:white;}')
@extends('layouts.footer')
@section('content')

<main class="main-content">
            <!--== Start: Page Header Area Wrapper ==-->
            <div class="section page-header-area" data-bg-img="{{ asset('/images/photos/bg.jpg') }}">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-sm-auto text-center text-sm-start">
                            <h1 class="page-header-title">Contact</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!--== End: Page Header Area Wrapper ==-->

            <div class="contact-info section section-padding">
                <div class="container">
                    <div class="contact-details-info-wrap">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="contact-details-info-item">
                                    <h3 class="title">DROP US A LINE:</h3>
                                    <ul class="contact-details-info">
                                        <li>
                                            <i class="icofont-ui-call"></i>
                                            <a href="tel://7014875375">(+91) 70148 75375</a>
                                        </li>
                                        <li>
                                            <i class="icofont-envelope-open"></i>
                                            <a href="mailto://support@shankaraayan.com">support@shankaraayan.com</a>
                                        </li>
                                        <li>
                                            <i class="icofont-location-pin"></i>
                                            <p>C-110 Nirman Nagar Jaipur, Rajasthan - 302019</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                
                                    <iframe width="100%" height="400px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14232.601952637346!2d75.74512618346068!3d26.898718719242645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396c4adf4c57e281%3A0xce1c63a0cf22e09!2sJaipur%2C%20Rajasthan!5e0!3m2!1sen!2sin!4v1660384690446!5m2!1sen!2sin"></iframe>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--== Start: Contact Section Wrapper ==-->
            <div class="contact-section section section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <!--== Start: Section Title ==-->
                            <div class="section-title contact-section-title mt-n3 mb-8 mb-xl-10 pb-4">
                                <h2 class="title">Get In Touch</h2>
                                <p>Please write to us if you would like to get involved and become part of our journey in transforming children’s lives.</p>
                                <span class="shape"><img src="{{ asset('/images/shape/section-title.png') }}" width="99" height="7" alt="Section Title Shape"></span>
                            </div>
                            <!--== End: Section Title ==-->

                            <!--== Start Contact Form ==-->
                            <div class="contact-form">
                                <form id="contact-form" action="https://whizthemes.com/mail-php/raju/arden/mail.php" method="POST">
                                    <div class="form-group mb-3 mb-xl-4">
                                        <input class="form-control" type="text" name="con_name" placeholder="Name:">
                                    </div>
                                    <div class="form-group mb-3 mb-xl-4">
                                        <input class="form-control" type="text" name="con_phone" placeholder="Phone:">
                                    </div>
                                    <div class="form-group mb-3 mb-xl-4">
                                        <input class="form-control" type="email" name="con_email" placeholder="Email:">
                                    </div>
                                    <div class="form-group mb-5 mb-xl-10">
                                        <textarea class="form-control" name="con_message" placeholder="Message:"></textarea>
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
            <!--== End: Contact Section Wrapper ==-->
        </main>
@endsection
