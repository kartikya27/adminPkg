@extends('AdminCrm::layouts.app')
@section('app_name','Program Details')
@section('style','.admin-menu.products i{color:#142437;}.admin-menu1.products{background-color:#eaeaea;border-left:5px solid #142437;color:#142437;}')
@section('content')
<div class="container">
    <div class="container p-0 mb-4">
	    <div class="row">
		    <div class="col-6">
			    <table class="table-borderless" style="width:100%;height:100%"><tr><td class="align-middle pl-0" style="width:100%;height:100%">
					<h1 class="heading1">Programs</h1>
				</td></tr></table>
			</div>
			<div class="col-6 text-end">
			    <button class="btn btn-primary" onclick="window.location.href='/admin/products/new'">Add program</button>
			</div>
		</div>
	</div>
	<div class="container info-cont">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        	<li class="nav-item" role="presentation"> <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" href="#all" role="tab" aria-controls="pills-home" aria-selected="true">All</a>
        	</li>
        	<li class="nav-item" role="presentation"> <a class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" href="#draft" role="tab" aria-controls="pills-contact" aria-selected="false">Draft</a>
        	</li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
        	<div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="pills-home-tab">
	            <table class="table">
                	<thead>
                		<tr>
                			<th scope="col" style="width:100px"></th>
                			<th scope="col">Program Code</th>
                			<th scope="col">Program</th>
                			<th scope="col">Category</th>
                			<th scope="col">URL</th>
                			<th scope="col">Status</th>
                			
                		</tr>
                	</thead>
                	<tbody>
                		@foreach($products as $product)
		        		<tr class="table-row" data-href="/admin/products/{{$product['id']}}">
                			<th scope="row">
							    <div class="img-block mr-0" style="background-image:url('/storage/home/programs/{{$product['program_code']}}/@php echo str_replace('.jpg','-270px.jpg',$product['program_pic1']) @endphp');"></div>
							</th>
                			<td class="align-middle">
							    <a href="/admin/products/{{$product['id']}}" style="color:black">{{$product['program_code']}}</a>
							</td>
                			<td class="align-middle">
							    <a href="/admin/products/{{$product['id']}}" style="color:black">{{$product['programName']}}</a>
							</td>
							<td class="align-middle">
							    {{$product['program_category']}}
							</td>
							<td class="align-middle">
							    {{$product['program_url']}}
							</td>
							<td class="align-middle">
								@if($product->program_status == "Active")
									<div class="block3">{{$product['program_status']}}</div>
								@else
									<div class="block4">{{$product['program_status']}}</div>
								@endif
							</td>
							<td class="align-middle">
							    @php echo date_format($product['created_at'], "d M") @endphp
							</td>
                		</tr>
		        		@endforeach
                	</tbody>
                </table>
				<div class="container pagination-cont">
				    {{$products->links()}}
				</div>
        	</div>
        	<div class="tab-pane fade" id="active" role="tabpanel" aria-labelledby="pills-profile-tab">
			    <table class="table">
                	<thead>
                		<tr>
						<th scope="col" style="width:100px"></th>
                			<th scope="col">Program Code</th>
                			<th scope="col">Program</th>
                			<th scope="col">Category</th>
                			<th scope="col">URL</th>
                			<th scope="col">Status</th>
                		</tr>
                	</thead>
                	<tbody>
                		@foreach($activeProducts as $product)
		        		    @if($product->program_status == "Draft")
						        <tr class="table-row" data-href="/admin/products/{{$product['id']}}">
                		        	<th scope="row">
						        	    <div class="img-block mr-0" style="background-image:url('/storage/home/programs/@php echo str_replace(' ','-',strtoupper($product['program_code'])) @endphp/@php echo str_replace('.jpg','-270px.jpg',$product['program_pic1']) @endphp');"></div>
						        	</th>
                		        	<td>
						        	    <table class="table-borderless" style="width:100%;height:100%"><tr><td class="align-middle pl-0" style="width:100%;height:100%">
						        		    <a href="/admin/products/{{$product['id']}}" style="color:black">{{$product['programName']}}</a>
						        		</td></tr></table>
						        	</td>
						        	<td>
						        	    <table class="table-borderless" style="width:100%;height:100%"><tr><td class="align-middle pl-0" style="width:100%;height:100%">
						        		    @if($product->program_status == "Active")
						        				<div class="block3">{{$product['program_status']}}</div>
						        			@else
						        				<div class="block4">{{$product['program_status']}}</div>
						        			@endif
						        		</td></tr></table>
						        	</td>
                		        	<td>
						        	    <table class="table-borderless" style="width:100%;height:100%"><tr><td class="align-middle pl-0" style="width:100%;height:100%">
						        		    {{$product['program_category']}}
						        		</td></tr></table>
						        	</td>
							        
                		        </tr>
						    @endif
		        		@endforeach
                	</tbody>
                </table>
				<div class="container pagination-cont">
				    {{$activeProducts->links()}}
				</div>
        	</div>
        
	</div>
</div>
@endsection
@section('scriptContent')
<script>
	var productsCollapse = document.getElementById('productsCollapse');
	var bsCollapse = new bootstrap.Collapse(productsCollapse, {
		toggle: false,
		show: true, //useless
		hide: false //useless
	})
	bsCollapse.show();
	
	$(document).ready(function($) {
        $(".table-row").click(function() {
            window.document.location = $(this).data("href");
        });
    });
</script>
@endsection