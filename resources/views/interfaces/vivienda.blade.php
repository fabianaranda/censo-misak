@extends('layouts.menu2')

@section('content')

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/icheck-bootstrap@3.0.1/icheck-bootstrap.min.css" />
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/icheck-bootstrap@3.0.1/icheck-bootstrap.min.css" />
<link rel="stylesheet" href="css/estilos_pie_pagina.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="/js/sweetalert2@9.js"></script>
<link href="css/admin.css" rel="stylesheet" type="text/css" />



<!--\\\\\\\ contentpanel start\\\\\\-->
<div class="pull-left breadcrumb_admin clear_both">
    <div class="pull-left page_title theme_color">
        <h1>@lang('CENSO POBLACIONAL')</h1>
        <h2 class=""> @lang('Vivienda')</h2>
    </div>
    <div class="pull-right">
        <ol class="breadcrumb">
            <li><a href="#"> @lang('Inicio')</a></li>
            <li><a href="#"> @lang('Censo Poblacional')</a></li>
            <li class="active"> @lang('Vivienda')</li>
        </ol>
    </div>
</div>

<div class="container">
    <!-- Indicador de proceso -->
    <div class="col-md-3 col-sm-4 col-xs-12 ">

        <iframe frameborder="0" width="100%" scrolling="no" height="245" src="/menu-lateral/0">

        </iframe>
    </div>
    <!-- Formulario -->
    <div class="col-md-9 ">
    <div class="ContenedorFormularioCenso">
      <div class="titulo_informacion">
      <div class="table-container table-responsive-md">
          <table>
              <tbody>
                  <tr>
                     <td style="width:3px;"></td>
                     <td title="Censo vivienda de familia Misak">
                          <table class="estatic">
                              <tbody>
                                  <tr>
                                     <td><b href=""> @lang('VIVIENDA MISAK')</b></td>
                                  </tr>
                            </tbody>
                        </table>
                    </td>
                    <td style="width:3px;"></td>
                    <td title="Censo del Hogar Misak  ">
                        <table class="active">
                            <tbody>
                                <tr>
                                    <td>
                                        <b href="">@lang('HOGAR MISAK') </b>
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </td>
                    <td style="width:3px;"></td>
                    <td title="Miembros de la familia   Misak ">
                        <table class="active">
                            <tbody>
                                <tr>
                                    <td><b href="">@lang('FAMILIA MISAK')</b></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td title="Información de la persona que viven dentro de la familia ">
                        <table class="active">
                            <tbody>
                                <tr>
                                    <td>
                                        <b href="">@lang('PERSONAS MISAK')  </b>
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </td>
                    <td style="width:3px;"></td>
                    <td title="Información de la persona que viven dentro de la familia ">
                        <table class="active">
                            <tbody>
                                <tr>
                                    <td>
                                        <b href="">@lang('INFORMACIÓN PERSONA') </b>
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </td>
                    <td style="width:3px;"></td>
                    <td title="Nivel educativo  que tiene  la persona que vive en la familia">
                        <table class="active">
                            <tbody>
                                <tr>
                                    <td>
                                        <b href="">@lang('NIVEL EDUCATIVO') </b>
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
</div>



        <div class="color_infor noPrint" style="margin-top: 15px;">
            <span class="color_infor  noPrint">@lang('Usted se encuentra en:') &nbsp;&nbsp; @lang('Sistema de Informacion Poblacional Misak') &gt; <font color="#666666"> @lang('Censo Vivienda -SIPEMP:') </font></span>
        </div>
      </div>

      <div class="panel panel-default">
          <div class="well resume-module module-jobs">
              <h2 class="module-title">
                   @lang('Vivienda')
              </h2>
              <div class="js-box-laboral-experience" id="experiencia-laboral">
                  <h3 class="h4"> @lang('Ingresar Informacion de la Vivienda')</h3>
                  <div class="module-collapsible collapse in" aria-expanded="true">
                      <div class="module-summary-wrapper laboral-experience">
                          <p class="text-muted">

                              @lang('Si el habitante es dueño de la propietario , Ingresar los siguientes datos al sistema de información poblacional Misak -SIPEMP')</p>
                      </div>
                  </div>
              </div>
          </div>


          <div class="panel-collapse collapse in" id="collapse4" style="height: auto;">
              <div class="panel-body">

                  <div class="subtitle-edit-add-hv module-subtitle">


                      <a class="cta-module-cancel js-cta-cancel">
                          <i class=" fa fa-times-circle-o icon-cancel" aria-hidden="true"></i>
                          <div class="btn-help">
                          </div>
                      </a>
                  </div>

                  {{-- Control de errores --}}
                  <div class="card-body">
                      @if ($errors->any())
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      @endif

                      <form id="vivienda" method="POST" action="{{ route('vivienda.store') }}">

                          @csrf
                        <input type="hidden" id="id_vivienda" name="id_vivienda" value="0">
                          <div class="col-md-12">

                                  <div class="titulo_informacion text-wrap">

                                      <h5>  @lang('Todos los campos son obligatorios')&nbsp;<small></small></h5>
                                  </div>

                                  <div class="row">
                                      {{-- Ubicación vivienda --}}
                                      <div class="col-md-5">
                                          <div id="wetasphalt">
                                              <div class="form-group input-group-sm">
                                                  <div class="titulo_de_formulaario">* Ubicación de La vivienda:
                                                  </div>
                                                  <div class="radio icheck-wetasphalt">
                                                      <input type="radio" id="wetasphalt1" name="wetasphalt"
                                                          value="1" required="" />
                                                      <label for="wetasphalt1">Al lado del rio</label>
                                                  </div>
                                              </div>
                                              <div class="form-group input-group-sm">
                                                  <div class="radio icheck-wetasphalt">
                                                      <input type="radio" checked id="wetasphalt2" name="wetasphalt"
                                                          value="2" required="" />
                                                      <label for="wetasphalt2">A lado de la carretera </label>
                                                  </div>
                                              </div>
                                              <div class="form-group input-group-sm">
                                                  <div class="radio icheck-wetasphalt">
                                                      <input type="radio" checked id="wetasphalt3" name="wetasphalt"
                                                          value="3" required="" />
                                                      <label for="wetasphalt3">En ladera o en filos de cerro
                                                      </label>
                                                  </div>
                                              </div>
                                          </div>
                                          
                                          <div class="row">
                                              <div class="col-md-6">
                                                  <div class="form-group input-group-sm">
                                                      <label for="numero_familias">Número de Familias</label>
                                                      <input id="numero_familias" name="numero_familias" type="number" class="form-control" min="0" required>
                                                  </div>
                                                  <div class="form-group input-group-sm">
                                                      <label for="cuartos_usados">Cuartos Usados</label>
                                                      <input id="cuartos_usados" name="cuartos_usados" type="number" class="form-control" min="0" required>
                                                  </div>
                                              </div>

                                              <div class="col-md-6">
                                                  <div class="form-group input-group-sm">
                                                      <label for="numero_cuertos">Numero de Cuartos</label>
                                                      <input id="numero_cuertos" name="numero_cuertos" type="number" class="form-control" min="0" required>
                                                  </div>

                                              </div>
                                          </div>  
                                      </div>

                                      {{-- Servicios de la vivienda --}}
                                      <div class="col-md-7">
                                          <div class="titulo_informacion text-wrap">
                                              <h6> @lang('Servicios en la Vivienda')</h6>
                                          </div>
         
                                          <div class="row">
                                              <div class="col-md-6">

                                                  <label  for="suministro_agua">Sistema de suministro de agua</label>
                                                  <select name="suministro_agua" id="suministro_agua" class="form-control" required>
                                                      <option value="">Seleccione...</option>
                                                      @foreach($suministro_agua as $key => $suministro_agua)
                                                          <option value="{{$key}}"> {{$suministro_agua}}</option>
                                                      @endforeach
                                                  </select>

                                                  <label for="servicio_energia">¿Que tipo de servicio de energía?</label>
                                                  <select id="servicio_energia" name="servicio_energia" class="form-control" required>
                                                      <option value="">Seleccione...</option>
                                                      @foreach($servicio_energia as $key => $servicio_energia)
                                                          <option value="{{$key}}"> {{$servicio_energia}}</option>
                                                      @endforeach
                                                  </select>
                                              </div>

                                              <div class="col-md-6">
                                                  <label for="servicio_internet">¿Tiene Servicio de internet? (fijomóvil)</label>
                                                  <select name="servicio_internet" id="servicio_internet" class="form-control" required>
                                                      <option value="">Seleccione...</option>
                                                      <option value="SI">SI</option>
                                                      <option value="NO">NO</option>
                                                  </select>

                                                  <label for="servicio_sanitario">¿Cuenta con Servicio sanitario?</label>
                                                  <select name="servicio_sanitario" id="servicio_sanitario" class="form-control" required>
                                                      <option value="">Seleccione...</option>
                                                      @foreach($servicio_sanitario as $key => $servicio_sanitario)
                                                          <option value="{{$key}}"> {{$servicio_sanitario}}</option>
                                                      @endforeach
                                                  </select>
                                                  <br>
                                              </div>
                                          </div>
                                      </div> 
                                  </div>   

                                  <div class="row">
                                      {{-- Informacion de la infraestructura de la casa --}}
                                      <div class="col-md-6">
                                          <div class="titulo_informacion text-wrap">
                                              <h6> @lang('Servicios en la Vivienda')</h6>
                                          </div>

                                          <div class="row">
                                              <div class="col-md-6">

                                                  <label for="material_paredes">Seleccione el Material pared:</label>
                                                  <select name="material_paredes" id="material_paredes" class="form-control"  required>
                                                      <option value="">Seleccione...</option>
                                                      @foreach($material_paredes as $key => $material_paredes)
                                                          <option value="{{$key}}"> {{$material_paredes}}</option>
                                                      @endforeach
                                                  </select>

                                                  <label for="material_piso"> Seleccione el Material piso:</label>
                                                  <select name="material_piso" id="material_piso" class="form-control"  required>
                                                      <option value="">Seleccione...</option>
                                                      @foreach($material_piso as $key => $material_piso)
                                                          <option value="{{$key}}"> {{$material_piso}}</option>
                                                      @endforeach
                                                  </select>

                                                  <label for="estado_conservacion">Estado de conservación de la Vivienda: </label>
                                                  <select name="estado_conservacion" id="estado_conservacion" class="form-control" required="">
                                                      <option value="">Seleccione...</option>
                                                      <option value="Excelente">Excelente</option>
                                                      <option value="Bueno">Bueno</option>
                                                      <option value="Malo">Malo</option>
                                                  </select>

                                                  <label for="forma_casa">¿Cual es la Forma de la casa?</label>
                                                  <select name="forma_casa" id="forma_casa" class="form-control" required>
                                                      <option value="">Seleccione...</option>
                                                      <option value="Cuadrada">Cuadrada</option>
                                                      <option value="Rectangular">Rectangular</option>
                                                      <option value="En ele">En ele</option>
                                                      <option value="En o">En o</option>
                                                      <option value="En u">En u</option>
                                                      <option value="Circular">Circular</option>
                                                  </select>

                                              </div>
                                              <div class="col-md-6">

                                                  <label for="material_cocina">Seleccione Material Cocina:</label>
                                                  <select name="material_cocina" id="material_cocina" class="form-control"  required>
                                                      <option value="">Seleccione...</option>
                                                      @foreach($material_cocina as $key => $material_cocina)
                                                          <option value="{{$key}}"> {{$material_cocina}}</option>
                                                      @endforeach
                                                  </select>

                                                  <label for="material_techo">Seleccione Material Techo:</label>
                                                  <select name="material_techo" id="material_techo" class="form-control" required>
                                                      <option value="">Seleccione...</option>
                                                      @foreach($material_techo as $key => $material_techo)
                                                      <option value="{{$key}}"> {{$material_techo}}</option>
                                                      @endforeach

                                                  </select>

                                                  <label for="periodo_construccion">Período de construcción:</label>
                                                  <select name="periodo_construccion" id="periodo_construccion" class="form-control" required>
                                                      <option value="">Seleccione...</option>
                                                      <option value="10 años">Hace 5 años </option>
                                                      <option value="10 años">hace 10 años</option>
                                                      <option value="15 años">hace 15 años</option>
                                                      <option value="20 años">hace 20 años</option>
                                                      <option value="25 años">hace 25 años</option>
                                                      <option value="30 años">hace 30 años</option>
                                                      <option value="40 años">hace 40 años</option>
                                                      <option value="50 en adelante">50 años en adelante
                                                      </option>
                                                  </select>

                                                  <label for="tamaño_casa">Área (tamaño) de la Vivienda:</label>
                                                  <select name="tamaño_casa" id="tamaño_casa" class="form-control"  required>
                                                      <option value="">Seleccione...</option>
                                                      <option value="10m²">10m²</option>
                                                      <option value="15m²">15m²</option>
                                                      <option value="25m²">25m²</option>
                                                      <option value="30m²">30m²</option>
                                                      <option value="35m²">35m²</option>
                                                      <option value="40m²">40m²</option>
                                                      <option value="40m² en adelante ">40m²  en adelante</option>
                                                  </select>
                                                  <br>
                                              </div>
                                          </div>
                                      </div>
                                      {{-- Direccion de la casa --}}
                                      <div class="col-md-6">
                                          <div class="titulo_informacion">
                                              <h6> @lang('Dirección de la vivienda')</h6>
                                          </div>
                                          <div id="ubicacionDiv" class="row" style="display: none;">
                                            <input class="form-control" id="ubicacionInput" type="text" style="text-align: center;" disabled>                                            
                                          </div>
                                        
                                          <div class="row">
                                              <div class="col-md-6">
                                                  <label for="departamento">Seleccione Departamento:</label>
                                                  <select name="departamento" id="departamento" class="form-control">
                                                      <option value="">Seleccione...</option>
                                                      @foreach($departamento as $key => $departamento)
                                                          <option value="{{$key}}"> {{$departamento}}</option>
                                                      @endforeach
                                                  </select>
              
              
                                                  <label for="municipio">Seleccione Municipio:</label>
                                                  <select name="municipio" id="municipio" class="form-control">
                                                    <option value="">Seleccione...</option>
                                                  </select>
              
                                                  <label for="resguardo">Seleccione Resguardo:</label>
                                                  <select name="resguardo" id="resguardo" class="form-control">
                                                    <option value="">Seleccione...</option>
                                                  </select>
              
                                              </div>
              
              
                                              <div class="col-md-6">
              
                                                  <label for="zona">Seleccione zona:</label>
                                                  <select name="zona" id="zona" class="form-control">
                                                    <option value="">Seleccione...</option>
                                                  </select>
              
                                                  <label for="vereda">Seleccione vereda:</label>
                                                  <select name="vereda" id="vereda" class="form-control">
                                                    <option value="">Seleccione...</option>
                                                  </select>
              
                                                  <label for="sector">Seleccione sector :</label>
                                                  <select name="sector" id="sector" class="form-control">
                                                    <option value="">Seleccione...</option>
                                                  </select>
                                              </div> 
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>


                  <!---------------------->
                  <div class="row">
                      <div class="col-md-12">

                          <div class="pull-right botones-pies">


                             {{-- <button type="button" class="btn btn-danger btn-xs" onclick="location.href='{{ url('Hogar') }}'">Cancelar</button>--}}

                              <input type="submit" class="btn btn-success btn-xs" value=" @lang('GUARDAR Y CONTINUAR')" id="boton">

                          </div>

                      </div>
                  </div>

                      </form>
              </div>
          </div>
      </div>
    </div>
    <!--FIN ContenedorMenuHojaVida-->
