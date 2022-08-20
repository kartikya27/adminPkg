@extends('AdminCrm::layouts.app')
@section('app_name','Contact | Dashboard - Shankaraayan')
@section('style','.admin-menu.products i{color:#142437;}.admin-menu1.Contact{background-color:#eaeaea;border-left:5px
solid #142437;color:#142437;}')
@section('content')
<div class="container">
    <div class="container mb-5">
        <div class="row">
            <div class="col-md-1">
                <button class="btn btn-secondary" onclick="window.location.href='/admin/Contact'"><i
                        class="fas fa-long-arrow-alt-left"></i></button>
            </div>
            <div class="col-md-9 p-0">
                <table style="width:100%;height:100%">
                    <tr>
                        <td class="align-middle" style="width:100%;height:100%">
                            <div class="heading2">Add</div>
                        </td>
                    </tr>
                </table>
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
        <form class="needs-validation" action="/admin/Contact/new" method="POST" novalidate>
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="container info-cont">
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <label for="validationCustom02">Phone Number 1</label>
                                <input class="form-control" id="validationCustom02" name="phone1"
                                    placeholder="e.g. 9876543210" value="{{old('content')}}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <label for="validationCustom02">Phone Number 2 (Optional)</label>
                                <input class="form-control" id="validationCustom02" name="phone2"
                                    placeholder="e.g. 9876543210" value="{{old('content')}}">
                            </div>
                        </div>
                    </div>
                    <div class="container info-cont">
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <label for="validationCustom02">Email 1</label>
                                <textarea rows="1" class="form-control" id="validationCustom02" name="email1"
                                    placeholder="e.g. xyz@gmail.com">{{old('content')}}</textarea>
                            </div>
                        </div>
                    
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <label for="validationCustom02">Email 2 (Optional)</label>
                                <textarea rows="1" class="form-control" id="validationCustom02" name="email2"
                                    placeholder="e.g. abc@gmail.com">{{old('content')}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="container info-cont">
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <label for="validationCustom02">Location Link</label>
                                <textarea rows="5" class="form-control" id="validationCustom02" name="map"
                                    placeholder="e.g. Map Link">{{old('content')}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="container info-cont">
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <label for="validationCustom02">Location Address</label>
                                <textarea rows="5" class="form-control" id="validationCustom02" name="address"
                                    placeholder="e.g. Address">{{old('content')}}</textarea>
                            </div>
                        </div>
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