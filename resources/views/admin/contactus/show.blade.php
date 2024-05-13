@extends('admin.layouts.app')

@section('main-content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Message from: {{ $message->name }}</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

    <div class="col-8">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Message details</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body">
                <p class="lead">Name: {{$message->name}}</p>
                <p class="lead">Email: <a href="mailto:{{ $message->email }}"></a> {{$message->email}}</p>
                <p class="lead">Message:</p>
                <p class="lead">{{ $message->message }}</p>
                
                
            </div>
            <div class="card-footer"> 
                <a href="{{ route('admin.contactus.index') }}" class="btn btn-secondary">Go back</a>
            </div>
        </div>
    </div>
    </section>
    <!-- /.content -->

@endsection