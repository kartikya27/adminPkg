<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('page-title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.min.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('css/plugins/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/icofont.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('header-scripts')
    <style>
    body {
        letter-spacing: 1px;
    }
    .btn{padding: 8px 24px;margin-bottom: 1px;}
    .round-btn {
        background-color: #131b13;
        padding-right: 20px;
        padding-left: 20px !important;
        margin: 0 0 0 10px;
        border-radius: 30px;
        color: #fff !important;
    }

    .round-btn a:hover {
        color: #fff !important
    }

    .onlyOnIpad,
    .onlyOnMobile {
        display: none;
    }

    @media screen and (max-width: 767px){ .notOnMobile {
        display: none;
    }}

    .myaccount-main-cont {
        padding-top: 5.71vw;
        padding-bottom: 3.807vw;
    }

    .containerLimit {
        max-width: 83vw;
    }

    header {
        display: none
    }

    .subheading1 {
        font-size: 1.464vw;
        line-height: 1.4;
        letter-spacing: 0.092vw;
        font-weight: bolder;
    }
    @media screen and (max-width: 767px){
.myaccount-main-cont .subheading1 {
    margin-bottom: 10px;
}}

@media screen and (max-width: 991px){
.subheading1 {
    font-size: 16px;
    letter-spacing: 1px;
}}

    .text1 {
        font-size: 1.318vw;
        letter-spacing: 0.082vw;
        line-height: 1.3;
        color: #3D3D3B;
    }
    @media screen and (max-width: 991px){
.text1 {
    font-size: 16px;
    line-height: 21px;
}}
    .myaccount-divider {
        height: 1px;
        border-bottom: 1px solid #c9c9c9;
        margin-top: 40px;
        margin-bottom: 40px;
    }

    p {
        margin-top: 0;
        margin-bottom: 1rem;
    }
    .pending{color:red;font-size:16px;  align-self: center;}
    .success{color:green;font-size:16px;  align-self: center;}
    </style>
</head>

<body>

    <x-app-layout>
        <x-slot name="header"></x-slot>

        <div class="container containerLimit myaccount-main-cont">
            <div class="row">
                <div class="col-lg-3 myaccount-left-cont ">
                    <div class="nav flex-lg-column nav-pills" id="v-pills-tab" role="tablist"
                        aria-orientation="vertical">
                        <a class="nav-link myaccountBtn myaccount" href="/dashboard">My account</a>
                        
                        <a class="nav-link myaccountBtn mydonations active" href="/donation">Donations</a>
                        <a class="nav-link myaccountBtn logout" href="/logout"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="/logout" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
                
                <div class="col-lg-9 myaccount-right-cont">
                    <div class="container">
                        <p class="subheading1">All Donation History</p>
                        <div class="container myaccount-divider"></div>
                        @foreach($donationArray as $donation)
                        <div class="row">
                            <div class="col-3 text1">Date:</div>
                            <div class="col-9 text1">@php $middle = strtotime($donation->created_at); echo date('d-M-Y', $middle ) @endphp</div>
                        </div>
                        <div class="row">
                            <div class="col-3 text1">Status:</div>
                            <div class="col-9 text1">@php if($donation->payment_status == 'created'){echo "<span class='pending'>Pending</span>"; } else {echo "<span class='success'>Success</span>"; } @endphp</div>
                        </div>
                        <div class="row">
                            <div class="col-3 text1">Payment ID:</div>
                            <div class="col-9 text1">{{ $donation->order_id }}</div>
                        </div>
                        <div class="row">
                            <div class="col-3 text1">Donation Scheme:</div>
                            <div class="col-9 text1">Quick {{ $donation->product_id }}</div>
                        </div>
                        <div class="container myaccount-divider"></div>
                        @endforeach
                        
                    </div>
                    
                    
                   
                </div>
            </div>
        </div>
    </x-app-layout>
    <script src="{{ asset('js/vendor/modernizr-3.11.7.min.js') }}"></script>
        <script src="{{ asset('js/vendor/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('js/vendor/jquery-migrate-3.3.2.min.js') }}"></script>
        <script src="{{ asset('js/vendor/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('js/plugins/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('js/plugins/svg-inject.min.js') }}"></script>
        <script src="{{ asset('js/plugins/fancybox.min.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>

</body>