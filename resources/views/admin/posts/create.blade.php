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


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-8">
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

<input name="idnp" type="text" value="{{ $idnp }}" >

                    <input name="título" value="{{ old('título') }}"  type="text" class="form-control" placeholder="Ingrese aquí el título de la publicación">
            
                {!! $errors->first('título','<h5><span class="badge badge-danger">:message</span></h5>')!!}
         
            </div>
                  
                  <div class="form-group">
                    <label>Contenido publicación</label>
                    <textarea name="contenido"  id="editor" rows="15" class="form-control" placeholder="Ingresa el contenido completo de la publicación"
                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('contenido') }}</textarea>
                  </div>
                  <p class="text-sm mb-0">
                Editor <a href="https://github.com/bootstrap-wysiwyg/bootstrap3-wysiwyg">Documentation and license
                information.</a>
              </p>

              {!! $errors->first('contenido','<h5><span class="badge badge-danger">:message</span></h5>')!!}

                </div>
                
                <!-- /.card-body -->

          

            </div>
            <!-- /.card -->

     

  
          </div>
            <!-- Main content -->
  
          <!-- left column -->
          <div class="col-md-4">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
         
              </div>
              <!-- /.card-header -->

              <div class="card-body">
                     <!-- Date range -->
    
              

                  <div class="form-group">
                  <label>Fecha de publicación:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="text" name="published_at" value="{{ $date }}" class="form-control float-right" id="reservation" readonly>
                  </div>
                  <!-- /.input group -->
                </div>

<!--combo-->
                <div class="form-group">
                  <label>Categorías</label>
                  <select name="category" class="form-control " style="width: 100%;">
                    <option value="">Selecciona una categoría</option>
                 @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category')  == $category->id ? 'selected' : "" }}>{{ $category->name}}</option>
                 @endforeach
                  </select>
       {!! $errors->first('category','<h5><span class="badge badge-danger">:message</span></h5>')!!}

                </div>
                <!-- /.form-group -->

                <div class="form-group">
                  <label>Etiquetas</label>
                  <select name="tags[]" class="select2" multiple="multiple" data-placeholder="Selecciona una o más etiquetas"
                          style="width: 100%;">
                   @foreach($tags as $tag)
                   <option {{ collect(old('tags'))->contains($tag->id) ? 'selected' : "" }} value="{{ $tag->id }}">{{ $tag->name }}</option>
                   @endforeach
                  </select>

{!! $errors->first('tags','<h5><span class="badge badge-danger">:message</span></h5>')!!}

                </div>
                
              <!-- form start -->
           
                <div class="form-group">
                    <label>Extracto publicación</label>
                    <textarea name="extracto"  rows="4" class="form-control" placeholder="Ingresa un extracto de la publicación">{{ old('extracto') }}</textarea>
                  
       {!! $errors->first('extracto','<h5><span class="badge badge-danger">:message</span></h5>')!!}
     
                  </div>

                  <div class="form-group">

                  <input class="form-control" id="Archivo" type="file" name="Archivo">

                  </div>

<!--buttom-->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block">Guardar publicación</button>
                </div>
                 
                  <!-- input states 
                  <div class="form-group">
                    <label class="control-label" for="inputSuccess"><i class="fas fa-check"></i> Input with
                      success</label>
                    <input type="text" class="form-control is-valid" id="inputSuccess" placeholder="Enter ...">
                  </div>
                  <div class="form-group">
                    <label class="control-label" for="inputWarning"><i class="far fa-bell"></i> Input with
                      warning</label>
                    <input type="text" class="form-control is-warning" id="inputWarning" placeholder="Enter ...">
                  </div>
                  <div class="form-group">
                    <label class="control-label" for="inputError"><i class="far fa-times-circle"></i> Input with
                      error</label>
                    <input type="text" class="form-control is-invalid" id="inputError" placeholder="Enter ...">
                  </div>

                -->
                 
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
