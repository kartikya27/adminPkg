@extends('AdminCrm::layouts.app')
@section('app_name','Program | Dashboard - Shankaraayan')
@section('style','.admin-menu.products i{color:black;}.admin-menu1.products{background-color:#eaeaea;border-left:5px solid black;color:black;}#VariantForm{display:none;}')
@section('content')
<div class="container">
    <div class="container mb-5">
	    <div class="row">
		    <div class="col-md-1">
			    <button class="btn btn-secondary" onclick="window.location.href='/admin/products'"><i class="fas fa-long-arrow-alt-left"></i></button>
			</div>
		    <div class="col-md-9 p-0">
			    <table style="width:100%;height:100%"><tr><td class="align-middle" style="width:100%;height:100%">
				    <div class="heading2">New program</div>
				</td></tr></table>
			</div>
		</div>
	</div>
	@if (session('status'))
	<div class="container">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			</button>
        </div>
    </div>
	@endif
	<div class="container">
        <form class="needs-validation" action="/admin/products/new" method="POST" enctype="multipart/form-data" novalidate>
		@csrf
		<div class="row">
		    <div class="col-md-8">
			    <div class="container info-cont">
				    <div class="form-row">
					    <div class="col-12 mb-3">
						    <label for="validationCustom01">Program Code</label>
							<input type="text" class="form-control" id="validationCustom01" name="program_code" placeholder="SSNGO01" value="{{old('program_code')}}" required>
						</div>
					    <div class="col-12 mb-3">
						    <label for="validationCustom01">Scheme Name</label>
							<input type="text" class="form-control" id="validationCustom01" name="programName" placeholder="Swatantra Shiksha Scheme" value="{{old('programName')}}" required>
						</div>
					    <div class="col-12 mb-3">
						    <label for="validationCustom01">Heading</label>
							<input type="text" class="form-control" id="validationCustom01" name="heading" placeholder="We are trusted NGO" value="{{old('heading')}}" required>
						</div>
						<div class="col-12">
                            <label for="validationCustom02">Description</label>
                            <textarea rows="4" class="form-control" id="validationCustom02" name="programDescription" required>{{old('programDescription')}}</textarea>
                        </div>
					</div>
				</div>
			    <div class="container info-cont">
				    <div class="form-row">
					    <div class="col-12 mb-3">
						    <label for="validationCustom01">Sub Heading</label>
							<input type="text" class="form-control" id="validationCustom01" name="subHeading" placeholder="We are trusted NGO" value="{{old('subHeading')}}" required>
						</div>
						<div class="col-12">
                            <label for="validationCustom02">Description</label>
                            <textarea rows="4" class="form-control" id="validationCustom02" name="description" required>{{old('description')}}</textarea>
                        </div>
					</div>
				</div>
				<div class="container info-cont">
				    <h3 class="info-cont-heading">Media (Multiple Optional - max 3)</h3>
					<div class="row">
					    <div class="col-12 text-center">
						    <div class="custom-file pt-5" style="border:2px solid #dddddd;border-style:dashed;padding-bottom:150px;">
                                <p class="text-center"><i style="font-size:40px;" class="fas fa-arrow-circle-up"></i></p>
								<input type="file" class="inputMedia inputfile" id="validationCustom03" accept=".jpg, .png, .jpeg" name="mediaImage[]" multiple>
                                <label class="inputMediaLabel" for="validationCustom03">Add image</label>
		            	    </div>
						</div>
					</div>
				</div>
				
				
			</div>
			<div class="col-md-4">
			    <div class="container info-cont">
				    <h3 class="info-cont-heading">Status</h3>
					<select class="custom-select" id="validationCustom24" name="program_status">
					    <option value="Active" @if(old('program_status') == "Active") selected @endif>Active</option>
					    <option value="Draft" @if(old('program_status') == "Draft" || old('program_status') == "") selected @endif>Draft</option>
					</select>
				</div>
				<div class="container info-cont">
				    <h3 class="info-cont-heading">Organization</h3>
					<label for="validationCustom25">Program Category</label>
                    <select class="custom-select mb-3" id="validationCustom25" name="programCategory" required>
					    <option value="" selected disabled>e.g. Education</option>
                    	@foreach($categories as $category)
			        	<option value="{{$category['category']}}" @if(old('productCategory') == $category['category']) selected @endif>{{$category['category']}}</option>
			        	@endforeach
                    </select>
                    
				</div>
				<div class="container info-cont">
				    <h3 class="info-cont-heading">Information</h3>
					<div class="mb-3">
					    <label for="validationCustom27">Parent Heading</label>
						<textarea class="form-control" id="validationCustom27" name="parent_heading">{{old('parent_heading')}}</textarea>
					</div>
					<div class="mb-3">
					    <label for="validationCustom28">Additional Info</label>
						<textarea class="form-control" id="validationCustom28" name="program_additional">{{old('program_additional')}}</textarea>
					</div>
					<div class="mb-3">
					    <label for="validationCustom29">Video Link</label>
						<textarea class="form-control" id="validationCustom29" name="video_link">{{old('video_link')}}</textarea>
					</div>
					<div class="mb-3">
					    <label for="validationCustom29">Tag</label>
						<textarea class="form-control" id="validationCustom29" name="tag">{{old('tag')}}</textarea>
					</div>
				</div>
				
			</div>
		</div>
		<div class="container proButtons">
		    <div class="row">
			    <div class="col-12 text-right p-0">
			        <button class="btn btn-primary" type="submit">Save</button>
			    </div>
			</div>
		</div>
		</form>
	</div>
</div>
@endsection
@section('scriptContent')
<script>
	$('#productsCollapse').collapse('show');
	
	$('.inputMedia').change(function(e){
        if(e.target.files.length > 1){
			var fileName = e.target.files.length;
			fileName += " files selected";
		}else{
			var fileName = e.target.files[0].name;
		}
        $('.inputMediaLabel').html(fileName);
    });
	
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
</script>
@endsection