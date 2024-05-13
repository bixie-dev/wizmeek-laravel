@extends('admin.layouts.app')

@section('main-content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">New Early Access Code</h1>
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
                <h3 class="card-title">Are you sure you want to generate a new Early access code?</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('admin.eac.store') }}" method="post">
                @csrf
                <div class="card-body">

                  <div class="form-group">
                    <label for="eac">Unique PROMO name</label>
                    <p class="text-muted">To generate a  PROMO code name automatically - leave empty</p>
                    @error('eac')
                      <label for="eac"><code>{{ $message }}</code></label>
                    @enderror
                    <input type="text" class="form-control" name="eac" id="eac" placeholder="Enter some name">
                  </div>

                  <div class="form-group">
                    <div class="icheck-primary d-inline">
                      <input type="checkbox" name="multiple_registrations" id="multiple_registrations">
                      <label for="multiple_registrations">Allow multiple registrations for the PROMO code</label>
                    </div>
                  </div>

                  <!-- <div class="form-group">
                    <div class="icheck-primary d-inline">
                      <input type="checkbox" name="random_characters" id="random_characters" checked>
                      <label for="random_characters">Random characters</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="promo_code">Promo code</label>
                    <input type="text" class="form-control" name="promo_code" id="promo_code" placeholder="Enter your promo code" disabled>
                  </div> -->

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Generate</button>
                    <a href="{{ route('admin.eac.index') }}" class="btn btn-secondary">Go back</a>
                </div>
            </form>
        </div>
    </div>
    </section>
    <!-- /.content -->

    <script>
      
    </script>

@endsection