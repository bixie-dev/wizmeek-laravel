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
        <a href="{{ route('admin.channel.edit', $channel->id) }}" class="btn btn-block btn-primary">Edit channel</a>
    </div>

          <div class="col-10">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{ $channel->name }}</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">

                    
                  </div>
                </div>
              </div>

              <!-- List of songs -->
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">List of songs</h3>
      
                      <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
      
                          <div class="input-group-append">
                            <a href="{{ route('admin.repeatrequests.create', ['channel_id' => $channel->id]) }}" type="submit" class="btn btn-default">
                              Add new
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                      <table class="table table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Performer</th>
                            <th>Song Name</th>
                            <th>Date of creation</th>
                          </tr>
                        </thead>
                        <tbody>
                          @if(count($songList))
                            <?php $i = 1; ?>
                            @foreach ($songList as $item)
                              <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $item['performer'] }}</td>
                                <td>{{ $item['song_name'] }}</td>
                                <td>{{ date('F d, Y', strtotime($item['created_at'])) }}</td>
                              </tr>
                              <?php $i++; ?>
                            @endforeach
                          @endif
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
              </div>
              <!-- // List of songs -->

              <!-- Chat Messages -->
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Chat messages</h3>
      
                      <div class="card-tools">
                        <form class="input-group input-group-sm" style="width: 150px; margin-bottom:5px;" method="get">
                          
                          <input  type="text" 
                                  name="chat_message" 
                                  class="form-control float-right" 
                                  placeholder="Search"
                                  value="{{ request()->input('chat_message') ? request()->input('chat_message') : '' }}">
      
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                              <i class="fas fa-search"></i>
                            </button>
                          </div>
                        </form>
                        {{ $chatMessages->links('admin.pagination.tablepagination') }}
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                      <table class="table table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @if(count($chatMessages))
                            <?php $i = 1; ?>
                            @foreach ($chatMessages as $message)
                              <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $message['user_name'] }}</td>
                                <td>{{ $message['message'] }}</td>
                                <td>{{ $message['date'] }}</td>
                                <td>
                                  <form action="{{ route('admin.chatmessages.delete') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="message_id" value="{{ $message['message_id'] }}">
                                    <button type="submit" class="btn btn-block btn-danger btn-sm">Delete</button>
                                  </form>
                                
                                </td>
                              </tr>
                              <?php $i++; ?>
                            @endforeach
                          @endif
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
              </div>

              
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
</div>


  @endsection