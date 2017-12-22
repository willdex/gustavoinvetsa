<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>INVETSA</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  {!!Html::script('js/jQuery-2.1.4.min.js')!!}
  {!!Html::script('js/jquery.freezeheader.js')!!}

  {!!Html::style('css/bootstrap-datetimepicker.css')!!} 
  
  {!!Html::style('css/bootstrap.css')!!}
  {!!Html::style('css/font-awesome.css')!!}
  {!!Html::style('css/AdminLTE.css')!!}

  {!!Html::style('css/_all-skins.css')!!}
  {!!Html::style('css/bootstrap-select.min.css')!!}
  {!!Html::style('css/alertify.css')!!}
  {!!Html::style('css/default.css')!!}
  {!!Html::style('css/cargando.css')!!}

    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="apple-touch-icon" href="{{asset('images/logo.png')}}">
    <link rel="shortcut icon" href="{{asset('images/logo.png')}}">

  </head>
  <body class="hold-transition skin-blue sidebar-mini">

    <div class="wrapper">  <!--hidden="" aca va el hidden del cargando-->

      <header class="main-header">
        <!-- Logo -->
        <a href="http://www.grayhatcorp.com" target="_blank" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>IN</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>INVETSA</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!--small class="bg-yellow">Admin:</small-->
                  <span style="text-transform: uppercase;">{{Auth::user()->nombre}} {{Auth::user()->apellido}}</span>                                   
                </a>   
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">   
                    <p>
                        Usuario: <b>ADMINISTRADOR</b>
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <!--li class="user-footer">
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Cerrar</a>
                    </div>
                  </li-->

                </ul>
              </li>
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="{!!URL::to('logout')!!}"> <i class="fa fa-power-off"></i> SALIR</a>   
              </li>

            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
                    
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <!--li class="header"></li-->
        @if(Auth::user()->privilegio == 1) 
            <!--li class="treeview">
              <a href="{!!URL::to('usuario')!!}">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span>USUARIOS</span>
              </a>
            </li-->   

            <li class="treeview">
              <a href="{!!URL::to('sistema_integral_monitoreo')!!}">
                <i class="fa fa-cog" aria-hidden="true"></i>
                <span>Sim Aves (Integral de Monitoreo)</span>
              </a>
            </li>   
            <li class="treeview">
              <a href="{!!URL::to('hoja_de_verificacion')!!}">
                <i class="fa fa-cog" aria-hidden="true"></i>
                <span>Hoja de Verificación</span>
              </a>
            </li>   
            <li class="treeview">
              <a href="{!!URL::to('maquina_twin_shot')!!}">
                <i class="fa fa-cog" aria-hidden="true"></i>
                <span>Informe de Servicio Mantenimiento<br>        Máquina Twin Shot</span> <?php //con alt+255 genero los espacios en blanco ?>            
              </a>
            </li>  
            <li class="treeview">
              <a href="{!!URL::to('maquina_spravac')!!}">
                <i class="fa fa-cog" aria-hidden="true"></i>
                <span>Mantenimiento Máquina Spravac</span>
              </a>
            </li>  
            <li class="treeview">
              <a href="{!!URL::to('maquina_zootec')!!}">
                <i class="fa fa-cog" aria-hidden="true"></i>
                <span>Mantenimiento Máquina Zootec</span>
              </a>
            </li>  
            <li class="treeview">
              <a href="{!!URL::to('empresa')!!}">
                <i class="fa fa-building" aria-hidden="true"></i>
                <span>EMPRESA</span>
              </a>
            </li>  
            <li class="treeview">
              <a href="{!!URL::to('GuardarSIM')!!}">
                <i class="fa fa-cog" aria-hidden="true"></i>
                <span>SIM</span>
              </a>
            </li>      
            <li class="treeview">
              <a href="{!!URL::to('Spravac')!!}">
                <i class="fa fa-cog" aria-hidden="true"></i>
                <span>SPRAVAC</span>
              </a>
            </li>  
            <li class="treeview">
              <a href="{!!URL::to('Zootec')!!}">
                <i class="fa fa-cog" aria-hidden="true"></i>
                <span>ZOOTEC</span>
              </a>
            </li>                                                                                             
            <!--li class="treeview">
              <a href="#">
                <i class="fa fa-align-left"></i>
                <span>REPORTES</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{!!URL::to('reporte_gastos')!!}"><i class="fa fa-money"></i>Gastos</a></li>
                <li><a href="{!!URL::to('reporte_motista_com_mas_pedidos')!!}"><i class="fa fa-bicycle"></i>Motista con mas pedido</a></li>
                <li><a href="{!!URL::to('reporte_empresa_com_mas_pedidos')!!}"><i class="fa fa-building"></i>Empresa con mas pedido</a></li>
              </ul>
            </li-->                                  
             <!--li>
              <a href="#">
                <i class="fa fa-plus-square"></i> <span>Ayuda</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                <small class="label pull-right bg-yellow">IT</small>
              </a>
            </li-->          
        @else
            <li class="treeview">
              <a href="{!!URL::to('publicacion')!!}">
                <i class="fa fa-check-circle aria-hidden="true"></i>
                <span>PUBLICACION</span>
              </a>
            </li>   
        @endif 


                        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>





       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">          
          <div class="row">

            <div class="col-md-12">
              <div class="box">
                <!--div class="box-header with-border">
                  <h3 class="box-title">Sistema de Ventas</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div-->
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                                  <!--Contenido-->
                                    @yield('contenido')   
                                                               
                                  <!--Fin Contenido-->
                           </div>
                            
                    </div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>GRAY</b> HAT
        </div>
        <strong>Copyright &copy; <a href="http://www.grayhatcorp.com" target="_blank" style="color:#880D5F ">GrayHatCorp</a>.</strong> All rights reserved.
      </footer>
  </div>
  
        {!!Html::script('js/moment.js')!!}
        {!!Html::script('js/moment-with-locales.min.js')!!}
        {!!Html::script('js/herramientas.js')!!}

        {!!Html::script('js/bootstrap.js')!!}
        {!!Html::script('js/bootstrap-select.min.js')!!}
        {!!Html::script('js/alertify.js')!!}

        {!!Html::script('js/app.js')!!}
              
       {!!Html::script('js/bootstrap-datetimepicker.min.js')!!} 
  </body>
</html>
