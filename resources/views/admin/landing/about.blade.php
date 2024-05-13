@extends('admin.layouts.app')

@section('main-content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>About Us page texts</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

    <!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">

            <!-- Tabs -->
            <div class="col-md-12">

                <!-- Tabs bar -->
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#main" data-toggle="tab">Main screen</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">

                            <!-- Tab #1 - About us -->
                            <div class="tab-pane active" id="main">
                                <form action="{{ route('admin.landing.update') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('patch')
                                    <div class="form-group">
                                        <label>About Us heading</label>
                                        <textarea name="about_heading" class="form-control">{{ $landing->about_heading }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>About Us text</label>
                                        <textarea name="about_text" id="summernote" style="display: none;">{!! $landing->about_text !!}</textarea>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-info">Submit</button>
                                        <a href="{{ route('admin.panel') }}" class="btn btn-default">Cancel</a>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</section>
  @endsection