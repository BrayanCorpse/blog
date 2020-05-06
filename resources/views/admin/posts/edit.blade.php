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


              <form role="form" method="POST" action="{{ route('admin.posts.update', $post) }}">
              {{ csrf_field() }} {{ method_field('PUT') }}



                <div class="card-body">
                  <div class="form-group">
                    <label>Titulo de la publicación</label>
                    <input name="título" value="{{  old('título', $post->title)  }}"  type="text" class="form-control" placeholder="Ingrese aquí el título de la publicación">
            
                {!! $errors->first('título','<h5><span class="badge badge-danger">:message</span></h5>')!!}
         
            </div>
                  
                  <div class="form-group">
                    
                    <label>Contenido publicación</label>
                    <textarea name="contenido"    id="editor" rows="15" class="form-control" placeholder="Ingresa el contenido completo de la publicación"
                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('contenido', $post->body) }}</textarea>
                  </div>
                 

              {!! $errors->first('contenido','<h5><span class="badge badge-danger">:message</span></h5>')!!}

              
              <div class="form-group">
                    
                  <label>Contenido embebido (iframe)</label>
                  <textarea name="iframe"    id="editor" rows="3" class="form-control" placeholder="Ingresa el contenido embebido (iframe) de audio o video">{{ old('iframe', $post->iframe) }}</textarea>
                </div>
               

            {!! $errors->first('iframe','<h5><span class="badge badge-danger">:message</span></h5>')!!}


              
              <div class="row">
                  <div class="col-md-4">

              <div class="form-group">
               
                  <label>Fecha de publicación</label>

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
                    <!-- /.col-md-4-->
                  </div>

           

<!--combo-->  
          <div class="col-md-6">
                <div class="form-group">
                  
                  <label for="inlineFormInputGroup">Categorías</label>

                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="fa fa-bookmark" aria-hidden="true"></i></div>
                      
                  <select name="category" class="form-control " id="inlineFormInputGroup" style="width: 100%;">
                    <option value="">Selecciona una categoría</option>
                 @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category', $post->category_id)  == $category->id ? 'selected' : "" }}>{{ $category->name}}</option>
                 @endforeach
                  </select>
                </div><!--input-group-prepend -->
                 
       {!! $errors->first('category','<h5><span class="badge badge-danger">:message</span></h5>')!!}
                  </div><!--/input-group mb-2-->
                </div>
                <!-- /.form-group -->
          </div>
          <!-- /.col-md-4-->
              </div>
                  <!-- /row-->

                <div class="form-group">
                  <label>Etiquetas</label>
                  <select name="tags[]" class="select2" multiple="multiple" data-placeholder="Selecciona una o más etiquetas"
                          style="width: 100%;">
                   @foreach($tags as $tag)
                   <option {{ collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected' : "" }} value="{{ $tag->id }}">{{ $tag->name }}</option>
                   @endforeach
                  </select>

{!! $errors->first('tags','<h5><span class="badge badge-danger">:message</span></h5>')!!}

                </div>
                
              <!-- form start -->
           
                <div class="form-group">
                    <label>Extracto publicación</label>
                    <textarea name="extracto"  rows="4" class="form-control" placeholder="Ingresa un extracto de la publicación">{{ old('extracto', $post->excerpt) }}</textarea>
                  
       {!! $errors->first('extracto','<h5><span class="badge badge-danger">:message</span></h5>')!!}
     
                  </div>

                  <div class="form-group">

            <div class="dropzone"></div>

              </div>

<!--buttom-->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block">Guardar publicación</button>
                </div>
                 
                
                 
                </form>
          
           

                </div>

                

               
                
                <!-- /.card-body -->
       
                
          

              </div>
            <!-- /.card -->

      

  
          </div>
            <!-- Main content -->
            @if($post->photos->count())
          <!-- left column -->
          <div class="col-md-4">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
         
              </div>
              <!-- /.card-header -->

            
                     <!-- Date range -->
    
               
   <!-- imagenes-->
   <div class="card-body">
            <label>Imagenes de la publicación</label>
                            <br>
        @foreach($post->photos->take(5) as $photo)                  
               
          <br>
          <form method="POST" action="{{ route('admin.photos.destroy', $photo) }}">
            {{ method_field('DELETE') }} {{ csrf_field() }}
      <div align="center">
            <img class="img-responsive" width="75%"  height="75%" src="{{ $photo->url }}">
          <button class="btn btn-danger btn-sm">
          <i class="far fa-trash-alt"></i>
          </button>
          <hr>
      </div>
          </form>
          @endforeach
                  
             
         
                 
   <!-- imagenes-->

              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->

      @endif
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
  })

   //Initialize Select2 Elements
   $('.select2').select2({
      theme: 'bootstrap4'
    })


    
 var myDropzone = new Dropzone('.dropzone',{

url:'/blog/public/admin/posts/{{ $post->url }}/photos',
acceptedFiles: 'image/*',
paramName: 'photo',
maxFilesize: 2,
headers:{
  'X-CSRF-TOKEN': '{{ csrf_token() }}'
},

dictDefaultMessage: 'Arrastra las fotos aquí para subirlas'
});

myDropzone.on('error', function(file,res){
  var msg = res.photo[0];
  $('.dz-error-message:last > span').text(msg);
});



Dropzone.autoDiscover =false;


</script>

@endpush
