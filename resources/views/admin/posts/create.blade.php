@extends('admin.layout')


@section('header')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">POSTS
            <small class="m-0 text-gray"> Crear publicación </small>
            </h1>
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><i class="nav-icon fas fa-tachometer-alt"></i><a href="{{ route('admin') }}">Inicio</a></li>
              <li class="breadcrumb-item"><i class="nav-icon fas fa-list"></i><a href="{{ route('admin.posts.index') }}">Posts</a></li>
              <li class="breadcrumb-item active">Crear</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
@stop


@section('content')

<script>
  var msg = '{{Session::get('alert')}}';
  var exist = '{{Session::has('alert')}}';
  if(exist){
    alert(msg);
  }
</script>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-8" align="center">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
             
              </div>
              <!-- /.card-header -->
              <!-- form start -->


              <form role="form" method="POST" action="{{ route('admin.posts.store') }}">
              {{ csrf_field() }}



                <div class="card-body">
                  <div class="form-group">
                    <label>Titulo de la publicación</label>

                  <input type="text" name="idnp" id="idnp" value="{{$idnp}}">

                    <input type="text" name="published_at" value="{{ $date }}" class="form-control float-right" id="reservation" hidden>

                    <input name="título" value="{{ old('título') }}"  type="text" class="form-control" placeholder="Ingrese aquí el título de la publicación">

                {!! $errors->first('título','<h5><span class="badge badge-danger">:message</span></h5>')!!}
         
            </div>
                       
          <!--buttom-->
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Guardar publicación</button>
          </div>
          
                
                <!-- /.card-body -->

          

            </div>
            <!-- /.card -->

     

  
          </div>
            <!-- Main content -->
  

              
                 
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
         
            
                     
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


@stop



@push('styles')

<!-- summernote -->
<link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.css') }}">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="{{ asset('adminlte/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
<!-- dropzone styles -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css">

@endpush

@push('scripts')

<!-- Summernote -->
<script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('adminlte/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
<!--dropzone -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>



<script>
  $(function () {
    // Summernote
    $('#editor').summernote()
  });

   //Initialize Select2 Elements
   $('.select2').select2({
      theme: 'bootstrap4'
      
    });

    





</script>

@endpush
