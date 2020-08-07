<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<html lang="es" >

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	    
    
<link rel="icon" href="{{ asset('/images/logo_misak.png') }}" type="image/ico" />
 
    
</script><title>CABILDO INDÍGENA DE RESGUARDO DE GUAMBIA  </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link href="https://fonts.googleapis.com/css?family=Roboto:300&display=swap" rel="stylesheet">



<!------------------=========================================-------------------->
<link rel="stylesheet" href="estilos_welcome/css/estilos_pie_pagina.css">

<link rel="stylesheet" id="pearl-theme-custom-styles-css" href="./estilos_welcome/css/skin-custom.css" type="text/css" media="all">
<script type="text/javascript" src="./estilos_welcome/css/jquery.js.descarga"></script>
<link rel="stylesheet" id="pearl-theme-styles-css" href="./estilos_welcome/css/app.css" type="text/css" media="all">
 
  

<body >
  <!----------------=========================0---------------------> 	   

     <!----IDE  DE TOTAL DE LA PAGINA --------------------> 	   

     <div id="wrapper">
	 <!----------------=====================--------------------> 	   

                
    <div class="stm-header">
					           
	 <div class="stm-header__row_color stm-header__row_color_top">
		<div class="container">
        <div class="stm-header__row ">
	 <div class="stm-header__cell stm-header__cell_center">
	 <div class="stm-header__element object2943 stm-header__element_fullwidth_simple">
													
    <div class="stm-navigation " 
	style="line-height:14px;">
       . 
										  
</div>     
</div>


	<div class="stm-header__element object1745 stm-header__element_">
													
    <a href="#" data-toggle="modal" data-target="#headerModal3271" class="stm-header-popup__button btn btn_primary btn_solid stm-button_icon">
        <i class="stm-button__icon fa fa-bell-o"></i>
        
		@if (Route::has('login'))
                    <div class="top-right links">
                    @if (Auth::check())
                      
                        <a href="{{ url('/home') }}">Cerrar Sesión</a>

                    @else
                    <a href="{{ url('') }}">Inicio Sesión Administrador </a>
                        |
                    <a href="{{ url('') }}">Correo institucional</a>
                        |
                        <a href="{{ url('/login') }}">Iniciar Sesión en SIPEMP</a>
                        |
                      
                      
                    @endif
                </div>
                    @endif
    </a>
         </div>
		</div>
        </div>
       </div>
     </div>
						             
   <header>
	     <div class="pearl_sticky_holder hidden" style="height:110px"></div><div class="stm-header__row_color stm-header__row_color_center pearl_is_sticky">
		    <div class="container">
             <div class="stm-header__row stm-header__row_center">
               <div class="stm-header__cell stm-header__cell_left">
                <div class="stm-header__element object6686 stm-header__element_">
													
	             <div class="stm-logo">
		          <a href="#" title="SIEMES">
			        <img width="800" height="311" src="./estilos_welcome/images/logo_v1-1.png" class="attachment-full size-full" style="width:320Px" style="height:700px" >		
		            </a>
	           </div>
            </div>
	  </div>

	<div class="stm-header__cell stm-header__cell_right">
	     <div class="stm-header__element object2857 stm-header__element_default">
		 <div class="stm-navigation    stm-navigation__default stm-navigation__line_bottom stm-navigation__fwb">
		 	
<ul>
	<li id="menu-item-205"><a href="/">INICIO<span class="stm_mobile__dropdown"></span></a>
   
   
     <li id="menu-item-205" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-4138"><a href="#">ESPIRAL DE EDUCACIÓN<span class="stm_mobile__dropdown"></span></a>
     <ul class="sub-menu">
	<li id="menu-item-215"><a href="{{ url('') }}">Misak Universidad  </a></li>
	<li id="menu-item-210"><a target="_blank" href=""> Instituciones educativas   </a></li>
	<li id="menu-item-210"><a target="_blank" href="">Información de fondos para indignas   </a></li>

	
  </ul>
   </li>
   
   <li id="menu-item-205" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-4138"><a href="#">ESPIRAL DE COMUNICACIONES<span class="stm_mobile__dropdown"></span></a>
     <ul class="sub-menu">
	<li id="menu-item-215"><a href="{{ url('') }}">Namuy Wamp  </a></li>
	<li id="menu-item-210"><a target="_blank" href="">  </a></li>
	

	
  </ul>
   </li>



	<li id="menu-item-205" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-4138"><a href="#">ESPIRAL DE  SALUD<span class="stm_mobile__dropdown"></span></a>
     <ul class="sub-menu">
	<li id="menu-item-215"><a href="{{ url('') }}">Hospital Mama Dominga  </a></li>
	<li id="menu-item-210"><a target="_blank" href="">  </a></li>
	

	
  </ul>
   </li>
   
   <li id="menu-item-205" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-4138"><a href="#">ESPIRAL DE AMBIENTE<span class="stm_mobile__dropdown"></span></a>
     <ul class="sub-menu">
	<li id="menu-item-215"><a href="{{ url('/login') }}">Sistema SIPEMP </a></li>
	<li id="menu-item-210"><a target="_blank" href=""> </a></li>
	

	
  </ul>
   </li>


   <!--<li id="menu-item-205"><a href="/vista_inicio">____<span class="stm_mobile__dropdown"></span></li> -->
