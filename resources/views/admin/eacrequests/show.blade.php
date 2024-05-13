@extends('admin.layouts.app')

@section('main-content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Request for {{ $response_data['request']->name }}</h1>
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
                <h3 class="card-title">Request details</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body">
                <p class="lead">Email: <a href="mailto:{{$response_data['request']->email}}">{{$response_data['request']->email}}</a></p>
                <p class="lead">Name: {{$response_data['request']->name}}</p>
                <p class="lead">Date: {{$response_data['request']->created_at}}</p>
                @if($response_data['request']->eac_id)
                    <p class="lead">Code: {{$response_data['request']->eac->eac}}</p>
                @endif
            </div>
            <div class="card-footer d-flex">
                @if($response_data['request']->new == 1)
                <form action="{{ route('admin.eacreq.process', $response_data['request']->id) }}" method="post">
                    @csrf
                    <button class="btn btn-primary" type="submit">Process</button>
                </form>
                @endif
                <a href="{{ route('admin.eacreq.index') }}" class="btn btn-secondary ml-3">Go back</a>
            </div>
        </div>
    </div>
    </section>
    <!-- /.content -->

@endsection