</div>

<div id="ConfirmAction" class="modal" tabindex="-1" role="dialog">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
                  <h5 class="modal-title">Confirmar Acción</h5>
              </div>
              <div class="modal-body">
                  <p>¿Esta seguro que desea realizar esta acción?</p>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                  <button type="button" class="btn btn-primary" id="btnConfirmar">Confirmar</button>
              </div>
          </div>
      </div>
  </div>

<script>

let vivienda = {!!($vivienda)!!};    

$(document).ready(() => { 

    window.onbeforeunload = function() { return "Your work will be lost."; };
  //eventos
  let formVivienda = $('#vivienda');
  let modalConfirm = $('#ConfirmAction');
  formVivienda.submit((e) => { 
      e.preventDefault();
      modalConfirm.modal('show');
  });

  $('#btnConfirmar').click((e) => { 
      e.preventDefault();
      // formVivienda.unbind('submit').submit()
      var url = formVivienda.attr('action');
      var type = formVivienda.attr('method');
      $.ajax({
          type: type,
          url:  `${url}`,
          data: formVivienda.serialize(),
          dataType: 'json',
          success: (response) => {
              if (response.validate) {

                    setTimeout(() => {
                        Swal.fire('Exito', 'Se ha guardado con éxito, el proceso continuara en breves segundos.', 'success');
                    }, 200);

                  setTimeout(function() {
                      location.href = '/censo-poblacional/vivienda/'+response.id+'/familia';
                  }, 2000);
              } else if(response.errors) {
                    let mensaje='';
                    if(response.errors){
                        $.map(response.errors, (value, index)=>{
                            mensaje+=value+'\n';
                        });
                    }else{
                        mensaje = "Ocurrio un error al procesar la información, Comuniquese con el administrador."
                    }
                    setTimeout(() => {
                         Swal.fire('Advertencia', mensaje, 'warning');
                    }, 200);
              }else{
                  setTimeout(() => {
                    Swal.fire('Error', 'Se genero un problema a la hora de guardar', 'error');
                  }, 200);
              }
          },
      }).always(() => {
          modalConfirm.modal('hide');
      });
  });
  

  $('#departamento').change(function() {
      var departamentoID = $(this).val();
      if (departamentoID) {
          $.ajax({
              type: "GET",
              url: "{{url('get-municipio-list')}}?codigo_departamento=" + departamentoID,
              success: function(res) {
                  if (res) {
                      $("#municipio").empty();
                      $("#municipio").append('<option value="">Seleccione Municipio</option>');
                      $.each(res, function(key, value) {
                          $("#municipio").append('<option value="' + key + '">' + value +
                              '</option>');
                      });

                  } else {
                      $("#municipio").empty();
                  }
              }
          });
      } else {
          $("#municipio").empty();
          $("#resguardo").empty();
      }
  });


  $('#municipio').on('change', function() {
      var municipioID = $(this).val();
      if (municipioID) {
          $.ajax({
              type: "GET",
              url: "{{url('get-resguardo-list')}}?codigo_municipio=" + municipioID,
              success: function(res) {
                  if (res) {
                      $("#resguardo").empty();
                      $("#resguardo").append('<option value="">Seleccione Resguardo </option>');
                      $.each(res, function(key, value) {
                          $("#resguardo").append('<option value="' + key + '">' + value +
                              '</option>');
                      });

                  } else {
                      $("#resguardo").empty();
                  }
              }
          });
      } else {
          $("#resguardo").empty();
          $("#zona").empty();
      }
  });


  $('#resguardo').on('change', function() {
      var resguardoID = $(this).val();
      if (resguardoID) {
          $.ajax({
              type: "GET",
              url: "{{url('get-zona-list')}}?codigo_resguardo=" + resguardoID,
              success: function(res) {
                  if (res) {
                      $("#zona").empty();
                      $("#zona").append('<option value="">Seleccione Zona</option>');
                      $.each(res, function(key, value) {
                          $("#zona").append('<option value="' + key + '">' + value +
                              '</option>');
                      });

                  } else {
                      $("#zona").empty();
                  }
              }
          });
      } else {
          $("#zona").empty();
          $("#vereda").empty();
      }
  });

  $('#zona').on('change', function() {
      var zonaID = $(this).val();
      if (zonaID) {
          $.ajax({
              type: "GET",
              url: "{{url('get-vereda-list')}}?codigo_zona=" + zonaID,
              success: function(res) {
                  if (res) {
                      $("#vereda").empty();
                      $("#vereda").append('<option value="">Seleccione Vereda</option>');
                      $.each(res, function(key, value) {
                          $("#vereda").append('<option value="' + key + '">' + value +'</option>');
                      });

                  } else {
                      $("#vereda").empty();
                  }
              }
          });
      } else {
          $("#vereda").empty();
          $("#sector").empty();
      }
  });

  $('#vereda').on('change', function() {
      var veredaID = $(this).val();
      if (veredaID) {
          $.ajax({
              type: "GET",
              url: "{{url('get-sector-list')}}?codigo_vereda=" + veredaID,
              success: function(res) {
                  if (res) {
                  $("#sector").empty();
                  $("#sector").append('<option value="">Seleccione Sector</option>');
                  $.each(res, function(key, value) {
                      $("#sector").append('<option value="' + key + '">' + value +
                          '</option>');
                  });

                  } else {
                      $("#sector").empty();
                  }
              }
          });
      } else {
          $("#sector").empty();
      }
  });

  if(vivienda.length!=0){
      $('#id_vivienda').val(vivienda.id);
      cargarFormulario();
  }   

  //funciones

});

