@extends('AdminCrm::layouts.app')
@section('title','Create Program | Shankaraayan')
@section('style','.admin-menu.products i{color:black;}.admin-menu1.program{background-color:#eaeaea;border-left:5px solid black;color:black;}')
@section('content')
<div class="container">
    <div class="container mb-5">
	    <div class="row">
		    <div class="col-md-1">
			    <button class="btn btn-secondary" onclick="window.location.href='/admin/categories'"><i class="fas fa-long-arrow-alt-left"></i></button>
			</div>
		    <div class="col-md-9 p-0">
			    <table style="width:100%;height:100%"><tr><td class="align-middle" style="width:100%;height:100%">
				    <div class="heading2">Create Program</div>
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
        <form class="needs-validation" action="/admin/categories/new" method="POST" enctype="multipart/form-data" novalidate>
		@csrf
		<div class="row">
		    <div class="col-md-8">
			    <div class="container info-cont">
				    <div class="form-row">
					    <div class="col-12 mb-3">
						    <label for="validationCustom01">Title</label>
							<input type="text" class="form-control @error('category') is-invalid @enderror" id="validationCustom01" name="category" placeholder="e.g. Tea" value="{{old('category')}}" required>
							@error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						</div>
						<div class="col-12 mb-3">
                            <label for="validationCustom02">Description (optional)</label>
                            <textarea rows="10" class="form-control" id="validationCustom02" name="description">{{old('description')}}</textarea>
                        </div>
					</div>
				</div>
				<div class="container info-cont">
				    <h3 class="info-cont-heading">Category type</h3>
					<div class="custom-control custom-radio" name="collectionType">
					    <input type="radio" id="customRadio1" name="collectionTypeRadio" class="custom-control-input" checked>
						<label class="custom-control-label" for="customRadio1">Automated</label>
						<p class="pt-1 mb-0">Existing and future products that match the conditions you set will automatically be added to this collection.</p>
					</div>
					<div class="info-cont-divider"></div>
					<h3 class="info-cont-subheading">Conditions</h3>
					<div class="custom-control custom-radio" name="collectionCondition">
					    <input type="radio" id="customRadio2" name="collectionConditionRadio" class="custom-control-input" checked>
						<label class="custom-control-label" for="customRadio2">Product category is equal to category name</label>
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