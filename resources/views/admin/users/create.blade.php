@extends('admin.layouts.app')

@section('main-content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">New user</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

    <div class="col-8">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">New user form</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('admin.users.store') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>

                        @error('name')
                            <p id="exampleInputEmail1-error" class="text-danger">{{ $message }}</p>
                        @enderror

                        @if(old('genre'))
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                        @else
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter user name here">
                        @endif

                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>

                        @error('email')
                            <p id="exampleInputEmail1-error" class="text-danger">{{ $message }}</p>
                        @enderror

                        @if(old('email'))
                            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
                        @else
                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter user email here">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>

                        @error('password')
                            <p id="exampleInputEmail1-error" class="text-danger">{{ $message }}</p>
                        @enderror

                        @if(old('email'))
                            <input type="text" class="form-control" id="password" name="password" value="{{ old('password') }}">
                        @else
                            <input type="text" class="form-control" id="password" name="password" placeholder="Enter password here">
                        @endif
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <div class="row">
                        <div>
                            <button type="submit" class="btn btn-primary">Create new user</button>
                        </div>
                        <div>
                            <a href="{{ route('admin.users.index') }}" class="btn btn-block btn-secondary ml-1">Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </section>
    <!-- /.content -->

@endsection