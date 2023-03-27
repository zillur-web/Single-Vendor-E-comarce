@extends('backend.master')
@can('User Role Assign')
@section('role_active')
active
@endsection
@section('assign_user_view_active')
active
@endsection
@section('role_treeview_active')
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
                        <li class="breadcrumb-item active">assign-admin</li>
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
                <div class="col-12 m-auto">
                    <!-- general form elements -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Assign Admin</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('user.assign.sotre') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="user">Select User <span class="text-danger">*</span></label>
                                    <select name="user"class="form-control @error('user') is-invalid @enderror" id="user" value="{{ old('user') }}">
                                        <option value=""> -- Select -- </option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}" @if (old('user') == $user->id ) selected @endif>{{ $user->name }} ( {{ $user->email }} )</option>
                                        @endforeach
                                    </select>
                                    @error('user')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="role">Select Role <span class="text-danger">*</span></label>
                                    <select name="role"class="form-control @error('role') is-invalid @enderror" id="role" value="{{ old('user') }}">
                                        <option value="" > -- Select -- </option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}"  @if (old('role') == $role->id ) selected @endif>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                @error('permission')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Assign</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Admin Role List</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Admin Name</th>
                                        <th class="">Role</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $key => $user)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>
                                                <ol>
                                                    @forelse ($user->roles as $role)
                                                        <li>{{ $role->name }}</li>
                                                    @empty
                                                    -
                                                    @endforelse
                                                </ol>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('user.profile', $user->id) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                                <a href="{{ route('role.admin.destroy',$user->id) }}" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <td colspan="10" class="text-center">No Data..</td>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
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
