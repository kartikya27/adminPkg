@extends('AdminCrm::layouts.app')
@section('app_name','Home Banner | Dashboard - Shankaraayan')
@section('style','.admin-menu.products i{color:#142437;}.admin-menu1.slider{background-color:#eaeaea;border-left:5px solid #142437;color:#142437;}')
@section('content')
<div class="container">
    <div class="container mb-5">
	    <div class="row">
		    <div class="col-md-1">
			    <button class="btn btn-secondary" onclick="window.location.href='/admin/home_banner'"><i class="fas fa-long-arrow-alt-left"></i></button>
			</div>
		    <div class="col-md-9 p-0">
			    <table style="width:100%;height:100%"><tr><td class="align-middle" style="width:100%;height:100%">
				    <div class="heading2">Add Slider</div>
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
        <form class="needs-validation" action="/admin/home_banner/new" method="POST" enctype="multipart/form-data" novalidate>
		@csrf
		<div class="row">
		    <div class="col-md-8">
			    <div class="container info-cont">
				    <div class="form-row">
					    <div class="col-12 mb-3">
						    <label for="validationCustom01">Heading</label>
							<input type="text" class="form-control @error('category') is-invalid @enderror" id="validationCustom01" name="slider_heading" placeholder="e.g. Wellness" value="{{old('category')}}" >
							@error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						</div>
						<div class="col-12 mb-3">
                            <label for="validationCustom02">Text</label>
                            <textarea rows="12" class="form-control" id="validationCustom02" name="slider_subHeading">{{old('description')}}</textarea>
                        </div>
					</div>
				</div>
				<div class="container info-cont">
				    <h3 class="info-cont-heading">Button</h3>
					<div class="form-row row">
					    <div class="col-12 mb-3">
						    <label for="validationCustom03">Text</label>
							<input type="text" class="form-control" id="validationCustom03" placeholder="e.g. Know More" name="btn_title" value="{{old('title')}}" >
						</div>
					    <div class="col-12 mb-3">
						    <label for="validationCustom03">Link</label>
							<input type="text" class="form-control" id="validationCustom03" name="btn_url" value="{{old('title')}}" >
						</div>
					</div>
				</div>
				
			</div>
			<div class="col-md-4">
				<div class="container info-cont">
				    <h3 class="info-cont-heading">Slider Status</h3>
					
                        <select class="form-select" id="validationCustom24" name="btnStatus">
                            <option value="Active" >Active
                            </option>
                            <option value="Draft">Draft
                            </option>
                        </select>
                   
				</div>
				<div class="container info-cont">
				    <h3 class="info-cont-heading">Slider Desktop Image</h3>
					<div class="row">
					    <div class="col-12 text-center">
					        <div class="custom-file" style="border:2px solid #dddddd;border-style:dashed;padding-top:70px;padding-bottom:90px;">
                                <p class="text-center"><i style="font-size:40px;" class="fas fa-arrow-circle-up"></i></p>
					        	<input type="file" class="inputMedia inputfile" id="validationCustom04" accept=".jpg" name="desktopImg[]">
                                <label class="inputMediaLabel" for="validationCustom04">Add image</label>
		                    </div>
		                </div>
		            </div>
					<label for="validationCustom03">• Recommended Size</label>
				</div>
				<div class="container info-cont">
				    <h3 class="info-cont-heading">Slider Mobile Image</h3>
					<div class="row">
					    <div class="col-12 text-center">
					        <div class="custom-file" style="border:2px solid #dddddd;border-style:dashed;padding-top:70px;padding-bottom:90px;">
                                <p class="text-center"><i style="font-size:40px;" class="fas fa-arrow-circle-up"></i></p>
					        	<input type="file" class="inputMedia1 inputfile" id="validationCustom05" accept=".jpg" name="mobileImg[]">
                                <label class="inputMediaLabel1" for="validationCustom05">Add image</label>
		                    </div>
		                </div>
		            </div>
					<label for="validationCustom03">• Recommended Size</label>
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
	
	$('.inputMedia').change(function(e){
        if(e.target.files.length > 1){
			var fileName = e.target.files.length;
			fileName += " files selected";
		}else{
			var fileName = e.target.files[0].name;
		}
        $('.inputMediaLabel').html(fileName);
    });
	
	$('.inputMedia1').change(function(e){
        if(e.target.files.length > 1){
			var fileName = e.target.files.length;
			fileName += " files selected";
		}else{
			var fileName = e.target.files[0].name;
		}
        $('.inputMediaLabel1').html(fileName);
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