@extends('admin.layouts.app')

@section('main-content')




    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Subscriptions</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Total: {{ count($subscriptions) }}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Email</th>
                      <th>Subscription date</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($subscriptions as $subscribtion)
                    <tr>
                        <td style="vertical-align: middle">{{ $subscribtion->id }}</td>
                        <td class="" style="vertical-align: middle">{{ $subscribtion->email }}</td>
                        <td style="vertical-align: middle">{{ date("H:i d.m.Y", strtotime($subscribtion->created_at)) }}</td>
                      
                        <td style="vertical-align: middle"><p class="text-success">Active</p></td>
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