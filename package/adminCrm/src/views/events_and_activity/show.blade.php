@extends('AdminCrm::layouts.app')
@section('app_name','Events And Activity | Dashboard - Shankaraayan')
@section('style','.admin-menu.products i{color:#142437;}.admin-menu1.events{background-color:#eaeaea;border-left:5px solid #142437;color:#142437;}')
@section('content')
<div class="container">
	<div class="container p-0 mb-4">
	    <div class="row">
		    <div class="col-6">
			    <table class="table-borderless" style="width:100%;height:100%"><tr><td class="align-middle pl-0" style="width:100%;height:100%">
					<h1 class="heading1">Text Area</h1>
				</td></tr></table>
			</div>
            @if (empty($data['content']))
			<div class="col-6 text-end">
			    <button class="btn btn-primary" onclick="window.location.href='/admin/events/new'">Add Section Content</button>
			</div>
           @endif 
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
                			<th scope="col" width="">Sr.</th>
                			<th scope="col" width="100px">Image</th>
                			<th scope="col" width="">Event Name</th>
                			<th scope="col" width="">Date</th>
                			<th scope="col" width="">Venue</th>
                			<th scope="col" width="">Type</th>
                		</tr>
                	</thead>
                	<tbody>
						@php $x=1; @endphp
                		@foreach($data as $event)
		        		<tr class="table-row" data-href="/admin/events/{{$event['id']}}">
                			
                			<td class="align-middle">
							    <table class="table-borderless" style="width:100%;height:100%"><tr><td class="align-middle pl-0" style="width:100%;height:100%">
								{{$x}}@php $x++; @endphp 
								</td></tr></table>
							</td>
                			<td class="align-middle">
							    <table class="table-borderless" style="width:100%;height:100%"><tr><td class="align-middle pl-0" style="width:100%;height:100%">
								<div class="img-block mr-0" style="background-image:url('/storage/home/events/{{$event['desktopImg']}}');"></div>
								</td></tr></table>
							</td>
                			
                			<td class="align-middle">
							    <table class="table-borderless" style="width:100%;height:100%"><tr><td class="align-middle pl-0" style="width:100%;height:100%">
								{{$event['eventName']}}    
								</td></tr></table>
							</td>
                			<td class="align-middle">
							    <table class="table-borderless" style="width:100%;height:100%"><tr><td class="align-middle pl-0" style="width:100%;height:100%">
								{{$event['date']}}    
								</td></tr></table>
							</td>
                			<td class="align-middle">
							    <table class="table-borderless" style="width:100%;height:100%"><tr><td class="align-middle pl-0" style="width:100%;height:100%">
								{{$event['venue']}}    
								</td></tr></table>
							</td>
                			
                			<td class="align-middle">
							    <table class="table-borderless" style="width:100%;height:100%"><tr><td class="align-middle pl-0" style="width:100%;height:100%">
								{{$event['type']}}    
								</td></tr></table>
							</td>
                			
                		</tr>
						
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
	var menu1Collapse = document.getElementById('eventsCollapse');
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