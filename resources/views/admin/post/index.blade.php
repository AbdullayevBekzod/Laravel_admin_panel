@extends('layouts.admin_layout');

@yield('title', 'All Posts');

@section('content')

 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">All Posts</h1>
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
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
        
              <!-- Default box -->
              <div class="card">
                <div class="card-body p-0">
                  <table class="table table-striped projects">
                      <thead>
                          <tr>
                              <th style="width: 1%">
                                  ID
                              </th>
                              <th style="width: 20%">
                                  Name
                              </th>
                              <th style="width: 20%">
                                Category
                            </th>
                           
                            <th style="width: 20%">
                                Created at
                            </th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($posts as $post)
                       
                          <tr>
                              <td>
                                  {{ $post['id'] }}
                              </td>

                              <td>
                                {{ $post['title'] }}
                              </td>

                              <td>
                                {{ $post->category['title'] }}
                              </td>

                              <td>
                                {{ $post['updated_at'] }}
                              </td>
                            
                              <td class="project-actions text-right">
                                
                                  <a class="btn btn-info btn-sm" href={{ route('post.edit', $post['id']) }}>
                                      <i class="fas fa-pencil-alt">
                                      </i>
                                      Edit
                                  </a>
                                  <form action="{{ route('post.destroy', $post ['id']) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                        <i class="fas fa-trash"></i>
                                        Delete
                                    </button>
                                  </form>
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
        
            </section>
            <!-- /.content -->
          </div>
    </div><!-- /.container-fluid -->
  </section>
@endsection