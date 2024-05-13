@extends('admin.layouts.app')

@section('main-content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Access code #{{ $eac->id }}</h1>
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
                <h3 class="card-title">Access code details</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body">
                <p class="lead">Early Access Code: {{$eac->eac}}</p>
                @if($eac->multiple_registrations == '1')
                  <p class="lead">Status: <span class="text-primary">Multiple ({{ count($eac->users_multiple_reg) }})</span></p>
                @else
                  @if($eac->user_id)
                    <p class="lead">Status: <span class="text-success">Registered</span></p>
                    <p class="lead">User: {{$eac->user->name}}</p>
                  @else
                    <p class="lead">Status: <span class="text-danger">Not registered</span></p>
                  @endif
                @endif
                
            </div>
            <div class="card-footer"> 
                <a href="{{ route('admin.eac.index') }}" class="btn btn-secondary">Go back</a>
            </div>
        </div>
    </div>
    </section>
    <!-- /.content -->

@endsection