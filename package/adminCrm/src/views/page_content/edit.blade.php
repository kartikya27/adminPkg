@extends('AdminCrm::layouts.app')
@section('app_name','Program | Dashboard - Shankaraayan')
@section('style','.admin-menu.products i{color:black;}.admin-menu1.products{background-color:#eaeaea;border-left:5px
solid black;color:black;}')
@section('content')
<div class="container">

    <div class="container mb-5">
        <div class="row">
            <div class="col-md-1">
                <button class="btn btn-secondary" onclick="window.location.href='/admin/page_content'"><i
                        class="fas fa-long-arrow-alt-left"></i></button>
            </div>
            <div class="col-md-9 p-0">
                <table style="width:100%;height:100%">
                    <tr>
                        <td class="align-middle" style="width:100%;height:100%">
                            <div class="heading2" style="display:inline-block;margin-right:10px;">
                                {{$page->heading}}</div>
                            @if($page->status == "Active")
                            <div class="block3">{{$page->status}}</div>
                            @else
                            <div class="block4">{{$page->status}}</div>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-md-2 text-right">
                <p class="mb-0"><a class="btn btn-link"
                        href="/what-we-do/@php echo strtolower(str_replace(' ','-',$page->menu)) @endphp/{{$page->page_url}}"
                        target="_blank">View</a></p>
            </div>
        </div>
    </div>
    @if (session('status'))
    <div class="container">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    @endif
    <div class="container">
        <form class="needs-validation" action="/admin/page_content/{{$page->id}}/edit" method="POST"
            enctype="multipart/form-data" novalidate>
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="container info-cont">
                        <div class="form-row">
                            
                            <div class="col-12 mb-3">
                                <label for="validationCustom01">Heading</label>
                                <input type="text" class="form-control" id="validationCustom01" name="heading"
                                    placeholder="We are trusted NGO" value="{{$page->heading}}" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="validationCustom01">Sub Heading</label>
                                <input type="text" class="form-control" id="validationCustom01" name="subheading"
                                    placeholder="We are trusted NGO" value="{{$page->subheading}}" required>
                            </div>
                            <div class="col-12">
                                <label for="validationCustom02">Description</label>
                                <textarea rows="4" class="form-control" id="validationCustom02"
                                    name="description" required>{{$page->description}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="container info-cont">
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <label for="validationCustom01">Heading</label>
                                <input type="text" class="form-control" id="validationCustom01" name="heading1"
                                    placeholder="We are trusted NGO" value="{{$page->heading1}}" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="validationCustom01">Sub Heading</label>
                                <input type="text" class="form-control" id="validationCustom01" name="subheading1"
                                    placeholder="We are trusted NGO" value="{{$page->subheading1}}" required>
                            </div>
                            <div class="col-12">
                                <label for="validationCustom02">Description</label>
                                <textarea rows="4" class="form-control" id="validationCustom02" name="description1"
                                    required>{{$page->description1}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="container info-cont">
                        <h3 class="info-cont-heading">Media</h3>
                        <div class="row">
                            <div class="col-6">
                                @if($page->bannerImg != "null")
                                <img class="media-img"
                                    src="/storage/home/pages/@php echo $page->menu @endphp/{{$page->bannerImg}}"
                                    data-bs-toggle="modal" data-bs-target="#deleteImage"
                                    data-whatever="{{$page->bannerImg}}" />
                                @else
                                <img class="media-max" src="{{asset('Images/backgrounds/add-media.png') }}"
                                   data-bs-toggle="modal" data-bs-target="#addImage" />
                                        
                                @endif
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    @php $counter = 1 @endphp
                                    @for ($i = 1; $i <= 2; $i++) @php $picNum='img' .$i; @endphp @if($page->
                                        $picNum != "null")
                                        <div class="col-6 pl-2 mb-3">
                                            <img class="media-img"
                                                src="/storage/home/pages/@php echo $page->menu @endphp/{{$page[$picNum]}}"
                                                data-bs-toggle="modal" data-bs-target="#deleteImage"
                                                data-whatever="{{$page->$picNum}}" />
                                        </div>
                                        @php $counter++ @endphp
                                        @else
                                        <div class="col-6 pl-2">
                                            <img class="media-max" src="{{asset('Images/backgrounds/add-media.png') }}"
                                                data-bs-toggle="modal" data-bs-target="#addImage" />
                                        </div>
                                        @endif
                                        @endfor
                                        @if($counter == 3)
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
                        <h3 class="info-cont-heading">Page Status</h3>
                        <select class="custom-select" id="validationCustom24" name="program_status">
                            <option value="Active" @if($page->status == "Active") selected @endif>Active
                            </option>
                            <option value="Draft" @if($page->status == "Draft") selected @endif>Draft
                            </option>
                        </select>
                    </div>
                    
                    <div class="container info-cont">
                        <h3 class="info-cont-heading">Information</h3>
                        <div class="mb-3">
                            <label for="validationCustom27">Meta Heading</label>
                            <textarea class="form-control" id="validationCustom27"
                                name="meta_heading">{{$page->meta_heading}}</textarea>
                        </div>
                       
                    </div>

                </div>
            </div>
            <div class="container proButtons">
                <div class="row">
                    <div class="col-6 p-0">
                        <a onclick="deleteProduct()" class="btn btn-danger">Delete Page</a>
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
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"> <span
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
                <form class="needs-validation" action="image/{{$page->id}}" method="POST"
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


var productModel = "{{$page->id}}";
var productId = "{{$page->id}}";
var page = "{{$page->menu}}";
var picName = "";

$('#deleteImage').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var recipient = button.data('whatever');
    picName = recipient;
    var modal = $(this);
    modal.find('.modal-title').text(recipient);
    
    document.getElementById("modalImage").src =
        "/storage/home/pages/@php echo $page->menu @endphp/" +
        recipient;
});

function deleteMedia() {
    $.ajax({
        url: '/admin/web_image',
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
        url: '/admin/page_content/delete',
        method: "DELETE",
        data: {
            _token: '{{ csrf_token() }}',
            sku: productModel,
            id: productId,
        },
        success: function(response) {
            window.location.href = "/admin/page_content";
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