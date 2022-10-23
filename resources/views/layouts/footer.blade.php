@section('footer')
<footer class="footer-section section">
    <!--== Start: Footer Main ==-->
    <div class="footer-main section-padding bg-img" data-bg-img="{{ asset('/images/photos/bg2.jpg') }}">
        <div class="container mb-n3">
            <div class="row align-items-center">
                <div class="col-md-4 col-lg-3 mb-8 mb-md-0">
                    <!--== Start: Footer Widget ==-->
                    <div class="footer-widget text-center text-md-start">
                        <a class="footer-widget-logo me-auto me-md-0 ms-auto ms-md-0" href="index.html">
                            <img src="{{ asset('/images/logo/logo_W.png') }}" width="220" height="58" alt="Logo" />
                        </a>
                        <p class="footer-widget-desc me-auto me-md-0 ms-auto ms-md-0">A small help from you can bring a
                            smile to everyone's face. And will inspire us to move forward.</p>
                        <div class="footer-widget-donars">
                            <h5 class="donars-title">We are registered with :</h5>
                            <div class="logo">
                                <div class="row" style="background:#fff;">
                                    <div class="col-6">
                                        <img src="https://www.ngoaaptak.com/wp-content/uploads/2021/01/ngo-darpan-300x134-1.png"
                                            alt="">
                                    </div>
                                    <div class="col-6">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/Ministry_of_Corporate_Affairs_India.svg/1200px-Ministry_of_Corporate_Affairs_India.svg.png"
                                            alt="">
                                    </div>
                                   
                                </div>


                            </div>
                        </div>
                    </div>
                    <!--== Start: Footer Widget ==-->
                </div>
                <div class="col-md-8 col-lg-6">
                    <!--== Start: Footer Widget ==-->
                    <div class="footer-widget">
                        <div class="row">
                            <div class="col-md-6 footer-widget-nav1">
                                <h4 class="footer-widget-title">Schemes</h4>
                                <h4 class="collapsed-title collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#dividerId-1" aria-expanded="false">Schemes</h4>
                                <div id="dividerId-1" class="widget-collapse-body collapse">
                                    <ul class="footer-widget-nav">
                                        @php
                                        $subMenu =
                                        Kartikey\AdminCrm\Models\products::where('program_status','active')->get();@endphp
                                        @foreach ($subMenu as $subMenus)
                                        <li><a
                                                href="/what-we-do/{{$subMenus->program_category}}/{{$subMenus->program_url}}">{{ ucwords($subMenus->programName )}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 footer-widget-nav2">
                                <h4 class="footer-widget-title">Qtuick Links</h4>
                                <h4 class="collapsed-title collapsed mt-2" data-bs-toggle="collapse"
                                    data-bs-target="#dividerId-2" aria-expanded="false">Qtuick Links</h4>
                                <div id="dividerId-2" class="widget-collapse-body collapse">
                                    <ul class="footer-widget-nav">
                                        <li><a href="{{route('volunteer')}}">Volunteer</a></li>
                                        <li><a href="{{route('success-stories')}}">Success Stories</a></li>
                                        <li><a href="/events">Events</a></li>
                                        <li><a href="/activity">Activity</a></li>
                                        <li><a href="/gallery">Gallery</a></li>
                                        <li><a href="/contact">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--== Start: Footer Widget ==-->
                </div>
                <div class="col-lg-3 ps-3 ps-xl-10 mt-8 mt-lg-0">
                    <!--== Start: Footer Widget ==-->
                    <div class="footer-widget">
                        <h4 class="footer-widget-title mb-5 mb-xl-10 pb-1">Contact Us</h4>
                        <h4 class="collapsed-title collapsed" data-bs-toggle="collapse" data-bs-target="#dividerId-3"
                            aria-expanded="false">Contact Us</h4>
                        <div id="dividerId-3" class="widget-collapse-body collapse">
                            <ul class="footer-widget-info">
                                <li>
                                    <i class="icofont-ui-call"></i>
                                    <a href="tel://{!! $contact->phone1 !!}">(+91) {!! $contact->phone1 !!}</a>
                                </li>
                                <li>
                                    <i class="icofont-envelope-open"></i>
                                    <a href="mailto://{!! $contact->email1 !!}">{!! $contact->email1 !!}</a>
                                </li>
                                <li>
                                    <i class="icofont-location-pin"></i>
                                    <p>{!! $contact->address !!}</p>
                                </li>
                            </ul>

                        </div>
                    </div>
                    <!--== Start: Footer Widget ==-->
                </div>
            </div>
        </div>
    </div>
    <!--== End: Footer Main ==-->

    <!--== Start: Footer Bottom ==-->
    <div class="footer-bottom">
        <div class="container">
            <div class="row flex-row-reverse flex-md-row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="footer-copyright">© 2022 Shankaraayan.
                    </p>
                </div>

                <div class="col-md-6 text-center text-md-end mt-3 mt-md-0">

                    <p style="display:inline;padding:0 10px 0 0;color:#fff;font-size:12px;letter-spacing:1px;"><a
                            href="https://merchant.razorpay.com/policy/KIefuRT570Yglw/privacy" target="_blank">Privacy
                            Policy</a></p>
                    <p style="display:inline;padding:0 10px 0 0;color:#fff;font-size:12px;letter-spacing:1px;"><a
                            href="https://merchant.razorpay.com/policy/KIefuRT570Yglw/terms" target="_blank">Terms &
                            Condition</a></p>
                    <p style="display:inline;padding:0 10px 0 0;color:#fff;font-size:12px;letter-spacing:1px;"><a
                            href="https://merchant.razorpay.com/policy/KIefuRT570Yglw/refund"
                            target="_blank">Cancellation and Refund</a></p>
                    <p style="display:inline;padding:0 10px 0 0;color:#fff;font-size:12px;letter-spacing:1px;"><a
                            href="https://merchant.razorpay.com/policy/KIefuRT570Yglw/shipping" target="_blank">Shipping
                            and Delivery</a></p>

                    <!--<p class="footer-payment-info">Payment System: <a href="my-account.html"><img-->
                    <!--            src="{{asset('/images/photos/payment-card.png')}}" width="147" height="31" alt="Image"></a></p>-->
                </div>
            </div>
            <!--    <div class="row flex-row-reverse flex-md-row">-->
            <!--    <div class="col-md-12 text-center text-md-end">-->

            <!--    </div>-->
            <!--</div>-->
        </div>
    </div>
    <!--== End: Footer Bottom ==-->
</footer>
<!--== End: Footer Section Wrapper ==-->

<!--== Scroll Button ==-->
<div id="scroll-to-top" class="scroll-to-top"><span class="icofont-rounded-up"></span></div>

<!--== Start: Aside Menu ==-->
<aside class="off-canvas-wrapper offcanvas offcanvas-start" tabindex="-1" id="AsideOffcanvasMenu"
    aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h6 class="d-none" id="offcanvasExampleLabel">Aside Menu</h6>
        <button class="btn-menu-close" data-bs-dismiss="offcanvas" aria-label="Close">Shankaraayan <i
                class="icofont-rounded-left"></i></button>
    </div>
    <div class="offcanvas-body">
        <div class="mobile-menu-action">
            <!-- Mobile Menu Start -->
            <div class="mobile-menu-items">
                <ul class="nav-menu">
                    <li><a href="/">Home</a></li>

                    <li><a href="#">What we do</a>
                        <ul class="sub-menu">
                            @foreach($menu as $menu)
                            <li><a href="#/">{{$menu->main_menu}}</a>
                                <ul class="sub-menu">
                                    @php
                                    $subMenu =
                                    Kartikey\AdminCrm\Models\Products::where('program_category',$menu->menu_slug)->get();@endphp
                                    @foreach ($subMenu as $subMenus)
                                    <li><a
                                            href="/what-we-do/{{$menu->menu_slug}}/{{$subMenus->program_url}}">{{ ucwords($subMenus->programName )}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach

                    </li>

                    <li><a href="{{route('volunteer')}}">Volunteer</a></li>
                    <!-- <li><a href="/wellbeing">Wellbeing Facts</a></li> -->
                    <li><a href="{{route('success-stories')}}">Success Stories</a></li>
                </ul>
                </li>
                <li class="has-submenu"><a href="">Activity & Events</a>
                    <ul class="sub-menu">
                        <li><a href="/events">Events</a></li>
                        <li><a href="/activity">Activity</a></li>
                    </ul>
                </li>
                <li><a href="/gallery">Gallery</a></li>
                <li><a href="/contact">Contact</a></li>
                <li> @php if(!empty(Auth::user()->email)){ @endphp
                    <a class="nav-link myaccountBtn logout" href="/logout"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log out</a>
                    <form id="logout-form" action="/logout" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a class="header-donate-btn" href="/dashboard"
                        style="padding: 8px 24px !important;margin-left:1px">Account</a>
                    @php }else{ @endphp
                    <a class="header-donate-btn" href="/login"
                        style="padding: 8px 24px !important;margin-left:1px">Login</a>
                    @php } @endphp
                </li>
                </ul>
            </div>
            <!-- Mobile Menu End -->
            <ul class="mobile-menu-info-list">
                <li>
                    <i class="icon icofont-ui-call"></i>
                    <a href="tel://7014875375" class="text">(+91) 70148 75375</a>
                </li>
                <li>
                    <i class="icon icofont-envelope-open"></i>
                    <a href="mailto://support@shankaraayan.com" class="text">support@shankaraayan.com</a>
                </li>

            </ul>
        </div>
        <a class="btn btn-primary mobail-header-donate-btn" href="donate">Donate Now</a>
    </div>
</aside>
@endsection