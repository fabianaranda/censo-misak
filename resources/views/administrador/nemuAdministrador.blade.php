@extends('layouts.menu')

@section('content')

      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>NOVEDADES</h1>
          <h2 class="">Menu</h2>
        </div>
        <div class="pull-right">
          <ol class="breadcrumb">
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Novedades</a></li>
            <li class="active">Menu</li>
          </ol>
        </div>
      </div>	

    
<section style="padding: 10rem 0;">

<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="zona-consulta col-sm-6 text-center col-lg-4" ng-class="(origenKiosco)? 'col-lg-6' : 'col-lg-4'">
                <div class="btns-consulta">
                    <div class="">
                        <button type="button" class="circulo-consulta" onclick="location.href='{{ url('Menu-Usuarios') }}'" > 
                            <img src="icon/marketing.png" class="icon_consulta">  
                            <div class="titulo-consulta textoConsulta">
                            Usuarios del sistema SIPEMP
                                <div class="clearfix"></div>
                            </div>
                            <div class="texto-consulta textoConsulta">
                            ingresar usuarios en el sistema de información poblacional SIPEMP
                            </div>
                        </button>
                    </div>
                    
                </div>
            </div>
            <div class="zona-consulta col-sm-6 text-center col-lg-4" >
                <div class="btns-consulta">
                    <div class="">
                        <button type="button" class="circulo-consulta" onclick="location.href='{{ url('Validacion') }}'">
                            <img src="icon/big-data.png" class="icon_consulta">
                            <div class="titulo-consulta text-center textoConsulta">
                            Validacion de retiro del censo poblacional  
                                <div class="clearfix"></div>
                            </div>
                            <div class="texto-consulta textoConsulta">
                            Varidar retiro de censo Poblacional Misak SIPEMP  
                            </div>
                        </button>
                    </div>
                </div>
         </div>
    </div>
</div>

</section>

@endsection