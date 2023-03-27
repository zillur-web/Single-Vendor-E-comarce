@extends('backend.master')
@section('coupon_active')
active
@endsection
@section('coupon_add_active')
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
                        <li class="breadcrumb-item active">Add Coupon</li>
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
                <div class="col-6 m-auto">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add New Coupon</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('coupon.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="coupon">Coupon Code <span class="text-danger">*</span></label>
                                    <input type="text" name="coupon_code" class="form-control @error('coupon_code') is-invalid @enderror" id="coupon" placeholder="Enter Coupon Code" value="{{ old('coupon_code') }}">
                                    @error('coupon_code')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="coupon_ammount">Coupon Amount <span class="text-danger">*</span></label>
                                    <input type="number" name="coupon_ammount" class="form-control @error('coupon_ammount') is-invalid @enderror" id="coupon_ammount" placeholder="Enter Coupon Amount" value="{{ old('coupon_ammount') }}">
                                    @error('coupon_ammount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="form-check mt-1">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="percentage" value="true">
                                        <label class="form-check-label" for="exampleCheck1">If Percentage</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="coupon_validity">Expired Date <span class="text-danger">*</span></label>
                                    <input type="date" name="coupon_validity" class="form-control @error('coupon_validity') is-invalid @enderror" id="coupon_validity" placeholder="Validity Date" value="{{ old('coupon_validity') }}">
                                    @error('coupon_validity')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="limit">Coupon Maximum Person Limit <span class="text-danger">(If Unlimited, leave this field blank)</span></label>
                                    <input type="number" name="limit" class="form-control @error('limit') is-invalid @enderror" id="limit" placeholder="Enter Maximum Limit" value="{{ old('limit') }}">
                                    @error('limit')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Add Coupon</button>
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
    $('#coupon').keyup(function() {
        $('#slug').val($(this).val().toLowerCase().split(',').join('').replace(/\s/g,"-"));
    });
</script>
@endsection
