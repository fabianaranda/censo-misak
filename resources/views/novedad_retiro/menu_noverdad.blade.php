@extends('layouts.menu')

@section('content')
<link rel="stylesheet" href="css/estilos_pie_pagina.css">
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

    
<section>
 
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
   <!--<div class="hr-line"></div>-->
   <div class="col-lg-12 col-sm-12 text-center group_zonas" style="padding-bottom:25px">
       <div class="zona-consulta col-sm-6 text-center col-lg-4" ng-class="(origenKiosco)? 'col-lg-6' : 'col-lg-4'">
           <div class="btns-consulta">
               <div class="">
                   <button type="button" class="circulo-consulta" onclick="location.href='{{ url('Buscar-Persona-Fallecido') }}'">
                       <img src="icon/datos.png" class="icon_consulta">  
                       <div class="titulo-consulta textoConsulta">
                       Novedad de retiro por fallecimiento    
                           <div class="clearfix"></div>
                       </div>
                       <div class="texto-consulta textoConsulta">
                       Si la persona a fallecido
                       </div>
                   </button>
               </div>
               
           </div>
       </div>
       <div class="zona-consulta col-sm-6 text-center col-lg-4" >
           <div class="btns-consulta">
               <div class="">
                   <button type="button" class="circulo-consulta" onclick="location.href='{{ url('Buscar-Persona-Retirar') }}'">
                       <img src="icon/big-data.png" class="icon_consulta">
                       <div class="titulo-consulta text-center textoConsulta">
                       Novedad de retiro del censo poblacional  
                           <div class="clearfix"></div>
                       </div>
                       <div class="texto-consulta textoConsulta">
                       La persona o familia que quiera   retirar  del censo poblacional.  
                       </div>
                   </button>
               </div>
               
           </div>
       </div>
       <!--
       <div class="zona-consulta col-lg-4 col-sm-6 text-center">
           <div class="btns-consulta">
               <div class="">
                   <button type="button" class="circulo-consulta" onclick="location.href='{{ url('Reporte-Educacion-Propia') }}'">
                       <img src="modules/content/img/icon_candidatos.png" class="icon_consulta">
                       <div class="titulo-consulta text-center textoConsulta">
                       Reporte de educación Propia                                       
                           <div class="clearfix">en SIPEMP</div>
                       </div>
                       <div class="texto-consulta textoConsulta">
                       Puedes visualizar la información de educación Propia  
                       </div>
                   </button>
               </div>
           </div>
       </div>

        <div class="zona-consulta col-lg-4 col-sm-6 text-center" >
           <div class="btns-consulta">
               <div class="">         
                   <button type="button" class="circulo-consulta" onclick="location.href='{{ url('Censo-general') }}'">
                       <img src="modules/content/img/icon_candidatos.png" class="icon_consulta">
                       <div class="titulo-consulta text-center textoConsulta">
                       Censo general   por  vigencia                                
                           <div class="clearfix">  </div>
                       </div>
                       <div class="texto-consulta textoConsulta">
                       Censo general de la comunidad Misak  para tramites Gubernameltales
                       </div>
                   </button>
               </div>
           </div>
       </div>

        <div class="zona-consulta col-lg-4 col-sm-6 text-center" >
           <div class="btns-consulta">
               <div class="">
                   <button type="button" class="circulo-consulta" ng-click="">
                       <img src="modules/content/img/icon_candidatos.png" class="icon_consulta">
                       <div class="titulo-consulta text-center textoConsulta">
                           Informacion Habitante                                   
                           <div class="clearfix"></div>
                       </div>
                       <div class="texto-consulta textoConsulta">
                           Consultar la informacion del habitante.
                       </div>
                   </button>
               </div>
           </div>
       </div>

        <div class="zona-consulta col-lg-4 col-sm-6 text-center" >
           <div class="btns-consulta">
               <div class="">
                   <button type="button" class="circulo-consulta" ng-click="">
                       <img src="modules/content/img/icon_candidatos.png" class="icon_consulta">
                       <div class="titulo-consulta text-center textoConsulta">
                           Informacion Habitante                                   
                           <div class="clearfix"></div>
                       </div>
                       <div class="texto-consulta textoConsulta">
                           Consultar la informacion del habitante.
                       </div>
                   </button>
               </div>
           </div>
       </div>
   </div>-->
</section>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
 
@endsection