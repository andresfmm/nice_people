    <!doctype html>
    <html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css"> 
        <link href="css/app.css" rel="stylesheet" type="text/css">
        <link href="css/own.css" rel="stylesheet" type="text/css">
        <link href="css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css"> 
        <link rel="stylesheet" href="css/fontawesome-all.css">
        <link href="css/sweetalert.css" rel="stylesheet" type="text/css">
        <link href="css/toast.css" rel="stylesheet" type="text/css">

    </head>
    <body>
      <div id="root" >
        @if(Auth::guest())
         <nav class="navbar navbar-expand-lg navbar-light sticky-top"     style="background-color: white; ">
            <a class="navbar-brand" href="#">
               <img src="img/logo.png"  class="d-inline-block align-top" alt="">
            </a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto text-cabecera" style="margin:0 auto;color: grey;">
                @if(!Auth::guest() && Auth::user()->rol == 'administrador')
                <li class="nav-item" >
                  <router-link to="/panel"  tag="a" class="nav-link letra-negra">panel</router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/registrar-empleado"  tag="a" class="nav-link letra-negra">Registrar Empleado
                  </router-link>
                </li>
                @endif

                @if(!Auth::guest() && Auth::user()->rol == 'empleado')
                <li class="nav-item" >
                  <router-link to="/mis-servicios"  tag="a" class="nav-link letra-negra">Mis Servicios</router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/mis-datos"  tag="a" class="nav-link letra-negra">Mis Datos
                </router-link>
                </li>
                <li class="nav-item">
                  <a href="#" data-toggle="modal" class="nav-link letra-negra" data-target="#changepass">Cambiar Clave
                  </a>
                </li>

              @endif




              @if(!Auth::guest() && Auth::user()->rol == 'usuario')
                <li class="nav-item" >
                  <router-link to="/panel"  tag="a" class="nav-link letra-negra">Reportar abuso</router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/registrar-empleado"  tag="a" class="nav-link letra-negra">Mis Datos
                </router-link>
                </li>
                @endif


                @if(Auth::guest())
                <li class="nav-item  col-sm-6">
                  <router-link to="login"  tag="a" class="nav-link letra-negra" data-ancla="inicio" href="#inicio">Iniciar Sesion
                  </router-link>
                </li>
                @endif

            </ul>
            @if(Auth::guest())
              <li class="nav-item d-none d-sm-block" style="list-style:none;" >
                <a  class="nav-link  btn btn-primary hidden-md-up" style="font-size: 0.9em; color:white;">Nice people consulting</a>
              </li>
            @endif
        </div>
    </nav>
    @endif


    
    @if(Auth::check())
    <!-- ancla que hacemos -->
    <A name="inicio" id="inicio" > </A> 
            <nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color: white; ">
                <a class="navbar-brand" href="#">
               <img src="img/logo.png"  class="d-inline-block align-top" alt="">
            </a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto text-cabecera" style="margin:0 auto;color: grey;">
                
                @if(!Auth::guest() && Auth::user()->User == 'administrador')
                  <li class="dropdown nav-item" >
                    <a class="dropdown-toggle letra-negra nav-link " data-toggle="dropdown" href="#" >Gestionar usuarios
                      <span class="caret"></span></a>
                      <ul class="dropdown-menu dropdown-menu-left">
                        
                        <li class="nav-item" >
                        <router-link to="/usuarios"  tag="a" class="nav-link letra-negra">Crud usuarios</router-link>
                        </li>
                        <li class="nav-item">
                         <a  data-toggle="modal" class="nav-link letra-negra mouse-pointer" data-target="#createUser">Crear usuario</a>
                       </li>
                      </ul>
                    </li>
                  
                  <li class="dropdown nav-item" >
                    <a class="dropdown-toggle letra-negra nav-link " data-toggle="dropdown" href="#" >Gestionar proyectos
                      <span class="caret"></span></a>
                      <ul class="dropdown-menu dropdown-menu-left">
                        
                        <li class="nav-item" >
                        <router-link to="/admin-proyectos"  tag="a" class="nav-link letra-negra">Crud proyecto</router-link>
                        </li>
                        <li class="nav-item">
                         <a  data-toggle="modal" class="nav-link letra-negra mouse-pointer" data-target="#createUser">Crear proyecto</a>
                       </li>
                      </ul>
                    </li>
                  <li class="nav-item">
                        <router-link to="/tareas"  tag="a" class="nav-link letra-negra">tareas
                  </router-link></li>
                  <li class="nav-item">
                        <router-link to="/comentarios"  tag="a" class="nav-link letra-negra">comentarios
                  </router-link></li>
                @endif

                @if(!Auth::guest() && Auth::user()->rol == 'empleado')
                  <li class="nav-item" >
                  <router-link to="/mis-servicios"  tag="a" class="nav-link letra-negra">Mis Servicios</router-link>
                  </li>
                  <li class="nav-item">
                        <router-link to="/mis-datos"  tag="a" class="nav-link letra-negra">Mis Datos
                  </router-link></li>
                  <li class="nav-item">
                  <a href="#" data-toggle="modal" class="nav-link letra-negra" data-target="#changepass">Cambiar Clave</a>
                  </li>

                @endif




                @if(!Auth::guest() && Auth::user()->rol == 'usuario')
                  <li class="nav-item" >
                  <router-link to="/panel"  tag="a" class="nav-link letra-negra">Reportar abuso</router-link>
                  </li>
                  <li class="nav-item">
                        <router-link to="/registrar-empleado"  tag="a" class="nav-link letra-negra">Mis Datos
                  </router-link></li>
                @endif


                @if(Auth::guest())
                <li class="nav-item">
                    <router-link to="login"  tag="a" class="nav-link letra-negra" data-ancla="inicio" href="#inicio">Login</router-link>
                </li>
                
                
                @endif

            </ul>
            @if(Auth::guest())
            <li class="nav-item " style="list-style:none;">
                <router-link to="registro"  tag="a" class="nav-link  btn btn-primary" style="font-size: 0.9em; color:white;">Registrese como empleador</router-link>
            </li>
            @endif
        </div>
    </nav>
    @endif



     @if(Auth::check())
     @if(Auth::user()->User)
    <nav class="navbar navbar-expand-lg  letra-banca padding-sub-nav" style="background-color: black;">
            <div class="collapse navbar-collapse">
               <ul class="navbar-nav mr-auto">
               <li class="nav-item">
                   <a href="#" class="letra-banca nav-link">{{Auth::user()->User}}</a></li> 
               </ul>
                <ul class="navbar-nav float-derecha" style="right: 10px !important;">   
                  <li class="dropdown nav-item" >
                    <a class="dropdown-toggle letra-banca nav-link " data-toggle="dropdown" href="#" >{{Auth::user()->name}} 
                      <span class="caret"></span></a>
                      <ul class="dropdown-menu dropdown-menu-left">
                        <!-- <li class="nav-item">
                        <router-link to="/registrar-empleado"  tag="a" class="nav-link letra-negra">Registrar Empleado
                        </router-link></li> -->
                        <li class="nav-item" onclick="salir();"><a class="nav-link letra-negra" href="#">Cerrar Sesion</a></li>
                      </ul>
                    </li>

            </ul>
        </div>
    </nav>
    @endif
    @endif




    





    <transition name="page" mode="out-in">
      <keep-alive>
       <router-view></router-view>
      </keep-alive>
    </transition>
</div>

<script src="js/app.js"></script>
<script src="js/blockUI.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTable.bootstra4.min.js"></script>
<script src="js/sweetalert.js"></script>
<script src="js/own.js"></script>
</body>
</html>
