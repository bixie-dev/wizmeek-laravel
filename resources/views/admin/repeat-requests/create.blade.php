@extends('admin.layouts.app')

@section('main-content')

<div class="content">
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Add new song</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('admin.repeatrequests.store') }}" method="post">
            @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Performer*</label>
              <input type="text" class="form-control" name="performer" id="exampleInputEmail1" placeholder="Performer">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Song name*</label>
              <input type="text" class="form-control" name="song_name" id="exampleInputPassword1" placeholder="Song name">
            </div>
            <input type="hidden" name="channel_id" value="{{ $responseData['channel_id'] }}">
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
</div>
<p>Some text</p>

@endsection