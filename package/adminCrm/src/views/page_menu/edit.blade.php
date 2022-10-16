@extends('AdminCrm::layouts.app')
@section('title','Edit Program | Shankaraayan')
@section('style','.admin-menu.products i{color:black;}.admin-menu1.program{background-color:#eaeaea;border-left:5px
solid black;color:black;}')
@section('content')
<div class="container">
    <div class="container mb-5">
        <div class="row">
            <div class="col-md-1">
                <button class="btn btn-secondary" onclick="window.location.href='/admin/page_menu'"><i
                        class="fas fa-long-arrow-alt-left"></i></button>
            </div>
            <div class="col-md-9 p-0">
                <table style="width:100%;height:100%">
                    <tr>
                        <td class="align-middle" style="width:100%;height:100%">
                            <div class="heading2">{{$menu->main_menu}}</div>
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
        <form class="needs-validation" action="/admin/page_menu/{{$menu->id}}/edit" method="POST"
            enctype="multipart/form-data" novalidate>
            @csrf
            <div class="row">
                <div class="col-md-8">

                    <div class="container info-cont">
                        <h3 class="info-cont-heading">Header Menu</h3>
                        <label for="validationCustom25">Menu Name</label>
                        <input type="text" class="form-control @error('category') is-invalid @enderror" id="validationCustom01" name="menuName"  value="{{$menu->menuName}}" >
							@error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                    </div>

                    <div class="container info-cont">
                        <h3 class="info-cont-heading">Assign desing to page</h3>
                        <label for="validationCustom25">Program</label>
                        <select class="custom-select mb-3" id="validationCustom25" name="design" required>
                            <option value="" selected disabled>e.g. Design 1</option>
                            <option value="1">2 Column Design</option>
                           
                        </select>

                    </div>

                </div>
                <div class="col-md-4">
                    <div class="container info-cont">
                        <h3 class="info-cont-heading">Parent Menu</h3>
                        
                        <select class="custom-select mb-3" id="validationCustom25" name="parent_id" required>
                            <option value="" selected disabled>e.g. Parent Menu</option>
                            @foreach($list as $menu)
                            <option value="{{$menu['id']}}" >{{$menu['menuName']}}</option>
                           @endforeach
                        </select>

                    </div>
                </div>

            </div>
            <div class="container proButtons">
                <div class="row">
                    <div class="col-6 p-0">
                        <a href="/admin/page_menu/{{$menu->id}}/delete" class="btn btn-danger">Delete Menu</a>
                    </div>
                    <div class="col-6 text-right p-0">
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

$('.picInput1').change(function(e) {
    var fileName = e.target.files[0].name;
    $('.picLabel1').html(fileName);
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