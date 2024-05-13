@extends('admin.layouts.app')

@section('main-content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ $submit->artist_name }} - {{ $submit->song_title }}</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <p class="card-title">Submitted by: <a href="{{ route('user.profile', $submit->user->id) }}" target="blank">{{ $submit->user->name }}</a></p>
        </div>
        <div class="card-header">
        <p class="card-title">Email: <a href="mailto:{{ $submit->user->email }}" target="blank">{{ $submit->user->email }}</a></p>
        </div>
        <div class="card-header">
          <p class="card-title">Release date: {{ $submit->release_date }}</p>
        </div>
        <div class="card-header">
          <p class="card-title">Genre: 
            @foreach($genres as $genre)
              {{ $genre['genre'] }}
            @endforeach
          </p>
        </div>
        <div class="card-header">
          @if(!empty($submit->video_path))
            <video width="400px" controls>
              <source src="{{ asset('storage/app' . $submit->video_path) }}">
            </video>
          @elseif(!empty($submit->youtube_link))
            <iframe width="400" height="226" src="https://www.youtube.com/embed/{{ $youtubeLink }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          @endif
        </div>

        <!-- Description -->
        <div class="card-header">
          <p>Description:</p>
          <p class="col-6">{{ $submit->description }}</p>
        </div>

        
        <div class="card-header">
        @if(!empty($submit->video_path) && empty($submit->youtube_link))
          <a href="{{ asset('storage/app' . $submit->video_path) }}" download role="button" class="col-2 btn btn-block btn-success">Download</a>
        @endif
          <a href="{{ route('admin.submits.index') }}" role="button" class="col-2 btn btn-block btn-secondary">Go back</a>
          <form action="{{ route('admin.submits.destroy', $submit->id) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" name="delelte" class="col-2 mt-2 btn btn-block btn-danger">Delete</button>
          </form>
        </div>
        
    </div>
</div>

@endsection