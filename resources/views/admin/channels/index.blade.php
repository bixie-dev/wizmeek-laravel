@extends('admin.layouts.app')

@section('main-content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Channels</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="col-3 mb-3">
        <a href="{{ route('admin.channels.create') }}" class="btn btn-block btn-primary">Add new channel</a>
    </div>

    <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All channels</h3>
              </div>
              <!-- ./card-header -->
              <div class="card-body">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Logo</th>
                      <th>Name</th>
                      <th>Short description</th>
                      <th class="col-2">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($channels as $channel)
                    <tr data-widget="expandable-table" aria-expanded="false" style="height:75px;">
                      <td style="vertical-align: middle">
                        <div class="image">
                          <img src="{{ asset('storage/app/' . $channel->logo) }}" style="width:50px; height:50px; border-radius:50%;" alt="Channel logo">
                        </div>
                      </td>
                      <td style="vertical-align: middle">{{ $channel->name }}</td>
                      <td style="vertical-align: middle">{{ $channel->description_short }}</td>
                      <td class="d-flex" style="flex:shrink; vertical-align:middle;">
                        <a class="mr-3" href="{{ route('admin.channel.show', $channel->id) }}" style="padding: 21px 0px;">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill="#6c5ecf" style="width:20px; height:20px;">
                            <path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM432 256c0 79.5-64.5 144-144 144s-144-64.5-144-144s64.5-144 144-144s144 64.5 144 144zM288 192c0 35.3-28.7 64-64 64c-11.5 0-22.3-3-31.6-8.4c-.2 2.8-.4 5.5-.4 8.4c0 53 43 96 96 96s96-43 96-96s-43-96-96-96c-2.8 0-5.6 .1-8.4 .4c5.3 9.3 8.4 20.1 8.4 31.6z"/></svg>
                        </a>
                        <a class="mr-3" href="{{ route('admin.channel.edit', $channel->id) }}" style="padding: 21px 0px;">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="#2fff75" style="width:20px; heaight:20px;">
                            <path d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"/></svg>
                        </a>
                        <form action="{{ route('admin.channel.destroy', $channel->id) }}" method="post" style="padding: 21px 0px;">
                          @csrf
                          @method('delete')
                          <button type="submit" style="background: transparent; border:none; outline:none">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="#ea5f5f" style="width:20px; heaight:20px;">
                            <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                          </button>
                          
                        </form>
                      </td>
                    </tr>
                    <tr class="expandable-body d-none">
                      <td colspan="5">
                        <div style="display: none;">
                        <!-- Channel preview -->
                          <div class="d-flex align-items-center mb-2">
                            <div class="image">
                              <img class="mr-5" src="{{ asset('storage/app/' . $channel->logo) }}" style="width:50px; height:50px; border-radius:50%;" alt="Channel logo">
                              
                            </div>
                            <p class="mr-5">{{ $channel->name }}</p>
                            <p>{{ $channel->description_short }}</p>
                          </div>
                          <video class="mb-2"  src="{{ $channel->stream }}"
                                  width="380px"
                                  controls
                                  preload="auto"
                                  poster="{{ asset('storage/app/' . $channel->poster) }}">
                            <source src="{{ $channel->stream }}">
                          </video>
                          <p class="mb-2">{{ $channel->name }}</p>
                          <p class="mb-2">{{ $channel->description_full }}</p>
                        <!-- / Channel preview -->
                        </div>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

          
          </div>
</div>


  @endsection