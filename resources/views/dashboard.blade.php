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
    .myaccount-Information-form .label1 {
    font-size: 1.208vw;
    letter-spacing: 0.121vw;
}
.myaccount-Information-form .label2 {
    font-size: 1.040vw;
    letter-spacing: 0.104vw;
}

.custom-control-label {
    position: relative;
    margin-bottom: 0;
    vertical-align: top;
}
.custom-control {
    position: relative;
    z-index: 1;
    display: block;
    min-height: 1.5rem;
    /* padding-left: 1.5rem; */
}
.form-control {
    display: block;
    width: 100%;
    height: calc(1.5em + 0.75rem + 2px);
    padding: 0.375rem 0.75rem !important;
    font-size: 1rem !important;
    font-weight: 400;
    line-height: 1.5 !important;
    color: #495057;
    background-color: #fff !important;
    background-clip: padding-box;
    border: 1px solid #ced4da !important;
    border-radius: 0.25rem !important;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
.form-row>.col, .form-row>[class*=col-] {
    padding-right: 5px;
    padding-left: 5px;
}
button, input {
    overflow: visible;
}

button, input, optgroup, select, textarea {
    margin: 0;
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}
button, input {
    overflow: visible;
}
button, input, optgroup, select, textarea {
    margin: 0;
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
}
.form-row {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -5px;
    margin-left: -5px;
}
.custom-control-label::before, .custom-file-label, .custom-select {
    transition: background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}

.custom-select {
    display: inline-block;
    width: 100%;
    height: calc(1.5em + 0.75rem + 2px);
    padding: 0.375rem 1.75rem 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    vertical-align: middle;
    background: #fff url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='4' height='5' viewBox='0 0 4 5'%3e%3cpath fill='%23343a40' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e) no-repeat right 0.75rem center/8px 10px;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
}
select {
    word-wrap: normal;
}
button, select {
    text-transform: none;
}
button, input, optgroup, select, textarea {
    margin: 0;
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
}
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
                        <a class="nav-link myaccountBtn myaccount active" href="/dashboard">My account</a>
                        
                        <a class="nav-link myaccountBtn mydonations" href="/mydonation">Donations</a>
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
                        <p class="subheading1">Contact Information</p>
                        <div class="row">
                            <div class="col-3 text1">Name:</div>
                            <div class="col-9 text1">{{ Auth::user()->name }}</div>
                        </div>
                        <div class="row">
                            <div class="col-3 text1">Email:</div>
                            <div class="col-9 text1">{{ Auth::user()->email }}</div>
                        </div>
                        <div class="row">
                            <div class="col-3 text1">Phone:</div>
                            <div class="col-9 text1">@php if(!empty($userArray->phone))echo $userArray->phone @endphp</div>
                        </div>
                        <div class="row">
                            <div class="col-3 text1">Referral Code:</div>
                            <div class="col-9 text1">{{ $userArray->referalCode }}</div>
                        </div>
                    </div>
                    <div class="container myaccount-divider"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 mb-4 mb-md-0">
                                <p class="subheading1">Basic Details</p>
                                <p class="text1 mb-0">
                                    @php if(!empty($userArray->address))echo 
                                    $userArray->address.", ".$userArray->district .", ". $userArray->state . " - ". $userArray->pincode .", ". $userArray->country;
                                    else{
                                        echo "No Information";
                                    }
                                    @endphp
                                </p>
                                <br>
                                <div class="row">
                                    <div class="col-3 text1">Pan Number:</div>
                                    <div class="col-9 text1">{{ $userArray->panNo }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-3 text1">Aadhar Number:</div>
                                    <div class="col-9 text1">{{ $userArray->aadharNo }}</div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="container myaccount-divider"></div>
                    <div class="container">
                        <p class="subheading1">Subscription</p>
                        <p class="text1 mb-5"> Subscribled to our newsletter (@php if($userArray->subscription == 1){echo "Subscribed";} else {echo "No";} @endphp) </p>
                        <button type="button" class="btn btn-primary accountMainBtn" data-bs-toggle="modal"
                            data-bs-target="#myaccountInfo">Update details</button>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

<div class="modal fade" id="myaccountInfo" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
		        <form class="needs-validation myaccount-Information-form" action="/dashboard" method="POST" >
				    @csrf               	
                    <div class="form-row">
    				    <div class="col-md-6 mb-3">
    					    <p class="label1 mb-0">Contact Information</p>
    					</div>
                		<div class="col-md-12 mb-3">
                			<input type="text" class="form-control" id="validationCustom01" name="email" value="{{$userArray->email}}" placeholder="Name" readonly required />
                		</div>
    				</div>
                	<div class="form-group mb-5">
						<div class="custom-control custom-checkbox">
						    <input type="checkbox" class="custom-control-input" id="validationCustom02" name="subscription"   checked  >
							<label class="custom-control-label label2" for="validationCustom02">Keep me up to date on news and exclusive offers</label>
						</div>
                	</div>
                	<div class="form-row">
                		<div class="col-md-12 mb-3">
    					    <p class="label1 mb-0">Address</p>
    					</div>
                        <div class="col-md-12 mb-3">
    					    <input type="text" class="form-control" id="validationCustom05" name="address" value="{{$userArray->address}}" placeholder="Address" required />
    					</div>
                	</div>
                	<div class="form-row">
                        <div class="col-md-4 mb-3">
                			<input type="text" class="form-control" id="pincode" name="pincode" value="{{$userArray->pincode}}" placeholder="Pincode" required />
                		</div>
                        
    					<div class="col-md-4 mb-3">
                        <input type="text" class="form-control" id="state" placeholder="State" value="{{$userArray->state}}" name="state" readonly />
                		</div>
                		<div class="col-md-4 mb-3">
                			<select class="custom-select" id="country" name="country" readonly>
                				<option disabled>Country/Region</option>
                				<option value="India" selected>India</option>
                				<option value="Others">Others</option>
                			</select>
                		</div>
                		<div id="pincodeLoad" style="display:none">Finding...</div>
                		<div class="col-md-12 mb-3">
                			<input type="text" class="form-control" placeholder="District" id="district" name="district" value="{{$userArray->district}}" readonly />
                		</div>
                		
                	</div>
    				<div class="form-row">
                		<div class="col-md-12 mb-3">
    					    <input type="number" class="form-control" id="validationCustom10" name="phone" placeholder="Phone"  value="{{$userArray->phone}}" />
    					</div>
    				</div>
					<div class="form-row">
                		<div class="col-md-12 mb-3">
    					    <p class="label1 mb-0">Taxation Details</p>
    					</div>
                		<div class="col-md-6 mb-3">
                			<input type="text" class="form-control" id="validationCustom03" name="panCard"  placeholder="Pan Card" value="{{$userArray->panNo}}" />
                		</div>
                		<div class="col-md-6 mb-3">
                			<input type="text" class="form-control" id="validationCustom04" name="aadharCard"  placeholder="Aadhar Number" value="{{$userArray->aadharNo}}" />
                		</div>
                	</div>
					
                	<div class="form-row mt-4">
    				    <div class="col-md-12 mb-3">
    					    <button class="btn btn-primary" type="submit">Submit</button>
							<button type="button" class="btn btn-link" data-bs-dismiss="modal">Close</button>
    					</div>
    				</div>
                </form>
			</div>
		</div>
	</div>
</div>
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

    $(document).ready(function () {
        $('#pincode').blur(function () {
            var pincode = $(this).val();
            
            $.ajax({
                url: "/api/GetFinalLocation/",
                type: 'GET',
                dataType:'json',
                cache: false,
                data: {pincode: pincode},
                beforeSend: function () {
                    $("#pincodeLoad").show();
                },
                success: function (response) {
                    if (response.res == "No") {
                        // alert(response.res);
                        $("#state").val("");
                        $("#country").val("");
                        $("#district").val("");
                        $("#pincodeLoad").hide();
                    }else{
                        // alert(response.res);
                        $("#state").val(response.state);
                        $("#country").val(response.country);
						$("#district").val(response.district);
                        $("#pincodeLoad").hide();
                    }
                }
            });
        });
    });
</script>
</body>