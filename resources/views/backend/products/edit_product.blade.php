@extends('backend.master')
@can('Product Edit')

@section('product_active')
active
@endsection
@section('product_treeview_active')
display: block;
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Product</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Edit Product</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ url('product/edit/post') }}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" value="{{ $product->id }}" name="id">
                            @csrf

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="title">Title :</label>
                                            <input type="text" name="title" value="{{ $product->title }}" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Title">
                                            @error('title')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6 m-0 mb-2">
                                                    <label for="category_id">Category :</label>
                                                    <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                                        <option value="" >-- Select --</option>
                                                        @foreach ($cats as  $value)
                                                            <option @if ($product->category_id == $value->id) selected @endif value="{{ $value->id }}">{{ $value->category_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6 m-0 mb-2">
                                                    <label for="subcategory_id">Sub Category :</label>
                                                    <select name="subcategory_id" id="subcategory_id" class="form-control @error('subcategory_id') is-invalid @enderror">
                                                        <option value="">-- Select --</option>
                                                        @foreach ($scat as  $value)
                                                            <option @if ($product->subcategory_id == $value->id) selected @endif value="{{ $value->id }}">{{ $value->subcategory_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('subcategory_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            @foreach ($product->product_attribute as $i => $attribute)
                                                <div id="" class="form-group">
                                                    <input type="hidden" name="attribute_id[]" id="" value="{{ $attribute->id }}">
                                                    <div class="row">
                                                        <div class="col-sm-2">
                                                            <label for="color">Color </label>
                                                            <select name="color[]" id="color" class="form-control" value="">
                                                                <option value> -- Select -- </option>
                                                                @foreach ($colors as $value)
                                                                    <option value="{{ $value->id }}" @if ($value->id == $attribute->color_id) selected @endif> {{ $value->color_name }} </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <label for="size">Size</label>
                                                            <select name="size[]" id="size" class="form-control">
                                                                <option value> -- Select -- </option>
                                                                @foreach ($sizes as $value)
                                                                    <option value="{{ $value->id }}" @if ($value->id == $attribute->size_id) selected @endif> {{ $value->size_name }} </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <label for="Quantity">Quantity <span class="text-danger">*</span></label>
                                                            <input type="number" id="Quantity" class="form-control @error('quantity[]') is-invalid @enderror" name="quantity[]" placeholder="Quantity" value="{{ $attribute->quantity }}" required/>
                                                            @error('quantity[]')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label for="reqular_price">Regular Price <span class="text-danger">*</span></label>
                                                            <input type="number" id="reqular_price" class="form-control @error('reqular_price[]') is-invalid @enderror" name="reqular_price[]" placeholder="Reqular price" value="{{ $attribute->regular_price }}" required/>
                                                            @error('reqular_price[]')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="row">
                                                                <div class="col-8 p-0">
                                                                    <label for="sale_price">Sale Price</label>
                                                                    <input type="number" id="sale_price" class="form-control" name="sale_price[]" placeholder="Sale price" value="{{ $attribute->sale_price }}"/>
                                                                </div>
                                                                <div class="col-4 p-0 px-1 pr-2">
                                                                    <label for="" style="visibility: hidden;">t</label>
                                                                    <a href="{{ route('product_attr_delete',['product_id' => $product->id, 'attribute_id' => $attribute->id]) }}" class="form-control btn btn-sm btn-danger" style="vertical-align: middle; padding-top: 8px; padding-bottom: 8px;"><i class="fas fa-times"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div id="dynamic-field-1" class="form-group dynamic-field fieldfjhdf d-none">
                                                <input type="hidden" name="attribute_id[]" id="" value="">
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <label for="color">Color </label>
                                                        <select name="color[]" id="color" class="form-control" value="">
                                                            <option value> -- Select -- </option>
                                                            @foreach ($colors as $value)
                                                                <option value="{{ $value->id }}"> {{ $value->color_name }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <label for="size">Size</label>
                                                        <select name="size[]" id="size" class="form-control" value="">
                                                            <option value> -- Select -- </option>
                                                            @foreach ($sizes as $value)
                                                                <option value="{{ $value->id }}"> {{ $value->size_name }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <label for="Quantity">Quantity <span class="text-danger">*</span></label>
                                                        <input type="number" id="Quantity" class="form-control @error('quantity[]') is-invalid @enderror" name="quantity[]" placeholder="Quantity" value="" required/>
                                                        @error('quantity[]')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label for="reqular_price">Regular Price <span class="text-danger">*</span></label>
                                                        <input type="number" id="reqular_price" class="form-control @error('reqular_price[]') is-invalid @enderror" name="reqular_price[]" placeholder="Reqular price" required/>
                                                        @error('reqular_price[]')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="row">
                                                            <div class="@if (count($product->product_attribute) != 0) col-8 @else col-12 @endif p-0">
                                                                <label for="sale_price">Sale Price</label>
                                                                <input type="number" id="sale_price" class="form-control" name="sale_price[]" placeholder="Sale price" value=""/>
                                                            </div>
                                                            @if (count($product->product_attribute) != 0)
                                                                <div class="col-4 p-0 px-1 pr-2">
                                                                    <label for="" style="visibility: hidden;">t</label>
                                                                    {{-- <a id="remove-attribute"class="form-control btn btn-sm btn-danger" style="vertical-align: middle; padding-top: 8px; padding-bottom: 8px;"><i class="fas fa-times"></i></a> --}}
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix mt-4 dynamic-field-btn">
                                                <button type="button" id="add-button" class="btn btn-sm btn-secondary float-left text-uppercase shadow-sm"><i class="fas fa-plus fa-fw"></i> Add</button>
                                                <button type="button" id="remove-button" class="btn btn-sm btn-secondary float-left text-uppercase ml-1" disabled="disabled"><i class="fas fa-minus fa-fw"></i> Remove</button>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text-editor1">Summary :</label>
                                            <textarea name="summary" id="text-editor1" rows="8" class="form-control @error('summary') is-invalid @enderror"> {{ $product->summary }}</textarea>
                                            @error('summary')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="text-editor">Description :</label>
                                            <textarea name="description" id="text-editor" rows="8" class="form-control @error('description') is-invalid @enderror">{{ $product->description }}</textarea>
                                            @error('description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="thambnail">Thambnail :</label>
                                                    <input type="file" name="thumbnail" class="form-control" id="thambnail" placeholder="Thambnail" onchange="document.getElementById('thumbnail_id').src = window.URL.createObjectURL(this.files[0])">
                                                </div>
                                                <div class="col-6">
                                                    <img id="thumbnail_id" class="img-fluid" src="{{ asset("image/products/thumbnail").'/'.$product->thumbnail }}" alt="{{ $product->slug }}" style="border: 1px solid #ddd; border-radius: 4px; max-height: 110px;">
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    @foreach ($product->gallery_image as $gallery)
                                                        <input type="hidden" name="gallery[]" value="{{ $gallery->id }}">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label for="image">Gallery Image</label>
                                                                <input type="file" name="gallery_image[]" id="" class="form-control" onchange="document.getElementById('{{ 'image_'.$gallery->id }}').src = window.URL.createObjectURL(this.files[0])">
                                                            </div>
                                                            <div class="col-6 mt-3">
                                                                <img id="{{ 'image_'.$gallery->id }}" class="img-fluid" src="{{ asset("image/products/gallery").'/'.$gallery->image_name }}" alt="{{ $product->slug }}" style="border: 1px solid #ddd; border-radius: 4px; max-height: 110px;">
                                                                <a href="{{ route('product_gallery_delete',['product_id' => $product->id, 'image_id' => $gallery->id]) }}" class="btn btn-sm btn-danger" style="position: absolute;
                                                                margin-left: -27px;"><i class="fas fa-times"></i></a>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    <div id="dynamic-field-image" class="form-group dynamic-field-image imagejhsdfkjdh d-none">
                                                        <div class="row">
                                                            <input type="hidden" name="gallery[]" value="">
                                                            <div class="col-6">
                                                                <label for="image">Gallery Image</label>
                                                                <input type="file" name="gallery_image[]" id="dynamic-input" class="form-control" value="" onchange="document.getElementById('dynamic_field_image_id_0').src = window.URL.createObjectURL(this.files[0])">
                                                            </div>
                                                            <div class="col-6 mt-3">
                                                                <img id="dynamic_field_image_id_0" class="img-fluid" src="https://jjgf.com/images/defaultx2.jpg" alt="{{ $product->slug }}" style="border: 1px solid #ddd; border-radius: 4px; max-height: 110px;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix mt-0 text-right">
                                                        <button type="button" id="add-button-image" class="btn btn-sm btn-secondary float-left text-uppercase shadow-sm"><i class="fas fa-plus fa-fw"></i> Add</button>
                                                        <button type="button" id="remove-button-image" class="btn btn-sm btn-secondary float-left text-uppercase ml-1" disabled="disabled"><i class="fas fa-minus fa-fw"></i> Remove</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-info my-3"> Product Update </button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('footer_js')
<script>
    $('#category_id').change(function(){
        var category_id = $(this).val();
        if(category_id){
            $.ajax({
                type: "GET",
                url: "{{ url('api/get-subcats-list') }}/"+category_id,
                success:function(res){
                    if(res){
                        $("#subcategory_id").empty();
                        $("#subcategory_id").append('<option value="" selected>-- Select --</option>');
                        $.each(res,function(key,value){
                            $("#subcategory_id").append('<option value="'+value.id+'">'+value.subcategory_name+'</option>');
                        });

                    }else{
                        $("#subcategory_id").empty();
                    }
                }
            });
        }
        else{
            $("#subcategory_id").empty();
        }
    });

    $(document).ready(function() {

        var buttonAdd = $("#add-button-image");
        var buttonRemove = $("#remove-button-image");
        var className = ".dynamic-field-image";
        var count = 0;
        var field = "";
        var maxFields = 4-{{ count($product->gallery_image) }};

        function totalFields() {
            return $(className).length;
        }

        function addNewField() {
            if(count == 0){
                count = totalFields() + 1;
                $(".imagejhsdfkjdh").removeClass("d-none");
            }
            else if(count > 0){
                count = totalFields() + 1;
                field = $("#dynamic-field-image").clone();
                field.attr("id", "dynamic-field-image-" + count);
                field.children("label").text("Gallery Image " + count);
                field.find("input").val("");
                field.find("input").attr("onchange","document.getElementById('dynamic_field_image_id_"+count+"').src = window.URL.createObjectURL(this.files[0])");
                field.find("img").attr("id", "dynamic_field_image_id_"+count);
                $(className + ":last").after($(field));
            }
        }

        function removeLastField() {
            if (totalFields() > 1) {
                count = totalFields() - 1;
                $(className + ":last").remove();
            }
            else{
                count = totalFields() - 1;
                $(".imagejhsdfkjdh").addClass("d-none");
            }
        }

        function enableButtonRemove() {
            if (totalFields() > 0) {
                buttonRemove.removeAttr("disabled");
                buttonRemove.addClass("shadow-sm");
            }
        }

        function disableButtonRemove() {
            if (totalFields() == 0) {
                buttonRemove.attr("disabled", "disabled");
                buttonRemove.removeClass("shadow-sm");
            }
        }

        function disableButtonAdd() {
            if (totalFields() === maxFields) {
                buttonAdd.attr("disabled", "disabled");
                buttonAdd.removeClass("shadow-sm");
            }
        }

        function enableButtonAdd() {
            if (totalFields() === (maxFields - 1)) {
                buttonAdd.removeAttr("disabled");
                buttonAdd.addClass("shadow-sm");
            }
        }

        buttonAdd.click(function() {
            addNewField();
            enableButtonRemove();
            disableButtonAdd();
        });

        buttonRemove.click(function() {
            removeLastField();
            disableButtonRemove();
            enableButtonAdd();
        });
    });

    $(document).ready(function() {
        var buttonAdd = $("#add-button");
        var buttonRemove = $("#remove-button");
        var className = ".dynamic-field";
        var count = 0;
        var field = "";
        var maxFields = 20;



        function totalFields() {
            return $(className).length;
        }

        function addNewField() {
            console.log(count);
            if(count == 0){
                count = totalFields() + 1;
                $("div.fieldfjhdf").removeClass("d-none");
            }
            else if(count > 0){
                count = totalFields() + 1;
                field = $("#dynamic-field-1").clone();
                field.attr("id", "dynamic-field-" + count);
                field.children("label").text("Color " + count);
                field.find("input").val("");
                $(className + ":last").after($(field));
            }

        }



        function removeLastField() {
            if (totalFields() > 1) {
                count = totalFields() - 1;
                $(className + ":last").remove();
            }
            else{
                count = totalFields() - 1;
                $("div.fieldfjhdf").addClass("d-none");
            }
        }

        function enableButtonRemove() {
            if (totalFields() > 0) {
                buttonRemove.removeAttr("disabled");
                buttonRemove.addClass("shadow-sm");
            }
        }

        function disableButtonRemove() {
            if (totalFields() == 0) {
                buttonRemove.attr("disabled", "disabled");
                buttonRemove.removeClass("shadow-sm");
            }
        }

        function disableButtonAdd() {
            if (totalFields() === maxFields) {
                buttonAdd.attr("disabled", "disabled");
                buttonAdd.removeClass("shadow-sm");
            }
        }

        function enableButtonAdd() {
            if (totalFields() === (maxFields - 1)) {
                buttonAdd.removeAttr("disabled");
                buttonAdd.addClass("shadow-sm");
            }
        }

        buttonAdd.click(function() {
            addNewField();
            enableButtonRemove();
            disableButtonAdd();
        });

        buttonRemove.click(function() {
            removeLastField();
            disableButtonRemove();
            enableButtonAdd();
        });
    });

    $('#remove-attribute').click(function(){
        $('#dynamic-field-1').empty();
        $('.dynamic-field-btn').empty();
    });
</script>
<script>
    var editor1 = new RichTextEditor("#text-editor1");
    //editor1.setHTMLCode("Use inline HTML or setHTMLCode to init the default content.");
</script>
<script>
    var editor1 = new RichTextEditor("#text-editor");
    //editor1.setHTMLCode("Use inline HTML or setHTMLCode to init the default content.");
</script>
@endsection
@else
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12 alert text-center">
                    You don't have the previllage to view this page
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

</div>
<!-- /.content-wrapper -->
@endsection
@endcan
