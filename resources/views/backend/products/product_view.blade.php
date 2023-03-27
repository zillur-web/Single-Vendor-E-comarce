@extends('backend.master')
@can('Product View')

@section('product_active')
active
@endsection
@section('product_view_active')
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
                        <li class="breadcrumb-item active">Products</li>
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Products Table</h3>
                            @can('Product Add')
                                <a href="{{ route('add_product') }}" class="text-right" style="float: right;"><i style="font-size: 12px;" class="fa fa-plus" aria-hidden="true"></i> Add New</a>
                            @endcan
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" >
                            <form action="{{ route('product_remove_selected') }}" method="POST">
                                @csrf
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 65px;" class="text-center">
                                                <input type="checkbox" id="checkall"> All
                                            </th>
                                            <th style="width: 10px">#</th>
                                            <th>Name</th>
                                            <th class="text-center">Color</th>
                                            <th class="text-center">Thumbnail</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($products as $key => $value)
                                            <tr>
                                                <td class="text-center align-middle">
                                                    <input type="checkbox" name="select[]" value="{{ $value->id }}">
                                                </td>
                                                <td class="align-middle">{{ $products->firstItem() +$key }}</td>
                                                <td class="align-middle"><a target="_blank" href="{{ route('productDetails',['id'=>$value->id, 'slug'=>$value->slug]) }}">{{ $value->title }}</a></td>
                                                <td class="align-middle text-center">
                                                    @php
                                                        $group = $value->product_attribute->unique('color_id');
                                                    @endphp
                                                    @if ($group[0]['color_id'] != NULL)
                                                        <ul style="list-style: none;" class="mb-0 px-0">
                                                            @foreach ($group as $key => $attribute)
                                                                <li>{{ $attribute->colors->color_name }}</li>
                                                            @endforeach

                                                        </ul>
                                                    @else
                                                        <ul style="list-style: none;" class="mb-0 px-0">
                                                            <li>NaN</li>
                                                        </ul>
                                                    @endif
                                                </td>

                                                <td class="align-middle text-center" uk-lightbox>
                                                    <a href="{{ asset('image/products/thumbnail/'.$value->thumbnail) }}" data-alt="Image">
                                                        <img width="50" src="{{ asset('image/products/thumbnail/'.$value->thumbnail) }}" alt="{{ $value->title }}">
                                                    </a>
                                                </td>
                                                <td class="text-center align-middle">
                                                    @can('Product Edit')
                                                        <a href="{{ url('product/edit').'/'.$value->id }}" class="btn btn-sm btn-info"><i class="far fa-edit"></i></a>
                                                    @endcan
                                                    @can('Product Delete')
                                                        <a href="{{ url('product/remove').'/'.$value->id }}" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @empty
                                            <td colspan="10" class="text-center">No Data..</td>
                                        @endforelse
                                    </tbody>
                                </table>
                                <input type="submit" value="Remove All" class="btn btn-sm btn-danger">
                            </form>
                        </div>
                        <!-- /paginate -->

                        <div class="card-footer clearfix text-right">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
                  <!-- /.card -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('footer_js')
<script>
    $('#checkall').click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
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

