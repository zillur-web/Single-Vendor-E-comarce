@extends('backend.master')
@can('Product Trash View')

@section('product_active')
active
@endsection
@section('product_trush_view_active')
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
                        <li class="breadcrumb-item active">Trush Products</li>
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
                            <h3 class="card-title">Trushed Products Table</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" >
                            <form action="{{ route('product_trush_selected') }}" method="POST">
                                @csrf
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 65px;" class="text-center">
                                                <input type="checkbox" id="checkall"> All
                                            </th>
                                            <th style="width: 10px">#</th>
                                            <th>Name</th>
                                            <th>Thumbnail</th>
                                            <th>Created At</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($products as $key => $value)
                                            <tr>
                                                <td class="text-center">
                                                    <input type="checkbox" name="select[]" value="{{ $value->id }}">
                                                </td>
                                                <td>{{ $products->firstItem() +$key }}</td>
                                                <td>{{ $value->title }}</td>
                                                <td uk-lightbox>
                                                    <a href="{{ asset('image/products/thumbnail/'.$value->thumbnail) }}" data-alt="Image">
                                                        <img width="100" src="{{ asset('image/products/thumbnail/'.$value->thumbnail) }}" alt="{{ $value->title }}">
                                                    </a>
                                                </td>
                                                <td>{{ $value->created_at->diffForHumans() }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('product_restore', $value->id) }}" class="btn btn-sm btn-info"><i class="fas fa-undo"></i></a>
                                                    <a href="{{ route('product_delete', $value->id) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                        @empty
                                            <td colspan="10" class="text-center">No Data..</td>
                                        @endforelse
                                    </tbody>
                                </table>
                                <input type="submit" name="restore" value="Restore All" class="btn btn-sm btn-info">
                                <input type="submit" name="delete" value="Delete All" class="btn btn-sm btn-danger">
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

