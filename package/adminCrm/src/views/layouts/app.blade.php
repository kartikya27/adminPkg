<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('app_name') | Admin CRM</title>
		
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        
        <!-- Scripts -->
        @vite(['resources/assets/css/app.css', 'resources/assets/js/app.js'])
        <!-- Admin Layout Custom CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/admin.css')}}">   
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.owl.css')}}">
        <style> @yield('style') </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('AdminCrm::layouts.navigation')

            <!-- Page Content -->
            <main>
                <div class="container-fluid">
                    <div class="row">
                	    <div class="col-md-2 admin-menu-cont">
                			<a href="/admin/" class="admin-menu home"><i class="fas fa-home"></i>Home</a>
                			<a href="/admin/orders" class="admin-menu orders"><i class="fas fa-shopping-cart"></i>Orders</a>
	    					<div class="collapse" id="ordersCollapse">
	    					    <a href="/admin/orders" class="admin-menu1 orders">Orders</a>
	    					    <a href="/admin/checkouts" class="admin-menu1 checkouts">Abandoned checkouts</a>
	    					</div>
	    					<a href="/admin/products" class="admin-menu products"><i class="fas fa-tag"></i>Products</a>
	    					<div class="collapse" id="productsCollapse">
	    					    <a href="/admin/products" class="admin-menu1 products">All products</a>
	    					    <a href="/admin/categories" class="admin-menu1 categories">Categories</a>
	    					    <a href="/admin/combos" class="admin-menu1 combos">Combos</a>
	    					</div>
	    					<!--<a href="/admin/lookbooks" class="admin-menu lookbooks"><i class="fas fa-tags"></i>Lookbooks</a>-->
	    					<a href="/admin/customers" class="admin-menu customers"><i class="fas fa-user"></i>Customers</a>
	    					<a href="/admin/discounts" class="admin-menu discounts mb-4"><i class="fas fa-percentage"></i>Discounts</a>
							
	    					<a class="admin-subheading">SALES CHANNELS</a>
	    					<a class="admin-menu store" onclick="storeCollapse();"><i class="fas fa-store"></i>Online Store</a> <button class="btn btn-link storeBtn" onclick="window.open('{{config('app.url')}}', '_blank');"><i class="far fa-eye"></i></button>
							<div class="collapse" id="storeCollapse">
	    					    <a href="/admin/announcement_bar/" class="admin-menu store" onclick="homeCollapse();"><i class="fas fa-edit"></i>Home</a>
								<div class="collapse" id="homeCollapse">
									<a href="/admin/announcement_bar/" class="admin-menu1 announcement">Announcement Bar</a>
									<a href="/admin/home_banner/" class="admin-menu1 slider">Slide Show</a>
									<a href="/admin/blue_section/" class="admin-menu1 blue">Text with Link</a>
									<a href="/admin/red_section/" class="admin-menu1 red">Text</a>
								</div>
	    					    <a href="/admin/blue-slider/" class="admin-menu store" onclick="ourStoryCollapse();"><i class="fas fa-edit"></i>Our Story</a>
								<div class="collapse" id="ourStoryCollapse">
									<a href="/admin/blue-slider/" class="admin-menu1 blue_banner">Text Section</a>
									<a href="/admin/about_company/" class="admin-menu1 about_company">About Text</a>
									<a href="/admin/footer_section/" class="admin-menu1 footer_section">Footer Banner</a>
								</div>
	    					    <a href="/admin/health_banner/" class="admin-menu store" onclick="healthPageCollapse();"><i class="fas fa-edit"></i>Health Shots</a>
								<div class="collapse" id="healthPageCollapse">
									<a href="/admin/health_banner/" class="admin-menu1 health_banner">Banner</a>
									<a href="/admin/red_section/" class="admin-menu1 red">Text</a>
								</div>
	    					</div>
							
	    					<a href="/admin/settings" class="admin-menu settings"><i class="fas fa-cog"></i>Settings</a>
                		</div>
                	    <div class="col-md-10 admin-main-cont">
	    				    @yield('content')
                		</div>
                	</div>
                </div>
            </main>

            
        </div>
        
        <script src="{{ asset('assets/js/admin-jQuery-bootstrap-owl.js') }}"></script>
	    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>
		    function storeCollapse(){
				$('#storeCollapse').collapse('toggle');
			}
		    function homeCollapse(){
				$('#homeCollapse').collapse('toggle');
			}
		    function ourStoryCollapse(){
				$('#ourStoryCollapse').collapse('toggle');
			}
		    function healthPageCollapse(){
				$('#healthPageCollapse').collapse('toggle');
			}
		</script>
		@yield('scriptContent')
    </body>
</html>
