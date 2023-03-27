@extends('backend.master')
@section('coupon_active')
active
@endsection
@section('coupon_trush_active')
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
                            <a href="{{ route('coupon.create') }}" class="text-right" style="float: right;"><i style="font-size: 12px;" class="fa fa-plus" aria-hidden="true"></i> Add New</a>
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
                                        <th>Validation</th>
                                        <th>Created At</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($coupons as $key => $value)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $value->coupon_code }}</td>
                                            <td>{{ $value->coupon_ammount }} @if ($value->coupon_percentage != NULL) % @endif</td>
                                            <td>{{ $value->limit }}</td>
                                            <td>{{ date('d-M-Y', strtotime($value->coupon_validity)) }}</td>
                                            <td>{{ $value->created_at->diffForHumans() }}</td>
                                            <td class="text-center " >
                                                <a href="{{ route('coupon.restore',$value->id) }}" class="btn btn-sm btn-info"><i class="fas fa-undo"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <td colspan="10" class="text-center">No Data..</td>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /paginate -->

                        {{-- <div class="card-footer clearfix text-right">
                            {{ $coupons->links() }}
                        </div> --}}
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
