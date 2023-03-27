@extends('backend.master')
@can('Product Add')
@section('product_active')
active
@endsection
@section('product_add_active')
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
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Add Product</li>
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
                    <div class="card card-light">
                        <div class="card-header">
                            <h3 class="card-title">Add New Product</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ url('product/add/post') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                               <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="title">Title :</label>
                                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Title" value="{{ old('title') }}">
                                            @error('title')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6 m-0 mb-2">
                                                    <label for="category_id">Category :</label>
                                                    <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror" value="{{ old('category_id') }}">
                                                        <option value="" selected>-- Select --</option>
                                                        @foreach ($cats as  $value)
                                                            <option value="{{ $value->id }}">{{ $value->category_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6 m-0 mb-2">
                                                    <label for="subcategory_id">Sub Category :</label>
                                                    <select name="subcategory_id" id="subcategory_id" class="form-control @error('subcategory_id') is-invalid @enderror" value="{{ old('subcategory_id') }}">
                                                        <option value="" selected>-- Select --</option>
                                                    </select>
                                                    @error('subcategory_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div id="dynamic-field-1" class="form-group dynamic-field">
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <label for="color">Color </label>
                                                        <select name="color[]" id="color" class="form-control" value="{{ old('color[]') }}">
                                                            <option value> -- Select -- </option>
                                                            @foreach ($colors as $value)
                                                                <option value="{{ $value->id }}"> {{ $value->color_name }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <label for="size">Size</label>
                                                        <select name="size[]" id="size" class="form-control" value="{{ old('size[]') }}">
                                                            <option value> -- Select -- </option>
                                                            @foreach ($sizes as $value)
                                                                <option value="{{ $value->id }}"> {{ $value->size_name }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <label for="Quantity">Quantity <span class="text-danger">*</span></label>
                                                        <input type="number" id="Quantity" class="form-control @error('quantity[]') is-invalid @enderror" name="quantity[]" placeholder="Quantity" value="{{ old('quantity[]') }}" required/>
                                                        @error('quantity[]')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label for="reqular_price">Regular Price <span class="text-danger">*</span></label>
                                                        <input type="number" id="reqular_price" class="form-control @error('reqular_price[]') is-invalid @enderror" name="reqular_price[]" placeholder="Reqular price" value="{{ old('reqular_price[]') }}" required/>
                                                        @error('reqular_price[]')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label for="sale_price">Sale Price</label>
                                                        <input type="number" id="sale_price" class="form-control" name="sale_price[]" placeholder="Sale price" alue="{{ old('sale_price[]') }}"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix mt-4">
                                                <button type="button" id="add-button" class="btn btn-sm btn-secondary float-left text-uppercase shadow-sm"><i class="fas fa-plus fa-fw"></i> Add</button>
                                                <button type="button" id="remove-button" class="btn btn-sm btn-secondary float-left text-uppercase ml-1" disabled="disabled"><i class="fas fa-minus fa-fw"></i> Remove</button>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text-editor">Summary :</label>
                                            <textarea name="summary" id="text-editor" rows="4" class="form-control @error('summary') is-invalid @enderror">{{ old('summary') }}</textarea>
                                            @error('summary')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="text-editor1">Description :</label>
                                            <textarea name="description" id="text-editor1" rows="4" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                                            @error('description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-6 m-0 mb-2">
                                                    <label for="thambnail">Thambnail :</label>
                                                    <input type="file" name="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror" id="thambnail" placeholder="Thambnail" value="{{ old('thumbnail') }}" onchange="document.getElementById('thumbnail_id').src = window.URL.createObjectURL(this.files[0])">
                                                    @error('thumbnail')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-6">
                                                    <img id="thumbnail_id" class="img-fluid" src="https://jjgf.com/images/defaultx2.jpg" alt="" style="border: 1px solid #ddd; border-radius: 4px; max-height: 110px;">
                                                </div>
                                            </div>

                                            <div id="dynamic-field-image" class="dynamic-field-image">
                                                <div class="row my-2">
                                                    <div class="col-6">
                                                        <label for="image">Gallery Image 1</label>
                                                        <input type="file" name="gallery_image[]" id="image" class="form-control  @error('gallery_image[]') is-invalid @enderror" value="{{ old('image[]') }}" onchange="document.getElementById('gallery_image-').src = window.URL.createObjectURL(this.files[0])">
                                                        @error('gallery_image[]')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-6">
                                                        <img id="gallery_image-" class="img-fluid" src="https://jjgf.com/images/defaultx2.jpg" alt="" style="border: 1px solid #ddd; border-radius: 4px; max-height: 110px;">
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
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info my-3"> Product Upload </button>
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
</script>
<script>
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
            count = totalFields() + 1;
            field = $("#dynamic-field-1").clone();
            field.attr("id", "dynamic-field-" + count);
            field.children("label").text("Color " + count);
            field.find("input").val("");
            $(className + ":last").after($(field));
        }

        function removeLastField() {
            if (totalFields() > 1) {
                $(className + ":last").remove();
            }
        }

        function enableButtonRemove() {
            if (totalFields() === 2) {
                buttonRemove.removeAttr("disabled");
                buttonRemove.addClass("shadow-sm");
            }
        }

        function disableButtonRemove() {
            if (totalFields() === 1) {
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
</script>
<script>
    $(document).ready(function() {
        var buttonAdd = $("#add-button-image");
        var buttonRemove = $("#remove-button-image");
        var className = ".dynamic-field-image";
        var count = 0;
        var field = "";
        var maxFields = 4;

        function totalFields() {
            return $(className).length;
        }

        function addNewField() {
            count = totalFields() + 1;
            field = $("#dynamic-field-image").clone();
            field.attr("id", "dynamic-field-image-" + count);
            field.find("label").text("Gallery Image " + count);
            field.find("input").val("");
            field.find("input").attr("onchange", "document.getElementById('gallery_image-"+count+"').src = window.URL.createObjectURL(this.files[0])");
            field.find("img").attr("id", "gallery_image-"+count);
            $(className + ":last").after($(field));
        }

        function removeLastField() {
            if (totalFields() > 1) {
                $(className + ":last").remove();
            }
        }

        function enableButtonRemove() {
            if (totalFields() === 2) {
                buttonRemove.removeAttr("disabled");
                buttonRemove.addClass("shadow-sm");
            }
        }

        function disableButtonRemove() {
            if (totalFields() === 1) {
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
