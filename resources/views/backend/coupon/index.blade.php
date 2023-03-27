@extends('backend.master')
@can('Coupon View')

@section('coupon_active')
active
@endsection
@section('coupon_view_active')
active
@endsection
@section('coupon_treeview_active')
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
                        <li class="breadcrumb-item active">Coupon</li>
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
                            <h3 class="card-title">Coupon Table</h3>
                            @can('Coupon Add')
                                <a href="{{ route('coupon.create') }}" class="text-right" style="float: right;"><i style="font-size: 12px;" class="fa fa-plus" aria-hidden="true"></i> Add New</a>
                            @endcan
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @csrf
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Coupon</th>
                                        <th>Ammout</th>
                                        <th>Limit</th>
                                        <th>Expired Date</th>
                                        <th>Created At</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($coupons as $key => $value)
                                        <tr>
                                            <td>{{ $coupons->firstItem() +$key }}</td>
                                            <td>{{ $value->coupon_code }}</td>
                                            <td>{{ $value->coupon_ammount }} @if ($value->coupon_percentage != NULL) % @endif</td>
                                            <td>{{ $value->limit }}</td>
                                            <td>{{ date('d-M-Y', strtotime($value->coupon_validity)) }}</td>
                                            <td>{{ $value->created_at->diffForHumans() }}</td>
                                            <td class="text-center " >
                                                @can('Coupon Edit')
                                                    <a href="{{ route('coupon.edit',$value->id) }}" class="btn btn-sm btn-info"><i class="far fa-edit"></i></a>
                                                @else
                                                -
                                                @endcan
                                                @can('Coupon Delete')
                                                    <form action="{{ route('coupon.destroy', $value->id) }}" style="display: contents;" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-danger ml-1"><i class="far fa-trash-alt"></i></button>
                                                    </form>
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
                            {{ $coupons->links() }}
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

