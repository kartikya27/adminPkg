@extends('AdminCrm::layouts.app')
@section('app_name','Events And Activity | Dashboard - Shankaraayan')
@section('style','.admin-menu.products i{color:#142437;}.admin-menu1.events{background-color:#eaeaea;border-left:5px solid #142437;color:#142437;}')
@section('content')
<div class="container">
    <div class="container mb-5">
	    <div class="row">
		    <div class="col-md-1">
			    <button class="btn btn-secondary" onclick="window.location.href='/admin/events'"><i class="fas fa-long-arrow-alt-left"></i></button>
			</div>
		    <div class="col-md-9 p-0">
			    <table style="width:100%;height:100%"><tr><td class="align-middle" style="width:100%;height:100%">
				    <div class="heading2">Add</div>
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
        <form class="needs-validation" action="/admin/events/new" method="POST" enctype="multipart/form-data" novalidate>
		@csrf
		<div class="row">
		    <div class="col-md-8">
			    <div class="container info-cont">
				    <div class="form-row">
					    <div class="col-12 mb-3">
						    <label for="validationCustom01">Event Name</label>
							<input type="text" class="form-control @error('category') is-invalid @enderror" id="validationCustom01" name="eventName" placeholder="e.g. We are the best NGO" value="{{old('category')}}" >
							@error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						</div>
						<div class="col-12 mb-3">
                            <label for="validationCustom02">Short Content</label>
                            <textarea rows="3" class="form-control" id="validationCustom02" name="shortContent">{{old('description')}}</textarea>
                        </div>
					</div>
				</div>
				<div class="container info-cont">
				    <h3 class="info-cont-heading">Information</h3>
					<div class="form-row row">
					    <div class="col-12 mb-3">
						    <label for="validationCustom03">Date</label>
							<input type="date" class="form-control" id="validationCustom03" placeholder="e.g. Date" name="date" value="{{old('title')}}" >
						</div>
					    <div class="col-12 mb-3">
						    <label for="validationCustom03">Venue</label>
							<input type="text" class="form-control" id="validationCustom03" name="venue" value="{{old('title')}}" >
						</div>
					</div>

					<div class="col-12 mb-3">
                            <label for="validationCustom02">Description</label>
                            <textarea rows="5" class="form-control" id="validationCustom02" name="content">{{old('description')}}</textarea>
                        </div>
				</div>
				
				<div class="container info-cont">
				    <h3 class="info-cont-heading">Fund Goals</h3>
					<div class="form-row row">
						<div class="col-6 mb-3">
							<label for="validationCustom03">Tatal Goal</label>
							<input type="text" class="form-control" id="validationCustom03" name="goal_amt" value="{{old('goal_amt')}}" >
						</div>
						<div class="col-6 mb-3">
							<label for="validationCustom03">Funded Amount</label>
							<input type="text" class="form-control" id="validationCustom03" name="funded_amt" value="{{old('funded_amt')}}" >
						</div>
					</div>
                   
				</div>
				
			</div>
			<div class="col-md-4">
				<div class="container info-cont">
				    <h3 class="info-cont-heading">Type</h3>
					
                        <select class="form-select" id="validationCustom24" name="type">
                            <option value="Event" >Event
                            </option>
                            <option value="Activity">Activity
                            </option>
                        </select>
                   
				</div>
				
				<div class="container info-cont">
				    <h3 class="info-cont-heading">Icon Image</h3>
					<div class="row">
					    <div class="col-12 text-center">
					        <div class="custom-file" style="border:2px solid #dddddd;border-style:dashed;padding-top:70px;padding-bottom:90px;">
                                <p class="text-center"><i style="font-size:40px;" class="fas fa-arrow-circle-up"></i></p>
					        	<input type="file" class="inputMedia inputfile" id="validationCustom04" accept=".jpg" name="desktopImg[]">
                                <label class="inputMediaLabel" for="validationCustom04">Add image</label>
		                    </div>
		                </div>
		            </div>
					<label for="validationCustom03">• Recommended Size - 350x315</label>
				</div>
				<div class="container info-cont">
				    <h3 class="info-cont-heading">Full Image</h3>
					<div class="row">
					    <div class="col-12 text-center">
					        <div class="custom-file" style="border:2px solid #dddddd;border-style:dashed;padding-top:70px;padding-bottom:90px;">
                                <p class="text-center"><i style="font-size:40px;" class="fas fa-arrow-circle-up"></i></p>
					        	<input type="file" class="inputMedia1 inputfile" id="validationCustom05" accept=".jpg" name="mobileImg[]">
                                <label class="inputMediaLabel1" for="validationCustom05">Add image</label>
		                    </div>
		                </div>
		            </div>
					<label for="validationCustom03">• Recommended Size - 1170x600</label>
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
	var menu1Collapse = document.getElementById('eventsCollapse');
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