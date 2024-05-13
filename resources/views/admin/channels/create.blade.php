@extends('admin.layouts.app')

@section('main-content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add new channel</h1>
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
                <h3 class="card-title">New Channel</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('admin.channel.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name of the channel">
                    </div>
                    <div class="form-group">
                        <label for="desc-short">Short description</label>
                        <input type="text" class="form-control" id="desc-short" name="description_short" placeholder="Enter short description">
                    </div>
                    <div class="form-group">
                        <label for="desc-full">Full description</label>
                        <textarea class="form-control" rows="3" id="desc-full" name="description_full" placeholder="Enter full description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="stream">Channel stream link</label>
                        <input type="text" class="form-control" id="stream" name="stream" placeholder="Enter the stream link">
                    </div>
                    <div class="form-group">
                        <label for="logo">Channel logo</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="logo" name="logo">
                                <label class="custom-file-label" for="logo">Choose logo</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="poster">Channel poster</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="poster" name="poster">
                                <label class="custom-file-label" for="poster">Choose poster</label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Create new channel</button>
                </div>
            </form>
        </div>
    </div>
    </section>
    <!-- /.content -->
</div>

@endsection