function cargarFormulario(){
  let wetasphalt=$('#wetasphalt :input[value="'+vivienda.wetasphalt+'"]');
  wetasphalt.prop('checked', true);

  $('#numero_familias').val(vivienda.numero_hogares);
  $('#numero_cuertos').val(vivienda.numero_cuertos);
  $('#cuartos_usados').val(vivienda.cuartos_usados);
  $('#suministro_agua').val(vivienda.suministro_agua_id);
  $('#servicio_internet').val(vivienda.servicio_internet);
  $('#servicio_energia').val(vivienda.servicio_energia_id);
  $('#servicio_sanitario').val(vivienda.servicio_sanitario_id);
  $('#material_paredes').val(vivienda.material_paredes_id);
  $('#material_cocina').val(vivienda.material_cocina_id);
  $('#material_piso').val(vivienda.material_piso_id);
  $('#material_techo').val(vivienda.material_techo_id);
  $('#estado_conservacion').val(vivienda.estado_conservacion);
  $('#periodo_construccion').val(vivienda.periodo_construccion);
  $('#forma_casa').val(vivienda.forma_casa);
  $('#tamaño_casa').val(vivienda.tamaño_casa);

  $('#ubicacionInput').val(vivienda.nombre_depatamento+' '+vivienda.nombre_municipio+' '+vivienda.nombre_reguardo+' '+vivienda.nombre_zona+' '+vivienda.nombre_vereda+' '+vivienda.nombre_sector);  
  $('#ubicacionDiv').show();
  /*$('#departamento').val(vivienda.codigo_departamento).change();
  //$('#departamento option[value='+vivienda.codigo_departamento+']').attr('selected',true);
  //$('#departamento').change();
  $('#municipio').val(vivienda.codigo_municipio);
  //$('#municipio').change();
  $('#resguardo').val(vivienda.codigo_resguardo);
  //$('#resguardo').change();
  $('#zona').val(vivienda.codigo_zona);
  //$('#zona').change();
  $('#vereda').val(vivienda.codigo_vereda);
  //$('#vereda').change();
  $('#sector').val(vivienda.codigo_sector);*/
}
</script>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
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