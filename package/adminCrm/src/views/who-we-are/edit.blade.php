@extends('AdminCrm::layouts.app')
@section('app_name','Home Banner | Dashboard - Shankaraayan')
@section('style','.admin-menu.products i{color:#142437;}.admin-menu1.blue{background-color:#eaeaea;border-left:5px solid
#142437;color:#142437;}')
@section('content')
<div class="container">
    <div class="container mb-5">
        <div class="row">
            <div class="col-md-1">
                <button class="btn btn-secondary" onclick="window.location.href='/admin/who-we-are'"><i
                        class="fas fa-long-arrow-alt-left"></i></button>
            </div>
            <div class="col-md-9 p-0">
                <table style="width:100%;height:100%">
                    <tr>
                        <td class="align-middle" style="width:100%;height:100%">
                            <div class="heading2">Edit</div>
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
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif
    <div class="container">
        <form class="needs-validation" action="/admin/who-we-are/{{$who_weContent->id}}/edit" method="POST"
            enctype="multipart/form-data" novalidate>
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="container info-cont">
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <label for="validationCustom03">Heading</label>
                                <input type="text" class="form-control" id="validationCustom03" name="heading"
                                    value="{{old('title',$who_weContent['heading'])}}">
                            </div>
                        </div>
                    </div>
                    <div class="container info-cont">
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <label for="validationCustom02">Text</label>
                                <textarea rows="5" class="form-control" id="validationCustom02"
                                    name="content">{{old('description', $who_weContent['content'])}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="container info-cont">
                        <h3 class="info-cont-heading">Button</h3>
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <label for="validationCustom03">Text</label>
                                <input type="text" class="form-control" id="validationCustom03" name="btnText"
                                    value="{{old('title', $who_weContent['btnText'])}}">
                            </div>
                            <div class="col-12 mb-3">
                                <label for="validationCustom03">Link</label>
                                <input type="text" class="form-control" id="validationCustom03" name="page_url"
                                    value="{{old('title', $who_weContent['btnURL'])}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="container info-cont">
                        <h3 class="info-cont-heading">Banner Desktop Image</h3>
                        <div class="row">
                            <div class="col-12 text-center">
                                @if($who_weContent['image'] == "" || $who_weContent['image'] == "null")
                                <img class="img-fluid" src="/backgrounds/add-media.png" data-bs-toggle="modal"
                                    data-bs-target="#updateCollectionImage"
                                    data-bs-whatever="{{$who_weContent['image']}}" style="cursor:pointer" />
                                @else
                                <img class="img-fluid" src="/storage/home/who_we_section/{{$who_weContent['image']}}"
                                    data-bs-toggle="modal" data-bs-target="#updateCollectionImage"
                                    data-bs-whatever="{{$who_weContent['image']}}" style="cursor:pointer" />
                                @endif
                            </div>
                        </div>
                        <label for="validationCustom03">• Recommended Size</label>
                    </div>
                </div>
            </div>
            <div class="container proButtons">
                <div class="row">
                    <div class="col-6 p-0">
                        <a href="/admin/who-we-are/{{$who_weContent->id}}/delete" class="btn btn-danger">Delete</a>
                    </div>
                    <div class="col-6 text-end p-0">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </div>
        </form>
    </div>
</div>
<div class="modal fade" id="updateCollectionImage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Update Desktop media</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" action="/admin/who-we-are/{{$who_weContent->id}}/image" method="POST"
                    enctype="multipart/form-data" novalidate>
                    @csrf
                    <input type="hidden" name="type" value="Desktop" />
                    <div class="form-row">
                        <div class="col-12 mb-3">
                            <div class="custom-file">
                                <input type="file" class="form-control" id="validationCustom01" accept="image/*"
                                    name="banner[]" >
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Save</button>
                </form>
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