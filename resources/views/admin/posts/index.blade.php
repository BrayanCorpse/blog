@extends('admin.layout')


@section('header')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">POSTS
            <small class="m-0 text-gray"> Listado </small>
            </h1>
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><i class="nav-icon fas fa-tachometer-alt"></i><a href="{{ route('admin') }}">Inicio</a></li>
              <li class="breadcrumb-item active">Posts</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
@stop

@section('content')

<!-- Main content -->

          <div class="card ">
            <div class="card-header">
              <h3 class="card-title">Listado de publicaciones</h3>

              <div class="form-group">
                 <a href="{{ route('admin.posts.create') }}" ><button class="btn btn-primary" style="float:right;" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>  Crear publicación</button></a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="posts-table" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Título</th>
                  <th>Extracto</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($posts as $post)
                <tr>
                  <td>{{ $post->id }}</td>
                  <td>{{ $post->title }}</td>
                  <td>{{ $post->excerpt }}</td>

                  <td>
                  <a href="{{ route('posts.show', $post) }}" class="btn btn-dark"
                  target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>
                  
                  <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-info"><i class="fa fa-cogs" aria-hidden="true"></i></a>
                  
                  <form method="POST" action="{{ route('admin.posts.destroy', $post) }}" style="display: inline">
                    {{ csrf_field() }} {{ method_field('DELETE') }}

                    <button  class="btn btn-danger" onclick="return confirm('Estas seguro de eliminar esta publicación?')"><i class="fa fa-times-circle" aria-hidden="true"></i></button>

                  </form>

                  

                  </td>

                </tr>
                @endforeach
    
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Título</th>
                  <th>Extracto</th>
                  <th>Acciones</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->


@stop

@push('styles')

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">


@endpush

@push('scripts')


<script>
  $(function () {
    $('#posts-table').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>


<!-- Modal -->


@endpush