</ul>
	
           </div>
          </div>
          </div> 
      </div>
    </div>

  </div>
</div>
</header>




	             						    <!--responce -->


<div class="stm_mobile__header">
    <div class="container">
        <div class="stm_flex stm_flex_center stm_flex_last stm_flex_nowrap">
                            <div class="stm_mobile__logo">
                    <a href="" title="Home">
                        <img src="/estilos_welcome/images/logo_v1-1.png" alt="Site Logo">
                    </a>
                </div>
                        <div class="stm_mobile__switcher stm_flex_last js_trigger__click" data-element=".stm-header, .stm-header__overlay" data-toggle="false">
                <span class="mbc"></span>
                <span class="mbc"></span>
                <span class="mbc"></span>
            </div>
        </div>
    </div>
</div>

        <!--===========================
                     slider
                    ============================ --> 
<header>	
                       <!--===========================
                       ESTE CONTENEDOR  COJE TODO EL SLIDER PARA CUADAR EL  TAMAÑO
                    ============================ --> 
     
                   
	<div class="contenedor">	
      <section id="principal-slider" class="no-margen" >
        <div class="carousel slide">      
           
                <div class="item active" id="home" class="parallax-section">
				<!--
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                            	<!--
                                <div class="carousel-content">
                                    <h2 class="animation animated-item-1">SISTEMA DE INFORMACIÓN <span>ESTUDIANTES MISAK DE EDUCACIÓN SUPERIOR </span></h2>
                                    <p class="animation animated-item-2"> SIEMESA</p>
                                    
                                </div>
                            -->
                            </div>
                        </div>
                    </div> 
                </div><!--/.item-->             
            </div><!--/.carousel-inner-->
        </div><!--/.carousel-->
    </section><!--/#principal-slider-->

</div>

</header>

  <!-- Fin del cuerpo de la Pagina-->

<footer>
       <div class="contenedot_welcome">
       <div class="container-footer-all">
        
            <div class="container-body">

                <div class="colum1">
                   
                    
                     <img  tyle="width:40px" src="{{ asset('estilos_welcome/images/logo_Cab.jpg') }}" alt="">
                     <h1>Metrapsrөnkutri Mantө Kөntraincha Eshkaiwan Wentөwai Asik Isua Kusrekun</h1>

                </div>

                <div class="colum2">

                    <h1>Contacto</h1>

                    <div class="row">
                        <img src="icon/smartphone.png">
                        <label>3217452529</label>
                    </div>
                       <div class="row">
                        <img src="icon/contact.png">
                         <label>CabildoGuambia@gmail.com</label>
                    </div>
                     
                   


                </div>

                <div class="colum3">

                    <h1>Direccion</h1>

                    <div class="row2">
                        <img src="icon/house.png">
                        <label>CARRERA 2 12 25-Silvia Cauca
                        </label>
                    </div>

                   <!-- <div class="row2">
                        <img src="icon/smartphone.png">
                        <label>+1-829-395-2064</label>
                    </div>-->

                   

                </div>

            </div>
        
        </div>
        
        <div class="container-footer">
               <div class="footer">
                    <div class="copyright">
                        &copy;2020 Todos los Derechos Reservados | <a href="">Cabildo Indígena de Resguardo de Guambia </a>
                    </div>

                    <div class="informacion1">
                       <!-- <a href="">Informacion Compañia</a>--| <a href="">Privacion y Politica</a>--> | <a href="">© Desarrollado: Fabian Aranda T - Cabildo de Guambia</a>
                    </div>
                </div>

            </div>
        <div>
    </footer>
   
      
 
<!-- Javascript  para el manu celular 
================================================== -->

<script type="text/javascript" src="./estilos_welcome/js/app.js.descarga"></script>
<script type="text/javascript" src="./estilos_welcome/js/bootstrap.min.js.descarga"></script>
<script type="text/javascript" src="./estilos_welcome/js/datepicker.min.js.descarga"></script>
<script type="text/javascript" src="./estilos_welcome/js/jquery.js.descarga"></script>
<!-- Javascript  para  slider paguina principa
================================================== -->
<script src="estilos_welcome/js/jquery.js"></script>
<script src="estilos_welcome/js/jquery.backstretch.min.js"></script>
<script src="estilos_welcome/js/owl.carousel.min.js"></script>
<script src="estilos_welcome/js/wow.min.js"></script>
<script src="estilos_welcome/js/custom.js"></script>

</body>
</html>