@extends('admin.layouts.app')

@section('main-content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit genre</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">

    <div class="col-8">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit genre form</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('admin.genres.update', $genre->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="card-body">
                    <div class="form-group">
                        <label for="genre">Genre title</label>

                        @error('genre')
                          <p id="exampleInputEmail1-error" class="text-danger">{{ $message }}</p>
                        @enderror

                        @if(old('genre'))
                        <input type="text" class="form-control" id="genre" name="genre" value="{{ old('genre') }}">
                        @else
                        <input type="text" class="form-control" id="genre" name="genre" value="{{ $genre->genre }}">
                        @endif

                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save genre</button>
                </div>
            </form>
        </div>
    </div>
    </section>
    <!-- /.content -->

@endsection