@extends('AdminCrm::layouts.app')
@section('app_name','Program | Dashboard - Shankaraayan')
@section('style','.admin-menu.products i{color:black;}.admin-menu1.products{background-color:#eaeaea;border-left:5px
solid black;color:black;}')
@section('content')
<div class="container">

    <div class="container mb-5">
        <div class="row">
            <div class="col-md-1">
                <button class="btn btn-secondary" onclick="window.location.href='/admin/products'"><i
                        class="fas fa-long-arrow-alt-left"></i></button>
            </div>
            <div class="col-md-9 p-0">
                <table style="width:100%;height:100%">
                    <tr>
                        <td class="align-middle" style="width:100%;height:100%">
                            <div class="heading2" style="display:inline-block;margin-right:10px;">
                                {{$product->programName}}</div>
                            @if($product->program_status == "Active")
                            <div class="block3">{{$product->program_status}}</div>
                            @else
                            <div class="block4">{{$product->program_status}}</div>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-md-2 text-right">
                <p class="mb-0"><a class="btn btn-link"
                        href="/what-we-do/@php echo strtolower(str_replace(' ','-',$product->program_category)) @endphp/{{$product->program_url}}"
                        target="_blank">View</a></p>
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
        <form class="needs-validation" action="/admin/products/{{$product->id}}/edit" method="POST"
            enctype="multipart/form-data" novalidate>
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="container info-cont">
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <label for="validationCustom01">Program Code</label>
                                <input type="text" class="form-control" id="validationCustom01" name="program_code"
                                    placeholder="SSNGO01" value="{{$product->program_code}}" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="validationCustom01">Scheme Name</label>
                                <input type="text" class="form-control" id="validationCustom01" name="programName"
                                    placeholder="Swatantra Shiksha Scheme" value="{{$product->programName}}" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="validationCustom01">Heading</label>
                                <input type="text" class="form-control" id="validationCustom01" name="heading"
                                    placeholder="We are trusted NGO" value="{{$product->heading}}" required>
                            </div>
                            <div class="col-12">
                                <label for="validationCustom02">Description</label>
                                <textarea rows="4" class="form-control" id="validationCustom02"
                                    name="programDescription" required>{{$product->programDescription}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="container info-cont">
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <label for="validationCustom01">Sub Heading</label>
                                <input type="text" class="form-control" id="validationCustom01" name="subHeading"
                                    placeholder="We are trusted NGO" value="{{$product->heading}}" required>
                            </div>
                            <div class="col-12">
                                <label for="validationCustom02">Description</label>
                                <textarea rows="4" class="form-control" id="validationCustom02" name="description"
                                    required>{{$product->description}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="container info-cont">
                        <h3 class="info-cont-heading">Media</h3>
                        <div class="row">
                            <div class="col-6">
                                @if($product->program_pic1 != "null")
                                <img class="media-img"
                                    src="/storage/home/programs/@php echo str_replace(' ','-',strtoupper($product->program_code)) @endphp/{{$product->program_pic1}}"
                                    data-bs-toggle="modal" data-bs-target="#deleteImage"
                                    data-whatever="{{$product->program_pic1}}" />
                                @else
                                <img class="media-max" src="{{asset('Images/backgrounds/add-media.png') }}"
                                   data-bs-toggle="modal" data-bs-target="#addImage" />
                                        
                                @endif
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    @php $counter = 1 @endphp
                                    @for ($i = 2; $i <= 4; $i++) @php $picNum='program_pic' .$i; @endphp @if($product->
                                        $picNum != "null")
                                        <div class="col-6 pl-2 mb-3">
                                            <img class="media-img"
                                                src="/storage/home/programs/@php echo str_replace(' ','-',strtoupper($product->program_code)) @endphp/{{$product[$picNum]}}"
                                                data-bs-toggle="modal" data-bs-target="#deleteImage"
                                                data-whatever="{{$product->$picNum}}" />
                                        </div>
                                        @php $counter++ @endphp
                                        @else
                                        <div class="col-6 pl-2">
                                            <img class="media-max" src="{{asset('Images/backgrounds/add-media.png') }}"
                                                data-bs-toggle="modal" data-bs-target="#addImage" />
                                        </div>
                                        @endif
                                        @endfor
                                        @if($counter == 4)
                                        <div class="col-6 pl-2">
                                            <img class="media-max"
                                                src="{{asset('Images/backgrounds/max-limit-reached.png')}}" />
                                        </div>
                                        @else
                                        <div class="col-6 pl-2">
                                            <img class="media-max" src="{{asset('Images/backgrounds/add-media.png') }}"
                                                data-bs-toggle="modal" data-bs-target="#addImage" />
                                        </div>
                                        @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="container info-cont">
                        <h3 class="info-cont-heading">Program Status</h3>
                        <select class="custom-select" id="validationCustom24" name="program_status">
                            <option value="Active" @if($product->program_status == "Active") selected @endif>Active
                            </option>
                            <option value="Draft" @if($product->program_status == "Draft") selected @endif>Draft
                            </option>
                        </select>
                    </div>
                    <div class="container info-cont">
                        <h3 class="info-cont-heading">Organization</h3>
                        <label for="validationCustom25">Program Category</label>
                        <select class="custom-select mb-3" id="validationCustom25" name="programCategory" required>
                            @foreach($categories as $category)
                            <option value="{{$category['category']}}" @if($product->program_category ==
                                $category['slug']) selected @endif>{{$category['category']}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="container info-cont">
                        <h3 class="info-cont-heading">Information</h3>
                        <div class="mb-3">
                            <label for="validationCustom27">Parent Heading</label>
                            <textarea class="form-control" id="validationCustom27"
                                name="parent_heading">{{$product->parent_heading}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="validationCustom28">Additional Info</label>
                            <textarea class="form-control" id="validationCustom28"
                                name="program_additional">{{$product->program_additional}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="validationCustom29">Video Link</label>
                            <textarea class="form-control" id="validationCustom29"
                                name="video_link">{{$product->video_link}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="validationCustom29">Tag</label>
                            <textarea class="form-control" id="validationCustom29"
                                name="tag">{{$product->filter}}</textarea>
                        </div>
                    </div>

                </div>
            </div>
            <div class="container proButtons">
                <div class="row">
                    <div class="col-6 p-0">
                        <a onclick="deleteProduct()" class="btn btn-danger">Delete product</a>
                    </div>
                    <div class="col-6 text-right p-0">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="deleteImage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">New message</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span
                        aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img id="modalImage" style="width:66%;height:auto;margin-left:17%;" src="" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="deleteMedia();">Delete</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addImage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">New media</h6>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"> <span
                        aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" action="image/{{$product->id}}" method="POST"
                    enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="form-row">
                        <div class="col-12 mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input picInput1" id="validationCustom01"
                                    accept="image/*" name="mediaImage[]" required>
                                <label class="custom-file-label picLabel1" for="validationCustom01">Choose an
                                    image</label>
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
var menuCollapse = document.getElementById('productsCollapse');
var bsCollapse = new bootstrap.Collapse(menuCollapse, {
    toggle: false,
    show: true, //useless
    hide: false //useless
})
bsCollapse.show();

var productModel = "{{$product->program_code}}";
var productId = "{{$product->id}}";
var picName = "";

$('#deleteImage').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var recipient = button.data('whatever');
    picName = recipient;
    var modal = $(this);
    modal.find('.modal-title').text(recipient);
    document.getElementById("modalImage").src =
        "/storage/home/programs/@php echo str_replace(' ','-',strtoupper($product->program_code)) @endphp/" +
        recipient;
});

function deleteMedia() {
    $.ajax({
        url: '/admin/image',
        method: "DELETE",
        data: {
            _token: '{{ csrf_token() }}',
            sku: productModel,
            imgName: picName
        },
        success: function(response) {
            window.location.reload();
        }
    });
}

function deleteProduct() {
    $.ajax({
        url: '/admin/products/delete',
        method: "DELETE",
        data: {
            _token: '{{ csrf_token() }}',
            sku: productModel,
            id: productId,
        },
        success: function(response) {
            window.location.href = "/admin/products";
        }
    });
}

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