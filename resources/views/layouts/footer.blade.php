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
                        <p class="footer-widget-desc me-auto me-md-0 ms-auto ms-md-0">It is a long established fact that
                            reader will be distracted by the readable content.</p>
                        <div class="footer-widget-donars">
                            <h5 class="donars-title">Worldwide Donar’s:</h5>
                            <h3 class="donars-number">9,468K</h3>
                        </div>
                    </div>
                    <!--== Start: Footer Widget ==-->
                </div>
                <div class="col-md-8 col-lg-6">
                    <!--== Start: Footer Widget ==-->
                    <div class="footer-widget">
                        <div class="row">
                            <div class="col-md-6 footer-widget-nav1">
                                <h4 class="footer-widget-title">Resources</h4>
                                <h4 class="collapsed-title collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#dividerId-1" aria-expanded="false">Resources</h4>
                                <div id="dividerId-1" class="widget-collapse-body collapse">
                                    <ul class="footer-widget-nav">
                                        <li><a href="about-us.html">Nonprofit Resources</a></li>
                                        <li><a href="about-us.html">CSR Made Simple</a></li>
                                        <li><a href="about-us.html">Corporate Resources</a></li>
                                        <li><a href="about-us.html">Start an Application</a></li>
                                        <li><a href="about-us.html">Corporate Gift Cards</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 footer-widget-nav2">
                                <h4 class="footer-widget-title">Qtuick Links</h4>
                                <h4 class="collapsed-title collapsed mt-2" data-bs-toggle="collapse"
                                    data-bs-target="#dividerId-2" aria-expanded="false">Qtuick Links</h4>
                                <div id="dividerId-2" class="widget-collapse-body collapse">
                                    <ul class="footer-widget-nav">
                                        <li><a href="about-us.html">Start Donating</a></li>
                                        <li><a href="about-us.html">Become a Volunteer</a></li>
                                        <li><a href="about-us.html">Quick Fundraising</a></li>
                                        <li><a href="about-us.html">Save for Animal</a></li>
                                        <li><a href="about-us.html">Get Daily Updates</a></li>
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
                                    <a href="tel://5123602763">(512) 360-2763</a>
                                </li>
                                <li>
                                    <i class="icofont-envelope-open"></i>
                                    <a href="mailto://support@gamil.com">support@gamil.com</a>
                                </li>
                                <li>
                                    <i class="icofont-location-pin"></i>
                                    <p>(303) 420-8143 Arvada, Colorado(CO)</p>
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
                    <p class="footer-copyright">© 2022 Savest. Made with <i class="icofont-heart"></i> by <a
                            target="_blank" href="https://themeforest.net/user/codecarnival/portfolio">Codecarnival.</a>
                    </p>
                </div>
                <div class="col-md-6 text-center text-md-end mt-3 mt-md-0">
                    <p class="footer-payment-info">Payment System: <a href="my-account.html"><img
                                src="assets/images/photos/payment-card.png" width="147" height="31" alt="Image"></a></p>
                </div>
            </div>
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
                            <li><a href="#/">Education</a>
                                <ul class="sub-menu">
                                    <li><a href="{{route('what-we-do.sabko-shiksha')}}">Sabko Siksha Scheme</a></li>
                                    <li><a href="/what-we-do/education/adoption">Child Adoption for Education</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="">Community Empowerment</a>
                                <ul class="sub-menu">
                                    <li><a href="/what-we-do/community-empowerment/210-union">210 Mahasabha Union
                                            (Alwar)</a></li>
                                    <li><a href="/what-we-do/community-empowerment/old-age-home">Old Age Home</a></li>
                                </ul>
                            </li>
                    </li>

                    <li><a href="{{route('volunteer')}}">Volunteer</a></li>
                    <!-- <li><a href="/wellbeing">Wellbeing Facts</a></li> -->
                    <li><a href="{{route('success-stories')}}">Success Stories</a></li>
                </ul>
                </li>
                <li class="has-submenu"><a href="">Activity & Events</a>
                    <ul class="sub-menu">
                        <li><a href="/events">Events</a></li>
                    </ul>
                </li>
                <li><a href="/gallery">Gallery</a></li>
                <li><a href="/contact">Contact</a></li>
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
        <a class="btn btn-primary mobail-header-donate-btn" href="donate.html">Donate Now</a>
    </div>
</aside>
@endsection