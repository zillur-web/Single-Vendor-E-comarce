@extends('backend.master')
{{-- @section('dashboardActive')
active
@endsection --}}
@section('content')
<style>
    .profile-user-img {
        height: 100px;
        width: 100px;
    }
    .profile-image-upload-btn {
        margin: 0 auto;
        width: 98px;
        height: 98px;
        border-radius: 50%;
        justify-items: center;
        display: inline-flex;
        margin-left: -99px;
        position: absolute;
        text-align: center;
        align-items: center;
        background: #00000094;
        color: #fff;
        opacity: 0;
        transition: 0.3s;
        cursor: pointer;
    }
    .profile-image-upload-btn i {
        text-align: center;
        padding: 37px;
        font-size: 22px;
    }
    .profile-image-upload-btn:hover {
        opacity: 1;
    }




</style>
<!-- Content Wrapper. Contains page content -->
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Admin Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-info card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                    @php
                        $profile_image = '';
                        $disc = '';
                        $skils = '';
                        $address = '';
                    @endphp
                    @foreach ($user->adminDetails as $details)
                        @php
                            $profile_image = $details->img;
                            $disc = $details->disc;
                            $skils = $details->skils;
                            $address = $details->address;
                        @endphp
                    @endforeach
                  <img class="profile-user-img img-fluid img-circle image-upload-btn"src="@if ($profile_image != '') {{ asset('image/admin-profile/'.$profile_image) }} @else {{ asset('default-image/default-user.png') }}  @endif"alt="User profile picture">

                    @if ((sessionUser()->id  == $user->id) || (auth()->user()->can('Admin Profile View')))
                        <div class="profile-image-upload-btn" data-toggle="modal" data-target="#profile-picture-modal"><i class="fas fa-camera"></i></div>
                        <div class="modal fade @error('file') show @enderror" id="profile-picture-modal" tabindex="-1" role="dialog" style="@error('file') display: block; @enderror">
                            <div class="modal-dialog" style="top: 4rem;" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Upload Profile</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('user.profile.image.update') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                                            <div class="form-group" style="margin: auto auto 10px auto; text-align: center;">
                                                <img src="" alt="" id="image_id" style="width: 50%; height: 50%; border: 1px solid #ddd; border-radius: 4px;" onerror="this.src='{{ asset('default-image/default-user.png') }}'">
                                            </div>
                                            <div class="form-group">
                                                <input type="file" name="file" class="form-control" @error('file') is-invalid @enderror onchange="document.getElementById('image_id').src = window.URL.createObjectURL(this.files[0])">
                                                @error('file')
                                                    <span class="text-danger text-left">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="form-control btn-info" value="Upload">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>



                <h3 id="profile-name" class="profile-username text-center">{{ $user->name }} @if ((sessionUser()->id  == $user->id) || (auth()->user()->can('Admin Profile View'))) <span id="edit-name-btn" style="font-size: 14px; color: #17a2b8; margin-left: 6px; cursor: pointer;"><i class="fas fa-edit"></i></span> @endif </h3>
                @if ((sessionUser()->id  == $user->id) || (auth()->user()->can('Admin Profile View')))
                    <div id="name-edit" class="mt-3 d-none">
                        <form action="{{ route('user.profile.name.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user" value="{{ $user->id }}">
                            <div class="form-group">
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control mb-3">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <a id="edit-name-close-btn" class="form-control btn btn-danger">Close</a>
                                    </div>
                                    <div class="col-6">
                                        <input type="submit" value="Update" class="form-control btn btn-info">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                @endif


                <p class="text-muted text-center">
                    {{ $user->email }}
                </p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b style="font-weight: 400;"><i class="fas fa-user-tag"></i> Role</b>
                    <a class="float-right text-dark font-weight-bold">
                        @foreach ($user->roles as $role)
                            {{ $role->name }}
                            @php
                                $rolee = $role;
                            @endphp
                        @endforeach
                    </a>
                    <br>
                    <br>
                    <b style="font-weight: 400;"><i class="fas fa-user-alt"></i> Admin since</b> <a class="float-right text-dark font-weight-bold">{{ $user->created_at->format('M Y') }}</a>
                  </li>
                </ul>

                @if (sessionUser()->id  != $user->id)
                    <a href="#" class="btn btn-outline-info btn-block"><b>Send Mail</b></a>
                @endif
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-info card-outline">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="far fa-file-alt mr-1"></i> Description @if ((sessionUser()->id  == $user->id) || (auth()->user()->can('Admin Profile View')))  <span id="edit-description-btn" style="font-size: 14px; color: #17a2b8; margin-left: 6px; cursor: pointer;"><i class="fas fa-edit"></i></span> @endif</strong>

                <p id="description" class="text-muted">@if ($disc != '') {{ $disc }} @else {{ 'NaN' }} @endif</p>
                @if ((sessionUser()->id  == $user->id) || (auth()->user()->can('Admin Profile View')))
                    <div id="description-edit" class="mt-3 d-none">
                        <form action="{{ route('user.profile.description.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user" value="{{ $user->id }}">
                            <div class="form-group">
                                <textarea name="disc" id="" rows="5" class="form-control" placeholder="Enter Your Description" required>{{ $disc }}</textarea>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <a id="edit-description-close-btn" class="form-control btn btn-danger">Close</a>
                                    </div>
                                    <div class="col-6">
                                        <input type="submit" value="Update" class="form-control btn btn-info">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                @endif

                <hr>
                <strong class=""><i class="fas fa-book mr-1 "></i> Education
                    @if ((sessionUser()->id  == $user->id) || (auth()->user()->can('Admin Profile View')))
                        <span id="edit-edu-btn" style="font-size: 14px; color: #17a2b8; margin-left: 6px; cursor: pointer;"><i class="fas fa-plus"></i> Add</span>
                    @endif
                </strong>

                <ul id="edu" class=" my-0 mt-2" style="padding: 0px 15px; margin-left: 16px;">
                    @forelse ($user->admin_skils as $skil)
                        <li style="list-style-type: disclosure-open; " class="mb-2">
                            <p class="text-dark mb-0">{{ $skil->title }}</p>
                            <span class="text-muted py-0" style="font-size: 15px; color: #838383 !important;">{{ $skil->institute }}, {{ $skil->country }}, Graduated {{ $skil->year }}</span>
                            <a href="{{ route('user.profile.education.delete', ['id' => $skil->id, 'user' => $user->id]) }}" style="position: absolute; right: 22px; font-size: 12px; color: #17a2b8; margin-top: -43px;"><i class="far fa-trash-alt"></i></a>
                        </li>
                    @empty
                        {{ 'NaN' }}
                    @endforelse
                </ul>

                @if ((sessionUser()->id  == $user->id) || (auth()->user()->can('Admin Profile View')))
                    <div id="edu-edit" class="mt-3 d-none">
                        <form action="{{ route('user.profile.education.add') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user" value="{{ $user->id }}">
                            <div class="form-group">
                                <input type="text" name="title" id="" class="form-control @error('title') is-invalid @enderror" placeholder="Title" required>
                                @error('title')
                                    <span class="text-danger text-left">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" name="institute" id="" class="form-control @error('institute') is-invalid @enderror" placeholder="Institue Name" required>
                                @error('institute')
                                    <span class="text-danger text-left">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <input type="text" name="country" id="" class="form-control @error('country') is-invalid @enderror" placeholder="Enter Country" required>
                                        @error('country')
                                            <span class="text-danger text-left">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <input type="number" name="year" id="" class="form-control @error('year') is-invalid @enderror" placeholder="Enter Graduated Year" required>
                                        @error('year')
                                            <span class="text-danger text-left">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <a id="edit-edu-close-btn" class="form-control btn btn-danger">Close</a>
                                    </div>
                                    <div class="col-6">
                                        <input type="submit" value="Update" class="form-control btn btn-info">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                @endif


                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills
                    @if ((sessionUser()->id  == $user->id) || (auth()->user()->can('Admin Profile View')))
                        <span id="edit-skils-btn" style="font-size: 14px; color: #17a2b8; margin-left: 6px; cursor: pointer;"><i class="fas fa-edit"></i></span>
                    @endif
                </strong>

                <p id="skils" class="text-muted">
                  <span class="tag tag-danger">@if ($skils != '') {{ $skils }} @else {{ 'NaN' }}  @endif</span>
                </p>

                @if ((sessionUser()->id  == $user->id) || (auth()->user()->can('Admin Profile View')))
                    <div id="skils-edit" class="mt-3 d-none">
                        <form action="{{ route('user.profile.skils.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user" value="{{ $user->id }}">
                            <div class="form-group">
                                <textarea name="skils" id="" rows="3" class="form-control" placeholder="Enter Your Skils.." required>{{ $skils }}</textarea>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <a id="edit-skils-close-btn" class="form-control btn btn-danger">Close</a>
                                    </div>
                                    <div class="col-6">
                                        <input type="submit" value="Update" class="form-control btn btn-info">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                @endif

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location
                    @if ((sessionUser()->id  == $user->id) || (auth()->user()->can('Admin Profile View')))
                        <span id="edit-location-btn" style="font-size: 14px; color: #17a2b8; margin-left: 6px; cursor: pointer;"><i class="fas fa-edit"></i></span>
                    @endif
                </strong>

                <p id="location" class="text-muted">@if ($address != '') {{ $address }} @else {{ 'NaN' }}  @endif</p>
                @if ((sessionUser()->id  == $user->id) || (auth()->user()->can('Admin Profile View')))
                    <div id="location-edit" class="mt-3 d-none">
                        <form action="{{ route('user.profile.address.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user" value="{{ $user->id }}">
                            <div class="form-group">
                                <textarea type="text" name="address" class="form-control" rows="4" placeholder="Example : House No: 12/A , Badda, Dhaka, Bangladesh" required>{{ $address }}</textarea>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <a id="edit-location-close-btn" class="form-control btn btn-danger">Close</a>
                                    </div>
                                    <div class="col-6">
                                        <input type="submit" value="Update" class="form-control btn btn-info">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                @endif

                <hr>


              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-info card-outline">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Permission</a></li>
                  {{-- <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li> --}}
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                        <div class="row">
                            @foreach ($permissions as $permission)
                                <div class="col-md-3">
                                    <div class="custom-control custom-checkbox">
                                        {{-- @if ($roles->hasPermissionTo($permission->name)) checked @endif --}}
                                        {{-- <input class="custom-control-input" type="checkbox" name="permission[]" id="customCheckbox{{ $permission->id }}" value="{{ $permission->id }}" readonly> --}}
                                        <label style="font-weight: 400;">@if ($user->hasPermissionTo($permission->name)) <i class="fas fa-check text-success"></i> @else <i class="fas fa-times text-danger"></i>  @endif {{ $permission->name }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  {{-- <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 12:05</span>

                          <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                          <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                          </h3>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-comments bg-warning"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                          <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-camera bg-purple"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                          <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                          <div class="timeline-body">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div> --}}
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->
@endsection

@section('footer_js')
    @if ((sessionUser()->id  == $user->id) || (auth()->user()->can('Admin Profile View')))
        <script>
            $('#edit-name-btn').click(function(){
                $('#name-edit').removeClass('d-none');
                $('#profile-name').addClass('d-none');
            });
            $('#edit-name-close-btn').click(function(){
                $('#name-edit').addClass('d-none');
                $('#profile-name').removeClass('d-none');
            });

            $('#edit-description-btn').click(function(){
                $('#description-edit').removeClass('d-none');
                $('#description').addClass('d-none');
                $('#edit-description-btn').addClass('d-none');
            });
            $('#edit-description-close-btn').click(function(){
                $('#description-edit').addClass('d-none');
                $('#description').removeClass('d-none');
                $('#edit-description-btn').removeClass('d-none');
            });

            $('#edit-skils-btn').click(function(){
                $('#skils-edit').removeClass('d-none');
                $('#skils').addClass('d-none');
                $('#edit-skils-btn').addClass('d-none');
            });
            $('#edit-skils-close-btn').click(function(){
                $('#skils-edit').addClass('d-none');
                $('#skils').removeClass('d-none');
                $('#edit-skils-btn').removeClass('d-none');
            });

            $('#edit-location-btn').click(function(){
                $('#location-edit').removeClass('d-none');
                $('#location').addClass('d-none');
                $('#edit-location-btn').addClass('d-none');
            });
            $('#edit-location-close-btn').click(function(){
                $('#location-edit').addClass('d-none');
                $('#location').removeClass('d-none');
                $('#edit-location-btn').removeClass('d-none');
            });

            $('#edit-edu-btn').click(function(){
                $('#edu-edit').removeClass('d-none');
                $('#edu').addClass('d-none');
                $('#edit-edu-btn').addClass('d-none');
            });
            $('#edit-edu-close-btn').click(function(){
                $('#edu-edit').addClass('d-none');
                $('#edu').removeClass('d-none');
                $('#edit-edu-btn').removeClass('d-none');
            });
        </script>
    @endif
@endsection
