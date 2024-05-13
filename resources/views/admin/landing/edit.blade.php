@extends('admin.layouts.app')

@section('main-content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Landing page texts</h1>
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
                            <li class="nav-item"><a class="nav-link" href="#soon" data-toggle="tab">Coming soon</a></li>
                            <li class="nav-item"><a class="nav-link" href="#priority" data-toggle="tab">Our Priority</a></li>
                            <li class="nav-item"><a class="nav-link" href="#cases" data-toggle="tab">Cases</a></li>
                            <li class="nav-item"><a class="nav-link" href="#solution" data-toggle="tab">Solution</a></li>
                            <li class="nav-item"><a class="nav-link" href="#process" data-toggle="tab">Process</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">

                            <!-- Tab #1 - Main Screen -->
                            <div class="tab-pane active" id="main">
                                <form action="{{ route('admin.landing.update') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('patch')
                                    <div class="form-group">
                                        <label>Main screen heading</label>
                                        <p>Include part of the text into <code>&ltspan&gtSome text&lt/span&gt</code> to make it violet on landing page</p>
                                        <textarea name="main_heading" class="form-control">{{ $landing->main_heading }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Main screen text</label>
                                        <textarea name="main_text" class="form-control">{{ $landing->main_text }}</textarea>
                                    </div>
                                    <div class="form-group col-5">
                                        <label>Choose an image</label>
                                        @error('main_img')
                                            <p>{{ $message }}</p>
                                        @enderror
                                        <div class="custom-file">
                                            <input type="file" name="main_img" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile"></label>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-info">Submit</button>
                                        <a href="{{ route('admin.panel') }}" class="btn btn-default">Cancel</a>
                                    </div>
                                </form>
                            </div>

                            <!-- Tab#2 - Coming soon Screen -->
                            <div class="tab-pane" id="soon">
                                <form action="{{ route('admin.landing.update') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('patch')
                                    <div class="form-group">
                                        <label>Coming Soon screen heading</label>
                                        <textarea name="soon_heading" class="form-control">{{ $landing->soon_heading }}</textarea>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-info">Submit</button>
                                        <a href="{{ route('admin.panel') }}" class="btn btn-default">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        
                            <!-- Tab #3 - Cases Screen -->
                            <div class="tab-pane" id="cases">
                                <form action="{{ route('admin.landing.update') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('patch')
                                    <div class="form-group">
                                        <label>Cases screen heading</label>
                                        <textarea name="cases_heading" class="form-control">{{ $landing->cases_heading }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Cases screen description</label>
                                        <textarea name="cases_description" class="form-control">{{ $landing->cases_description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Case #1 heading</label>
                                        <textarea name="case1_heading" class="form-control">{{ $landing->case1_heading }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Case #1 text</label>
                                        <textarea name="case1_text" class="form-control">{{ $landing->case1_text }}</textarea>
                                    </div>
                                    <div class="form-group col-5">
                                        <label>Choose an image</label>
                                        <div class="custom-file">
                                            <input type="file" name="case1_img" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile"></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Case #2 heading</label>
                                        <textarea name="case2_heading" class="form-control">{{ $landing->case2_heading }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Case #2 text</label>
                                        <textarea name="case2_text" class="form-control">{{ $landing->case2_text }}</textarea>
                                    </div>
                                    <div class="form-group col-5">
                                        <label>Choose an image</label>
                                        <div class="custom-file">
                                            <input type="file" name="case2_img" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile"></label>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-info">Submit</button>
                                        <a href="{{ route('admin.panel') }}" class="btn btn-default">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        
                            <!-- Tab #4 - Solution Screen -->
                            <div class="tab-pane" id="solution">
                                <form action="{{ route('admin.landing.update') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('patch')
                                    <div class="form-group">
                                        <label>Solution screen heading</label>
                                        <textarea name="solution_heading" class="form-control">{{ $landing->solution_heading }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Solution screen text</label>
                                        <textarea name="solution_text" class="form-control">{{ $landing->solution_text }}</textarea>
                                    </div>
                                    <div class="form-group col-5">
                                        <label>Choose an image</label>
                                        <div class="custom-file">
                                            <input type="file" name="solution_img" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile"></label>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-info">Submit</button>
                                        <a href="{{ route('admin.panel') }}" class="btn btn-default">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        
                            <!-- Tab #5 - Process Screen -->
                            <div class="tab-pane" id="process">
                                <form action="{{ route('admin.landing.update') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('patch')
                                    <div class="form-group">
                                        <label>Process screen heading</label>
                                        <textarea name="process_heading" class="form-control">{{ $landing->process_heading }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Step #1 heading</label>
                                        <textarea name="process_step1_heading" class="form-control">{{ $landing->process_step1_heading }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Step #1 text</label>
                                        <textarea name="process_step1_text" class="form-control">{{ $landing->process_step1_text }}</textarea>
                                    </div>
                                    <div class="form-group col-5">
                                        <label>Choose an image</label>
                                        <div class="custom-file">
                                            <input type="file" name="process_step1_img" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile"></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Step #2 heading</label>
                                        <textarea name="process_step2_heading" class="form-control">{{ $landing->process_step2_heading }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Step #2 text</label>
                                        <textarea name="process_step2_text" class="form-control">{{ $landing->process_step2_text }}</textarea>
                                    </div>
                                    <div class="form-group col-5">
                                        <label>Choose an image</label>
                                        <div class="custom-file">
                                            <input type="file" name="process_step2_img" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile"></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Step #3 heading</label>
                                        <textarea name="process_step3_heading" class="form-control">{{ $landing->process_step3_heading }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Step #3 text</label>
                                        <textarea name="process_step3_text" class="form-control">{{ $landing->process_step3_text }}</textarea>
                                    </div>
                                    <div class="form-group col-5">
                                        <label>Choose an image</label>
                                        <div class="custom-file">
                                            <input type="file" name="process_step3_img" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile"></label>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-info">Submit</button>
                                        <a href="{{ route('admin.panel') }}" class="btn btn-default">Cancel</a>
                                    </div>
                                </form>
                            </div>

                            <!-- Tab #6 - Priority Screen -->
                            <div class="tab-pane" id="priority">
                                <form action="{{ route('admin.landing.update') }}" method="post">
                                    @csrf
                                    @method('patch')
                                    <div class="form-group">
                                        <label>Our priorities screen heading</label>
                                        <textarea name="priority_heading" class="form-control">{{ $landing->priority_heading }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Solution screen text</label>
                                        <textarea name="priority_text" class="form-control">{{ $landing->priority_text }}</textarea>
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