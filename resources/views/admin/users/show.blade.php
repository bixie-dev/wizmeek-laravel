@extends('admin.layouts.app')

@section('main-content')

<style>
    .user__avatar--border{
        border-radius: 50%;
        border: 3px solid #adb5bd;
        padding: 3px;
        width: 100px;
        height: 100px;
        margin: 0 auto;
    }
    .user__avatar.admin-profile{
        border-radius: 50%;
        width: 100%;
        height: 100%;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
    }
</style>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
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
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                    @if($user->avatar)
                    <div class="user__avatar--border">
                        <div class="user__avatar admin-profile" style="background-image:url('{{ asset('storage/app/' . $user->avatar) }}')"></div>
                    </div>
                    @elseif($user->google_avatar)
                    <div class="user__avatar--border">
                        <div class="user__avatar admin-profile" style="background-image:url('{{ $user->google_avatar }}')"></div>
                    </div>
                    @else
                    <div class="user__avatar--border">
                        <div class="user__avatar admin-profile" style="background-image:url('{{ asset('public/img/content/avatars/no_avatar.png') }}')"></div>
                    </div>
                    @endif
                </div>

                <h3 class="profile-username text-center">{{ $user->name }}</h3>
                @if($user->role == 'admin')
                <a href="mailto:{{ $user->email }}" class="d-block mb-2 text-muted text-center">Admin</a>
                @elseif($user->role == 'moderator')
                <a href="mailto:{{ $user->email }}" class="d-block mb-2 text-muted text-center">Moderator</a>
                @elseif($user->role == 'copywrighter')
                <a href="mailto:{{ $user->email }}" class="d-block mb-2 text-muted text-center">Copywrighter</a>
                @elseif(!$user->role || $user->role == 'user')
                <a href="mailto:{{ $user->email }}" class="d-block mb-2 text-muted text-center">User</a>
                @endif

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Followers</b> <div class="float-right">{{ count($user->followers) }}</div>
                  </li>
                  <li class="list-group-item">
                    <b>Following</b> <div class="float-right">{{ count($user->following) }}</div>
                  </li>
                  <li class="list-group-item">
                    <b>Favorite channels</b> <div class="float-right">{{ count($user->favoriteChannels) }}</div>
                  </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Some action</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <!-- <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                  B.S. in Computer Science from the University of Tennessee at Knoxville
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">Malibu, California</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">UI Design</span>
                  <span class="tag tag-success">Coding</span>
                  <span class="tag tag-info">Javascript</span>
                  <span class="tag tag-warning">PHP</span>
                  <span class="tag tag-primary">Node.js</span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
              </div>
            </div> -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="activity">
                    <!-- Post -->
                    <!-- <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Shared publicly - 7:30 PM today</span>
                      </div>
                      
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.
                      </p>

                      <p>
                        <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                        <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                        <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                          </a>
                        </span>
                      </p>

                      <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                    </div> -->
                    

                    
                  </div>

                  <div class="tab-pane" id="settings">


                    <form action="{{ route('admin.users.update', $user->id) }}" method="post" class="form-horizontal">
                        @csrf
                        @method('patch')
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputName" placeholder="{{ $user->name }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail" placeholder="{{ $user->email }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" style="resize:none;" id="inputExperience" placeholder="Experience" disabled>{{ $user->description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleSelectRounded0" class="col-sm-2 col-form-label">Role</label>
                            <div class="col-sm-10">
                                <select name="role" class="form-control" id="role" {{ $user->id == auth()->user()->id ? 'disabled' : '' }}>
                                    <option value="admin" {{$user->role == 'admin' ? 'selected' : ''}}>Admin</option>
                                    <option value="moderator" {{$user->role == 'moderator' ? 'selected' : ''}}>Moderator</option>
                                    <option value="copywrighter" {{$user->role == 'copywrighter' ? 'selected' : ''}}>Copywrighter</option>
                                    <option value="user" {{!$user->role || $user->role == 'user' ? 'selected' : ''}}>User</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="d-flex offset-sm-2 col-sm-10">
                                <div>
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                </div>
                          
                                <div>
                                    <a href="{{ route('admin.users.index') }}" class="btn btn-block btn-secondary ml-1">All users</a>
                                </div>
                            </div>
                        </div>
                    </form>
                  </div>
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
  @endsection