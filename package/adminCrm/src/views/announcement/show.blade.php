@extends('AdminCrm::layouts.app')
@section('app_name','Announcement | Dashboard - Shankaraayan')
@section('style','.admin-menu.products i{color:#142437;}.admin-menu1.announcement{background-color:#eaeaea;border-left:5px solid #142437;color:#142437;}')
@section('content')
<div class="container">
	<div class="container p-0 mb-4">
	    <div class="row">
		    <div class="col-6">
			    <table class="table-borderless" style="width:100%;height:100%"><tr><td class="align-middle pl-0" style="width:100%;height:100%">
					<h1 class="heading1">Announcement Bar</h1>
				</td></tr></table>
			</div>
			<div class="col-6 text-end">
			    <button class="btn btn-primary" onclick="window.location.href='/admin/announcement_bar/create'">Add Announcement</button>
			</div>
		</div>
	</div>
	@if (session('status'))
	<div class="container p-0">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
	@endif
	<div class="container info-cont">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        	<li class="nav-item" role="presentation"> <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#all" role="tab" aria-controls="pills-home" aria-selected="true">All</a>
        	</li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
        	<div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="pills-home-tab">
	            <table class="table">
                	<thead>
                		<tr>
                			
                			<th scope="col">Sr.</th>
                			<th scope="col">Announcement</th>
                			<th scope="col">Link</th>
                		</tr>
                	</thead>
                	<tbody>
						@php $x=1; @endphp
                		@foreach($announcements as $announcment)
		        		<tr class="table-row" data-href="/admin/announcement_bar/{{$announcment['id']}}">
                			<td class="align-middle">
							    <table class="table-borderless" style="width:100%;height:100%"><tr><td class="align-middle pl-0" style="width:100%;height:100%">
								@php echo $x @endphp  
								<!-- {{$announcment['id']}} -->
								</td></tr></table>
							</td>
                			<td class="align-middle">
							    <table class="table-borderless" style="width:100%;height:100%"><tr><td class="align-middle pl-0" style="width:100%;height:100%">
								{{$announcment['content']}}    
								</td></tr></table>
							</td>
                			<td class="align-middle">
							    <table class="table-borderless" style="width:100%;height:100%"><tr><td class="align-middle pl-0" style="width:100%;height:100%">
								@php echo strtolower($announcment['url']) @endphp
								</td></tr></table>
							</td>
                		</tr>
						@php $x++ @endphp
		        		@endforeach
                	</tbody>
                </table>
        	</div>
        </div>
	</div>
</div>
@endsection
@section('scriptContent')
<script>
	var menuCollapse = document.getElementById('storeCollapse');
	var bsCollapse = new bootstrap.Collapse(menuCollapse, {
		toggle: false,
		show: true, //useless
		hide: false //useless
	})
	var menu1Collapse = document.getElementById('homeCollapse');
	var bs1Collapse = new bootstrap.Collapse(menu1Collapse, {
		toggle: false,
		show: true, //useless
		hide: false //useless
	})
	bsCollapse.show();
	bs1Collapse.show();
	
	$(document).ready(function($) {
        $(".table-row").click(function() {
            window.document.location = $(this).data("href");
        });
    });
</script>
@endsection