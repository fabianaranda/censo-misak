@extends('layouts.menu')

@section('content')
<link rel="stylesheet" href="css/estilos_pie_pagina.css">
<!--\\\\\\\ contentpanel start\\\\\\-->
<div class="pull-left breadcrumb_admin clear_both">
    <div class="pull-left page_title theme_color">
        <h1>Actualizacion</h1>
        <h2 class="">Menu</h2>
    </div>
    <div class="pull-right">
        <ol class="breadcrumb">
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Actualizacion</a></li>
            <li class="active">Menu</li>
        </ol>
    </div>
</div>


<div class="container">
    
    <section>

        <div class="col-lg-12 col-sm-12 text-center" style="padding-bottom:25px">
            
            <div class="zona-consulta col-sm-6 text-center col-lg-4" ng-class="(origenKiosco)? 'col-lg-6' : 'col-lg-4'">
                <div class="btns-consulta">
                    <div class="">
                        <button type="button" class="circulo-consulta"
                            onclick="location.href='{{ url('Actualizacion-informacion-general') }}'">
                            <img src="icon/actualizar.png" class="icon_consulta">
                            <div class="titulo-consulta textoConsulta">
                                Actualizar Datos
                                <div class="clearfix"></div>
                            </div>
                            <div class="texto-consulta textoConsulta">
                                Puede actualizar los datos generales de la persona que se encuentra dentro del SIPEMP
                            </div>
                        </button>
                    </div>
    
                </div>
            </div>
    
            <div class="zona-consulta col-sm-6 text-center col-lg-4">
                <div class="btns-consulta">
                    <div class="">
                        <button type="button" class="circulo-consulta"
                            data-toggle="modal" data-target="#modal_buscar_codigo_familia">
                            <img src="icon/misak.ico" class="icon_consulta">
                            <div class="titulo-consulta text-center textoConsulta">
                                Ingresar persona en el núcleo familiar
                                <div class="clearfix"></div>
                            </div>
                            <div class="texto-consulta textoConsulta">
                                Puedes ingresar otro miembro de la familia Misak dentro del núcleo de hogar
                            </div>
                        </button>
                    </div>
    
                </div>
            </div>
    
            <div class="zona-consulta col-lg-4 col-sm-6 text-center">
                <div class="btns-consulta">
                    <div class="">
    
                        <button type="button" class="circulo-consulta"
                            onclick="location.href='/censo-poblacional'">
                            <img src="icon/persona.jpg" width="100" class="icon_consulta">
                            <div class="titulo-consulta text-center textoConsulta">
                                Ingresar nuevo núcleo familiar
                                <div class="clearfix">en SIPEMP</div>
                            </div>
                            <div class="texto-consulta textoConsulta">
                                Conformación de nuevo nucleo familiar
                            </div>
                        </button>
                    </div>
                </div>
            </div>
    <!--
            <div class="zona-consulta col-lg-4 col-sm-6 text-center">
                <div class="btns-consulta">
                    <div class="">
                        <button type="button" class="circulo-consulta" onclick="location.href='/censo-poblacional'">
                            <img src="modules/content/img/icon_candidatos.png" class="icon_consulta">
                            <div class="titulo-consulta text-center textoConsulta">
                                Ingresar familia-persona dentro del censo poblacional
                                <div class="clearfix"> </div>
                            </div>
                            <div class="texto-consulta textoConsulta">
                                Ingreso de Nuevos habitantes dentro del censo poblacional Misak SIPEMP.
                            </div>
                        </button>
                    </div>
                </div>
            </div>
       </div>-->
    <br>
    <br>
    <br>
       <div class="modal fade" id="modal_buscar_codigo_familia" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg">
              <div class="modal-content  ">
                    <div class="modal-header">
                    <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
                    <h4 class="modal-title">Consultar la información de código de la familia, ingresado el número
                          de identificación de la persona que está a cargo de la casa </h4>
                    </div>
                    <div class="modal-body">
    
                    <div id="contenido_modal_confirm_alumno_matriculado">
    
    
                          <!----------------=========================0--------------------->
    
                          <!----BUSCAR CODIGO VIVIENDA POR DOCUMENTO DE INDENTIDAD -------------------->
    
                          <div class="subir_informacion_general">
                                <div class="container clearfix">
                                      <div class="col-sm-4 topmargin-sm">
    
                                            <form id="searchPersona" class="form_cunsulta" method="POST" role="Informacion_General">
                                                  @csrf
                                                  <div id="consulta_externa">
                                                  <label>Ingresar el número de identificación de la persona </label><br>
                                                  <input id="nuip" name="documento" class="form-control"
                                                        placeholder="Digíte el número sin puntos ni comas"
                                                        title="El nùmero de cèdula debe ser de 2 a 10 dígitos" autocomplete="off" required>
                                                  <span class="animated fadeIn"></span>
                                                  </div>
                                                  <br>
                                                  <div class="nobottommargin tright">
                                                  <input type="submit" id="boton" name="enviar" value="Buscar"
                                                        class="boton tab-linker btn-block">
                                                  </div>
                                            </form>
                                      </div>
    
                                      <div class="col-sm-8 topmargin-sm text-center">
                                            <h5>Detalle Del codigo </h5>
                                            <div class="table-responsive-md">
                                                  <table class="table text-center" id="persona">
                                                        <thead>
                                                              <tr>
                                                                <th>Documento</th>
                                                                <th>Nombres</th>
                                                                <th>Apellidos</th>
                                                                <th>Acción</th>
                                                              </tr>
                                                            </thead>
                                                        <tbody>
    
                                                        </tbody>
                                                  </table>
                                            </div> 
                                      </div>
                                </div>
                          </div>
                    </div><!-- FIN DEL contenido_modal_confirm_alumno_matriculado-->
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <!---->
                    </div>
              </div><!-- /.modal-content -->
        </div>
    </div>
    
    </section>

</div>

<script>

    $(document).ready(function () {
        
        let formSearchPersona = $('#searchPersona');

        formSearchPersona.submit((e) => {
            e.preventDefault();
            $.ajax({
                    type: "POST",
                    url: "{{ route('persona.vivienda') }}",
                    data: formSearchPersona.serialize(),
                    success: (response) => {
                        if(!response.status){
                                Swal.fire(
                                    'Error',
                                    response.mensaje,
                                    'error',
                                );
                        }else{
                                let row = `<tr>
                                                <td>${response.result.docomento_persona}</td>
                                                <td>${response.result.nombres}</td>
                                                <td>${response.result.apellidos}</td>
                                                <td><a href="censo-poblacional/vivienda/${response.id_vivienda}/familia/${response.id_familia}/miembros">Ir al nucleo</a></td>
                                            </tr>`;
                                
                                $('#persona>tbody').html(row);
                        }
                    }
            });
        });

    });

</script>

@endsection