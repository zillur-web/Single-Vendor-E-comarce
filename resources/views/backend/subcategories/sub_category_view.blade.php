@extends('backend.master')
@can('Sub Category View')
@section('subcategory_active')
active
@endsection
@section('subcategory_view_active')
active
@endsection
@section('subcategory_treeview_active')
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
                        <li class="breadcrumb-item active">Sub Categories</li>
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
                            <h3 class="card-title">Sub Categories Table</h3>
                            @can('Sub Category Add')
                                <a href="{{ url('subcategoies/add') }}" class="text-right" style="float: right;"><i style="font-size: 12px;" class="fa fa-plus" aria-hidden="true"></i> Add New</a>
                            @endcan
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @csrf
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Slug</th>
                                        <th>Created At</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($subcats as $key => $value)
                                        <tr>
                                            <td>{{ $subcats->firstItem() +$key }}</td>
                                            <td>{{ $value->subcategory_name }}</td>
                                            <td>{{ $value->category->category_name }}</td>
                                            <td>{{ $value->subcategory_slug }}</td>
                                            <td>{{ $value->created_at->diffForHumans() }}</td>
                                            <td class="text-center">
                                                @can('Sub Category Edit')
                                                    <a href="{{ url('subcategories/edit').'/'.$value->id }}" class="btn btn-sm btn-info"><i class="far fa-edit"></i></a>
                                                @else
                                                -
                                                @endcan
                                                @can('Sub Category Delete')
                                                    <a href="{{ url('subcategoies/remove').'/'.$value->id }}" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a>
                                                @else
                                                -
                                                @endcan
                                            </td>
                                        </tr>
                                    @empty
                                        <td colspan="10" class="text-center">No Data..</td>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /paginate -->

                        <div class="card-footer clearfix text-right">
                            {{ $subcats->links() }}
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
