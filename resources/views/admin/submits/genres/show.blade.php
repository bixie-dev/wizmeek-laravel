@extends('admin.layouts.app')

@section('main-content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Genre</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Responsive Hover Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>ID</td>
                      <td>{{ $genre->id }}</td>
                    </tr>
                    <tr>
                      <td>Title</td>
                      <td>{{ $genre->genre }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

<div class="col-3 mb-3">
    <a href="{{ route('admin.genres.edit', $genre->id) }}" class="btn btn-block btn-primary">Edit genre</a>
    <a href="{{ route('admin.genres.destroy', $genre->id) }}" class="btn btn-block btn-danger">Delete genre</a>
</div>

@endsection