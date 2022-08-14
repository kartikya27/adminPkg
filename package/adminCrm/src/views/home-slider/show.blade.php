@extends('AdminCrm::layouts.app')
@section('app_name','Home Banner | Dashboard - Shankaraayan')
@section('style','.admin-menu.products i{color:#142437;}.admin-menu1.slider{background-color:#eaeaea;border-left:5px solid #142437;color:#142437;}')
@section('content')

	
<div class="container">
	<div class="container p-0 mb-4">
	    <div class="row">
		    <div class="col-6">
			    <table class="table-borderless" style="width:100%;height:100%"><tr><td class="align-middle pl-0" style="width:100%;height:100%">
					<h1 class="heading1">Banner Slider</h1>
				</td></tr></table>
			</div>
			<div class="col-6 text-end">
			    <button class="btn btn-primary" onclick="window.location.href='/admin/home_banner/new'">Add Slider</button>
			</div>
		</div>
	</div>
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
                			<th scope="col" style="width:100px">Image</th>
                			<th scope="col">Heading</th>
                			<th scope="col">Text</th>
                			<th scope="col">Button Text</th>
                			<th scope="col">Button Link</th>
                			<th scope="col">Status</th>
                			
                		</tr>
                	</thead>
					<tbody class="row_position">
						@php $x=1; @endphp
                		@foreach($data as $banner)
		        		<tr id="{{$banner['id']}}" class="table-row" data-href="/admin/home_banner/{{$banner['id']}}">
                			<td>
							{{$x}}@php $x++; @endphp
							</td>
                			<td>
							    <div class="img-block mr-0" style="background-image:url('/storage/home/banner/{{$banner['desktopImg']}}');"></div>
							</td>
                			<td class="align-middle">
							    <table class="table-borderless" style="width:100%;height:100%"><tr><td class="align-middle pl-0" style="width:100%;height:100%">
								    {{$banner['heading']}}
								</td></tr></table>
							</td>
                			<td class="align-middle">
							    <table class="table-borderless" style="width:100%;height:100%"><tr><td class="align-middle pl-0" style="width:100%;height:100%">
                                {{$banner['subHeading']}}
								</td></tr></table>
							</td>
                			<td class="align-middle">
							    <table class="table-borderless" style="width:100%;height:100%"><tr><td class="align-middle pl-0" style="width:100%;height:100%">
                                {{$banner['btnText']}}
								</td></tr></table>
							</td>
                			<td class="align-middle">
							    <table class="table-borderless" style="width:100%;height:100%"><tr><td class="align-middle pl-0" style="width:100%;height:100%">
                                {{$banner['btnLink']}}
								</td></tr></table>
							</td>
                			<td class="align-middle">
							    <table class="table-borderless" style="width:100%;height:100%"><tr><td class="align-middle pl-0" style="width:100%;height:100%">
								@if($banner->status == "Active")
									<div class="block3">{{$banner['status']}}</div>
								@else
									<div class="block4">{{$banner['status']}}</div>
								@endif
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
	<!-- /* For Table Shorting */ -->
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<!-- for table -->
<!-- For table Shorting -->
<script type="text/javascript">

    $(".row_position").sortable({
        delay: 150,
        stop: function() {
            var selectedData = new Array();
            $(".row_position>tr").each(function() {
                selectedData.push($(this).attr("id"));
            });
            updateOrder(selectedData);
        }
    });

	function updateOrder(aData) {
        $.ajax({
            url: '/arrange_slider_table/',
            type: 'put',
            data: {
				"_token": "{{ csrf_token() }}",
                allData: aData,
                _method: "PUT",
            },
            success: function() {
                alert("Your change successfully saved");
            }
        });
    }


</script>
@endsection