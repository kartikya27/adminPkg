@extends('AdminCrm::layouts.app')
@section('app_name','Program Details')
@section('style','.admin-menu.products i{color:#142437;}.admin-menu1.page_content{background-color:#eaeaea;border-left:5px solid #142437;color:#142437;}')
@section('content')
<div class="container">
    <div class="container p-0 mb-4">
	    <div class="row">
		    <div class="col-6">
			    <table class="table-borderless" style="width:100%;height:100%"><tr><td class="align-middle pl-0" style="width:100%;height:100%">
					<h1 class="heading1">Pages</h1>
				</td></tr></table>
			</div>
			<div class="col-6 text-end">
			    <button class="btn btn-primary" onclick="window.location.href='/admin/page_content/new'">Add page</button>
			</div>
		</div>
	</div>
	<div class="container info-cont">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        	<li class="nav-item" role="presentation"> <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" href="#all" role="tab" aria-controls="pills-home" aria-selected="true">All</a>
        	</li>
        	
        	</li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
        	<div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="pills-home-tab">
	            <table class="table">
                	<thead>
                		<tr>
                			<th scope="col" style="width:100px"></th>
                			<th scope="col">Heading</th>
                			<th scope="col">Subheading</th>
                			
                			<th scope="col">URL</th>
                			<th scope="col">Status</th>
                			<th scope="col">Created at</th>
                			
                		</tr>
                	</thead>
                	<tbody>
                		@foreach($pages as $page)
		        		<tr class="table-row" data-href="/admin/page_content/{{$page['id']}}">
                			<th scope="row">
							    <div class="img-block mr-0" style="background-image:url('/storage/home/pages/{{$page['menu']}}/@php echo $page['img1'] @endphp');"></div>
							</th>
                			<td class="align-middle">
							    <a href="/admin/page_content/{{$page['id']}}" style="color:black">{{$page['heading']}}</a>
							</td>
                			<td class="align-middle">
							    <a href="/admin/page_content/{{$page['id']}}" style="color:black">{{$page['subheading']}}</a>
							</td>
							
							<td class="align-middle">
							    {{$page['page_url']}}
							</td>
							<td class="align-middle">
								@if($page->status == "Active")
									<div class="block3">{{$page['status']}}</div>
								@else
									<div class="block4">{{$page['status']}}</div>
								@endif
							</td>
							<td class="align-middle">
							    @php echo date_format($page['created_at'], "d M") @endphp
							</td>
                		</tr>
		        		@endforeach
                	</tbody>
                </table>
				<div class="container pagination-cont">
				    {{$pages->links()}}
				</div>
        	</div>
        	
        
	</div>
</div>
@endsection
@section('scriptContent')
<script>

	
	$(document).ready(function($) {
        $(".table-row").click(function() {
            window.document.location = $(this).data("href");
        });
    });
</script>
@endsection