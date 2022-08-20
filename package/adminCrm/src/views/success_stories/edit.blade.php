@extends('AdminCrm::layouts.app')
@section('app_name','Home Banner | Dashboard - Shankaraayan')
@section('style','.admin-menu.products i{color:#142437;}.admin-menu1.red{background-color:#eaeaea;border-left:5px solid #142437;color:#142437;}')
@section('content')
<div class="container">
    <div class="container mb-5">
	    <div class="row">
		    <div class="col-md-1">
			    <button class="btn btn-secondary" onclick="window.location.href='/admin/success-stories'"><i class="fas fa-long-arrow-alt-left"></i></button>
			</div>
		    <div class="col-md-9 p-0">
			    <table style="width:100%;height:100%"><tr><td class="align-middle" style="width:100%;height:100%">
				    <div class="heading2">Edit</div>
				</td></tr></table>
			</div>
		</div>
	</div>
	@if (session('status'))
	<div class="container">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
	@endif
	<div class="container">
        <form class="needs-validation" action="/admin/success-stories/{{$successStoriesContent->id}}/edit" method="POST" enctype="multipart/form-data" novalidate>
		@csrf
		<div class="row">
		    <div class="col-md-8">
				<div class="container info-cont">
				    <div class="form-row">
						<div class="col-12 mb-3">
                            <label for="validationCustom02">Heading (Leave Blank in Not Applicable)</label>
                            <input  class="form-control" id="validationCustom02" name="heading" placeholder="e.g. Free Shipping"  value="{{old('content', $successStoriesContent['heading'])}}">
                        </div>
					</div>
				</div>
			    <div class="container info-cont">
				    <div class="form-row">
						<div class="col-12 mb-3">
                            <label for="validationCustom02">Text</label>
                            <textarea rows="5" class="form-control" id="validationCustom02" name="content">{{old('description', $successStoriesContent['content'])}}</textarea>
                        </div>
					</div>
				</div>
				
			</div>
			<div class="col-md-4">
				<div class="container info-cont">
					<label for="validationCustom02">Select Page</label>
                        <select class="form-select" id="validationCustom24" name="page">
                            <option value="home_page" @if($successStoriesContent->page == "home_page") selected @endif>Home Page
                            </option>
                            <option value="health_page" @if($successStoriesContent->page == "health_page") selected @endif>Health Shots Page
                            </option>
                        </select>
                </div>
				<div class="container info-cont">
					<label for="validationCustom02">Select Section</label>
                        <select class="form-select" id="validationCustom24" name="section">
                            <option value="Main_page" @if($successStoriesContent->section == "Main_page") selected @endif>Main_page
                            </option>
                            <option value="Footer" @if($successStoriesContent->section == "Footer") selected @endif>Footer
                            </option>
                            <option value="Donation" @if($successStoriesContent->section == "Donation") selected @endif>Donation
                            </option>
                        </select>
                </div>
			</div>
			
		</div>
		<div class="container proButtons">
		    <div class="row">
			    <div class="col-6 p-0">
			        <a href="/admin/success-stories/{{$successStoriesContent->id}}/delete" class="btn btn-danger">Delete</a>
			    </div>
			    <div class="col-6 text-end p-0">
			        <button class="btn btn-primary" type="submit">Save</button>
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