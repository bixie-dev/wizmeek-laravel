@extends('admin.layouts.app')

@section('main-content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Repeat requests</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Map -->
    <div id="regions_div" class="col-12 mb-3" style="height: 300px;" chart-data="{{ $countByStateJSON }}"></div>
    <!-- /Map -->

    <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All repeat requests ({{ $total }})</h3>
              </div>
              <!-- ./card-header -->
              <div class="card-body">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Artist name</th>
                      <th>Song name</th>
                      <th>Total votes</th>
                      <!-- <th>Action</th> -->
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($requestGroups as $requestGroup)
                    <tr data-widget="expandable-table" aria-expanded="false" style="height:75px;">
                      <td style="vertical-align: middle">{{ $requestGroup->artist_name }}</td>
                      <td style="vertical-align: middle">{{ $requestGroup->song_name }}</td>
                      <td style="vertical-align: middle">{{ $requestGroup->total }}</td>
                      <!-- <td class="d-flex" style="flex:shrink; vertical-align:middle;">
                        <a class="mr-3" href="" style="padding: 21px 0px;">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill="#6c5ecf" style="width:20px; height:20px;">
                            <path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM432 256c0 79.5-64.5 144-144 144s-144-64.5-144-144s64.5-144 144-144s144 64.5 144 144zM288 192c0 35.3-28.7 64-64 64c-11.5 0-22.3-3-31.6-8.4c-.2 2.8-.4 5.5-.4 8.4c0 53 43 96 96 96s96-43 96-96s-43-96-96-96c-2.8 0-5.6 .1-8.4 .4c5.3 9.3 8.4 20.1 8.4 31.6z"/></svg>
                        </a>
                        </td> -->
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