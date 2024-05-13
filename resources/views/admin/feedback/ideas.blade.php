@extends('admin.layouts.app')

@section('main-content')

<style>
    .clipboard__copy{
        background: none;
        border:none;
    }
</style>


    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Ideas</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List of Ideas</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Message</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($responseData['items'] as $item)
                    <tr>
                        <td style="vertical-align: middle">{{ $item->user_name }}</td>
                        <td style="vertical-align: middle">{{ $item->message }}</td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
    
@endsection