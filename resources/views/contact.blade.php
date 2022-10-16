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
                                            <a href="tel://{!!$contact->phone1!!}">(+91) {!!$contact->phone1!!}</a>
                                        </li>
                                        @if($contact->phone2 != '')
                                        <li>
                                            <i class="icofont-ui-call"></i>
                                            <a href="tel://{!!$contact->phone1!!}">(+91) {!!$contact->phone2!!}</a>
                                        </li>
                                        @endif
                                        <li>
                                            <i class="icofont-envelope-open"></i>
                                            <a href="mailto://{!!$contact->email1!!}">{!!$contact->email1!!}</a>
                                        </li>
                                        @if($contact->email2 != '')
                                        <li>
                                            <i class="icofont-envelope-open"></i>
                                            <a href="tel://{!!$contact->email2!!}">{!!$contact->email2!!}</a>
                                        </li>
                                        @endif
                                        <li>
                                            <i class="icofont-location-pin"></i>
                                            <p>{!!$contact->address!!}</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                
                                    <iframe width="100%" height="400px" src="{!!$contact->map!!}"></iframe>
                                
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
                                <form id="contact-form">
                                    @csrf
                                    <div class="form-group mb-3 mb-xl-4">
                                        <input class="form-control" type="text" name="con_name" placeholder="Name:">
                                    </div>
                                    <div class="form-group mb-3 mb-xl-4">
                                        <input class="form-control" type="number" name="con_phone" placeholder="Phone:" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10">
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
                                <div id="form-message" class=""></div>
                            </div>
                            <!--== End Contact Form ==-->
                        </div>
                    </div>
                </div>

                
            </div>
            <!--== End: Contact Section Wrapper ==-->
        </main>
@endsection

@section('scripts')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script>

$(document).on("click", ".contact-form-btn", function() {
    var form = new FormData(document.getElementById("contact-form"));
   
    $.ajax({
      url: "/contact",
      type: 'POST',
      dataType: 'json',
      data: form,
      processData: false,
      contentType: false,
      cache: false,
      success: function(response) {
        if (response.res == true) {
          $("#form-message").html('<div class="alert alert-success" role="alert">' + response.msg + '</div>');
          setTimeout(() => {
            location.reload();
          }, 2000);
        } else {
          $("#form-message").html('<div class="alert alert-danger" role="alert">' + response.msg + '</div>');
          setTimeout(() => {
            location.reload();
            $("#form-message").html('');
          }, 2000);
        }
      }
    });
    });
</script>
@endsection
