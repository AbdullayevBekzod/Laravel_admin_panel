@extends('layouts.admin_layout');

@yield('title', 'Add post');

@section('content')

 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Add post</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
      @if (session('success'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
        </div>   
      @endif
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary p-3">
                    <!-- form start -->
                    <form role="form" action="{{ route('post.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name of the post</label>
                                <input type="text" class="form-control" name="title" id="exampleInputEmail1" placeholder="Enter name of post..." required>
                            </div>
                            <div class="form-group">
                                <label>Select category</label>
                                <select name="cat_id" class="form-control">
                                  @foreach ( $categories as $category )
                                    <option value="{{ $category['id'] }}">{{ $category['title']}}</option>
                                  @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                              <textarea name="text" class="editor"></textarea>
                            </div>
                           <div class="form-group">
                              <label for="feature_image">Feature Image</label>
                              <img src="" alt="" class="img-uploaded" style="display: block;">
                              <input type="text" class="form-control" id="feature_image" name="feature_image" value="" readonly>
                              <a href="" class="popup_selector" data-inputid="feature_image">Select Image</a>

                           </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Add Post</button>
                        </div>
                    </form>
                  </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
  </section>
@endsection