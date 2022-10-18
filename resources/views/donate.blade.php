@extends('layouts.master')

@section('page-title','Donate Online - Shankaraayan NGO | Shankaraayan - A Help Initiative')
@section('page-css','body{background:white;}.overlay{background: #5d3004;opacity: 0.7;color:
#fff;}.section-margin{margin:70px 0; }')
@extends('layouts.footer')
@section('header-scripts')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
@endsection
@section('content')

<main class="main-content">
    <!--== Start: Page Header Area Wrapper ==-->
    <div class="section page-header-area" data-bg-img="{{ asset('/images/photos/bg.jpg') }}">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-sm-auto text-center text-sm-start">
                    <h1 class="page-header-title">Donate - Shankaraayan NGO</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="donation-section section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="text-center">Your donation will further our vision of ensuring a happy and healthy
                        childhood for India’s children. Donate to make a change.</p>
                    <div class="about-section section section-margin pt-0 pb-0 pt-xl-5 pb-xl-5">
                        <div class="container">
                            <div class="row mt-n1 pt-0 pt-lg-5 pt-xl-10 pb-6 pb-md-10 pb-lg-5 pb-xl-10 mb-5 mb-lg-0">
                                <div class="col-lg-5">
                                    <!--== Section Title Start ==-->
                                    <div class="section-title-2 mb-0">
                                        <h6 class="sub-title">Donation to Shankaraayan</h6>
                                        <h2 style="font-size:36px;" class="title">HELP US TRANSFORM A CHILD’S LIFE</h2>

                                        <br>
                                        <div class="contact-form">
                                            <form action="#" id="contact-form">
                                                <div class="form-group mb-3 mb-xl-4">
                                                    <input class="form-control" type="text" name="name" id="name" 
                                                        placeholder="Name:">
                                                </div>
                                                <div class="form-group mb-3 mb-xl-4">
                                                    <input class="form-control" type="text" name="phone" id="phone" 
                                                        placeholder="Phone:">
                                                </div>
                                                <div class="form-group mb-3 mb-xl-4">
                                                    <input class="form-control" type="email" name="email" id="email" 
                                                        placeholder="Email:">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">₹</span>
                                                    <input type="text" class="form-control"
                                                        aria-label="Amount (to the nearest Rupee)"
                                                        placeholder="e.g. 5000" id="custom">

                                                </div>

                                                <button type="button" class="btn btn-primary btn-icon-right buy_now1">
                                                    <span>Donate Now</span>
                                                    <i class="icofont-double-right icon"></i>
                                                </button>
                                            </form>

                                            <!--== Message Notification ==-->
                                            <div class="form-message"></div>
                                        </div>

                                        <p style="font-size:12px;">Secure Payment · This site is protected by reCAPTCHA
                                            and the Google Privacy Policy and Terms of Service apply.
                                            <br>
                                            As per the Indian Income Tax Authority Rule, a donor is required to add
                                            their PAN number if they wish to receive the 80G certificate. Send your PAN
                                            Copy on support@shankaraayan.com with payment recipt
                                        </p>
                                    </div>
                                    <!--== Section Title End ==-->
                                </div>
                            </div>

                        </div>
                        <div class="who-we-img-secion section-bg-img section-bg-img-style1"
                            data-bg-img="/storage/home/who_we_section/shankaraayan-a-help-initiative-ngo-india-desktopImage-09540015082022.jpg">
                        </div>
                        <div class="section-pattern-img section-pattern-img-style2 pattern-img-move">
                            <img src="{{ asset('/images/shape/2.png') }}" width="148" height="190" alt="Image" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p>UPI:7014875375@hdfcbank<br>
                                Cheque/DD/NEFT: SHANKARAAYAN FOUNDATION<br>
                                A/c No: 50200071643296<br>
                                IFSC Code: HDFC0005306<br>
                                Branch: HDFC BANK Nirman Nagar, Jaipur, Raj - 302019
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p>Financial Details<br>
                                Permanent Account Number: ABICS8281P<br>
                                80G Registration Number: **********20220<br>
                                From AY 2022-23 to AY 2026-27</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section"
        data-bg-img="https://resize.indiatvnews.com/en/resize/newbucket/1200_-/2022/07/income-tax-new-1659163750.jpg"
        style="background-size: cover;">

        <div class="overlay">
            <div class="page-header-area">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="text-center ">
                            <h1 class="page-header-title">80G TAX BENEFITS</h1>
                            <p>Avail 50% tax exemption under Section 80G (5) (IV) of Income tax Act 1961

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="donation-section section section-padding">
        <div class="container">
            <div class="row">
                <h2 class="title">Donors, please note</h2>
                <hr>
                <div class="col-md-4">
                    <p><i class="icofont-double-right"></i> Funds are directly spent on educating a underpriviliged
                        child across India. The costs include actual school fees and 10% operational costs.</p>
                </div>
                <div class="col-md-4">
                    <p><i class="icofont-double-right"></i> You may cease donations at any time if so required.
                        Our support team will help.</p>
                </div>
                <div class="col-md-4">
                    <p><i class="icofont-double-right"></i> All Tax exemptions, receipts and documents will be provided.

                        Email support@shankaraayan.com for assistance.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="about-section section section-padding ">
        <div class="container">
            <!-- <h6 class="sub-title">OUR MISSION AND VISSION</h6> -->
            <div class="about-content">
                <h2 class="title ">The Shankaraayan Impact</h2>
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

</main>
@endsection


@section('scripts')

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var SITEURL = window.location.origin;
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).on('click', '.buy_now1', function(e) {
    var totalAmount = $('#custom').val();
    var data ={
        "product_id" : "Donation",
        "phone" : $('#phone').val(),
        "email" : $('#email').val(),
        "name" : $('#name').val(),
        "totalAmount" : $('#custom').val(),
    }
    // var email = $('#email').val();
    // var name = $('#name').val();

    $.ajax({
        method:"POST",
        url :   "/pay",
        dataType: 'json',
        data:data,
        success:function(response){
            // alert(response.order_id);
            var order_id = response.order_id
            var status = response.status
            // razorpay
            var options = {
                "key": "rzp_live_lAxoy4bjsirWVK",
                "amount": (totalAmount * 100), // 2000 paise = INR 20
                "name": "Shankaraayan Foundation",
                "description": "QUICK DONATION",
                "image": "//www.demo.shankaraayan.com/images/logo/shankaraayan.png",
                "handler": function(response) {
                    // alert(response.order_id);
                    $.ajax({
                        method:"POST",
                        url :   "/paymentsuccess",
                        dataType: 'json',
                        data:{payment_id:response.razorpay_payment_id,order_id:order_id,status:status},
                        success:function(response){
                            window.location.href = "thankyou?order_id="+response.order_id;
                        }
                    });
                    // window.location.href = SITEURL + '/' + 'paymentsuccess?payment_id=' + response.razorpay_payment_id + '&product_id=' + product_id + '&amount=' + totalAmount+'&order_id='+response.order_id;
                },
                "prefill": {
                    "contact": $('#phone').val(),
                    "email": $('#email').val(),
                    "name": $('#name').val(),
                },
                "theme": {
                    "color": "#528FF0"
                }
            };
    var rzp1 = new Razorpay(options);
    rzp1.open();
    }
    });

    
});

</script>
@endsection