@extends('backend.master')
@can('Color View')
@section('colors_active')
active
@endsection
@section('colors_view_active')
active
@endsection
@section('colors_treeview_active')
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
                        <li class="breadcrumb-item active">Colors</li>
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
                            <h3 class="card-title">Colors Table</h3>
                            @can('Color Add')
                                <a href="{{ route('color_add') }}" class="text-right" style="float: right;"><i style="font-size: 12px;" class="fa fa-plus" aria-hidden="true"></i> Add New</a>
                            @endcan
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" >
                            @csrf
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th>Created At</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($colors as $key => $value)
                                        <tr>
                                            <td>{{ $colors->firstItem() +$key }}</td>
                                            <td>{{ $value->color_name }}</td>
                                            <td>{{ $value->created_at->diffForHumans() }}</td>
                                            <td class="text-center">
                                                @can('Color Delete')
                                                    <a href="{{ route('color_remove', $value->id) }}" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a>
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
                            {{ $colors->links() }}
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

