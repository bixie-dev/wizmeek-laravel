@extends('admin.layouts.app')

@section('main-content')

<style>
    .clipboard__copy{
        background: none;
        border:none;
    }
</style>


    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Early access codes</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <div class="col-3 mb-3">
        <a href="{{ route('admin.eac.create') }}" class="btn btn-block btn-primary">Generate</a>
    </div>

          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List of EAC codes</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Code</th>
                      <th>Generated</th>
                      <th>User registration</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($eacs as $eac)
                    <tr>
                        <td style="vertical-align: middle">{{ $eac->id }}</td>
                        <td class="" style="vertical-align: middle">
                            <div class="d-flex">
                                <div class="eac_code" eac-data="{{ $eac->eac }}">{{ $eac->eac }}</div>
                            
                                <!-- <button class="ml-3 clipboard__copy" eac-data="{{ $eac->eac }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512">
                                        <path d="M502.6 70.63l-61.25-61.25C435.4 3.371 427.2 0 418.7 0H255.1c-35.35 0-64 28.66-64 64l.0195 256C192 355.4 220.7 384 256 384h192c35.2 0 64-28.8 64-64V93.25C512 84.77 508.6 76.63 502.6 70.63zM464 320c0 8.836-7.164 16-16 16H255.1c-8.838 0-16-7.164-16-16L239.1 64.13c0-8.836 7.164-16 16-16h128L384 96c0 17.67 14.33 32 32 32h47.1V320zM272 448c0 8.836-7.164 16-16 16H63.1c-8.838 0-16-7.164-16-16L47.98 192.1c0-8.836 7.164-16 16-16H160V128H63.99c-35.35 0-64 28.65-64 64l.0098 256C.002 483.3 28.66 512 64 512h192c35.2 0 64-28.8 64-64v-32h-47.1L272 448z"/>
                                    </svg>
                                </button> -->
                            </div>
                        </td>
                      <td style="vertical-align: middle">{{ date("H:i d.m.Y", strtotime($eac->created_at)) }}</td>
                      @if(count($eac->users_multiple_reg) > 0)
                        <td style="vertical-align: middle">{{ count($eac->users_multiple_reg) }}</td>
                      @else
                        @if(!$eac->user_id)
                          <td style="vertical-align: middle">No user yet</td>
                        @else
                          <td style="vertical-align: middle">{{ date("H:i d.m.Y", strtotime($eac->updated_at)) }}</td>
                        @endif
                      @endif

                      @if($eac->multiple_registrations == '1')
                        <td style="vertical-align: middle"><p class="text-success">Multiple</p></td>
                      @else
                        @if(!$eac->user_id)
                          <td style="vertical-align: middle"><p class="text-danger">Not registered</p></td>
                        @else
                          <td style="vertical-align: middle"><p class="text-success">Registered</p></td>
                        @endif
                      @endif

                      <td class="d-flex" style="flex:shrink; vertical-align:middle;">
                        <a class="mr-3" href="{{ route('admin.eac.show', $eac->id) }}" style="padding: 21px 0px;">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill="#6c5ecf" style="width:20px; height:20px;">
                            <path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM432 256c0 79.5-64.5 144-144 144s-144-64.5-144-144s64.5-144 144-144s144 64.5 144 144zM288 192c0 35.3-28.7 64-64 64c-11.5 0-22.3-3-31.6-8.4c-.2 2.8-.4 5.5-.4 8.4c0 53 43 96 96 96s96-43 96-96s-43-96-96-96c-2.8 0-5.6 .1-8.4 .4c5.3 9.3 8.4 20.1 8.4 31.6z"/></svg>
                        </a>
                        <!-- <a class="mr-3" href="{{ route('admin.eac.delete', $eac->id) }}" style="padding: 21px 0px;">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="#ea5f5f" style="width:20px; heaight:20px;">
                            <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                        </a> -->
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
    
@endsection