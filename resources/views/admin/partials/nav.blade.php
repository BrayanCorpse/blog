<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>




<script type="text/javascript">

    
    $("#blog").click(function() {
  
    $("#vp").addClass("nav-item has-treeview menu-open")

    
  });

});
        
    </script>-->

<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-close">
            <a href="{{route('admin')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Inicio
                <i class="right fas fa-angle-left"></i>
              </p>
            </a> 
            </ul>
          </li>

        
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" id="blog">
          <li id="vp" class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas  fa-blog"></i>
              <p>
                Blog
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.posts.index') }}" class="nav-link" id="pos">
                  <i class="fas fa-eye nav-icon"></i>
                  <p>Ver todos los post</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.posts.create') }}" class="nav-link">
                <i class="fa fa-clone nav-icon"></i>
                  <p>Crear un post</p>
                </a>
              </li>
            </ul>
            </ul>
          </li>

        
      <!---    <li class="nav-header">EXAMPLES</li>
          
          <li class="nav-header">MISCELLANEOUS</li>
         
          <li class="nav-header">LABELS</li>-->
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>