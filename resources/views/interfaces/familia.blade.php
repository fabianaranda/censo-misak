@extends('layouts.menu2')

@section('content')
<!--\\\\\\\ estilos css \\\\\\-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="/js/sweetalert2@9.js"></script>

<link href="css/admin.css" rel="stylesheet" type="text/css" />
<section class="cta">
    <div class="container">
        <div class="wrapper">
            <!--\\\\\\\ contentpanel start\\\\\\-->
            <div class="pull-left breadcrumb_admin clear_both">
                <div class="pull-left page_title theme_color">
                    <h1>Administrador</h1>
                    <h2 class="">Inicio</h2>
                </div>
                <div class="pull-right">
                    <ol class="breadcrumb">
                        <li><a href="#">Inicio</a></li>
                        <li><a href="#">Administrador</a></li>
                        <li class="active">Administrador</li>
                    </ol>
                </div>
            </div>

            <!-- MODAL BUSCAR  CODIGO  DE VIVIENDA -->
            <div class="modal fade" id="myModal_buscar_codigo_vivienda" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-lg">
                <div class="modal-content  ">
                    <img src="icon/Advertencia.png" width="200px">
                    <div class="modal-header">
                        <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
                        <h4 class="modal-title">Consultar la información de código de la vivienda, ingresado el número
                            de identificación de la persona que está a cargo de la casa </h4>
                    </div>
                    <div class="modal-body">

                        <div id="contenido_modal_confirm_alumno_matriculado">


                            <!----------------=========================0--------------------->

                            <!----BUSCAR CODIGO VIVIENDA POR DOCUMENTO DE INDENTIDAD -------------------->


                            <div class="subir_informacion_general">
                                <div class="container clearfix">
                                    <div class="col-sm-4 topmargin-sm">

                                        <form id="" class="form_cunsulta" name="form" action="/hogar" method="POST"
                                            role="Informacion_General" class="pocicion_formulario">
                                            {{ csrf_field() }}
                                            <div id="consulta_externa">
                                                <label>Ingresar el número de identificación de la persona </label><br>
                                                <input id="nuip" name="q" class="form-control"
                                                    placeholder="Digíte el número sin puntos ni comas"
                                                    title="El nùmero de cèdula debe ser de 2 a 10 dígitos" value=""
                                                    style="">

                                                <span class="animated fadeIn"></span>


                                            </div>

                                            <br>
                                            <div class="nobottommargin tright">
                                                <input type="submit" id="boton" name="enviar" value="Buscar "
                                                    class="boton tab-linker btn-block" style="">
                                            </div>
                                        </form>

                                    </div>

                                    <br>
                                    <br>
                                    <br>

                                    <div class="col-sm-5 topmargin-sm text-center">
                                        <h2>Detalle Del codigo </h2>

                                    </div>

                                    <div id="success" class="col-sm-5 well text-justify">

                                        <div class="table-responsive">
                                            @if(isset($details))
                                            Los Datos ingresados del estudiante : <b> {{ $query }} </b> Es :
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>DEPARTAMENTO</th>
                                                        <th>MUNICIPIO</th>
                                                        <th>RESGUARDO</th>

                                                   </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach($details as $persona)
                                                    <tr>
                                                        <<td>
                                                            </td>
                                                            <td></td>-->
                                                            <td>{{$persona-> resguardo }}</td>
                                                            <td> </td>

                                                    </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>

                                            @elseif(isset($message))
                                            <h3> {{$message}}</h3>
                                            @endif
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
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- FIN DEL MODAL  BUSCAR CODIGO DEL HOGAR-->


        <!-- INICIO DE  CODIGO DE FORMULARIO -->


        <div class="container">
            <!--Informacion menu izquierda-->
            <div class="col-md-3 col-sm-4 col-xs-12 ">

                <iframe frameborder="0" width="100%" scrolling="no" height="245" src="/menu-lateral/20">

                </iframe>
            </div>
            <!-- Fin Informacion menu izquierda-->
            <div class="col-md-9 ">
            <div class="ContenedorFormularioCenso">
                <div class="titulo_informacion">
                <div class="table-container table-responsive-md">
                    <table>
                        <tbody>
                            <tr>
                                <td style="width:3px;"></td>
                                <td title="Censo vivienda de familia Misak">
                                    <table class="active">
                                        <tbody>
                                            <tr>
                                                <td><b href="">VIVIENDA MISAK</b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>

                                <td style="width:3px;"></td>
                                <td title="Censo del Hogar Misak  ">
                                    <table class="estatic">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <b href="">HOGAR MISAK </b>
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
                                                <td><b href="">FAMILIA MISAK</b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>


                                <td title="Información de la persona que viven dentro de la familia ">
                                    <table class="active">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <b href="">PERSONAS  MISAK</b>
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
                                                    <b href="">INFORMACIÓN PERSONA </b>
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
                                                    <b href="">NIVEL EDUCATIVO </b>
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
                        <span class="color_infor  noPrint">Usted se encuentra en: </span>
                    </div>
                </div>
                <!-- FORMULARIO-->
                <div class="panel panel-default">
                    <div class="well resume-module module-jobs">
                        <h2 class="module-title">
                            Hogar
                        </h2>
                        <div class="js-box-laboral-experience" id="experiencia-laboral">
                            <h3 class="h4">Censo Hogar Misak</h3>
                            <div class="module-collapsible collapse in" aria-expanded="true">
                                <div class="module-summary-wrapper laboral-experience">
                                    <p class="text-muted">_________________________. </p>
                                </div>
                            </div>
                        </div>
                    </div>

                   
                          <!---------------------->
                  <div class="row">
                      <div class="col-md-12">

                          <div class="pull-right botones-pies">


                          <a href="/censo-poblacional/vivienda/{{ base64_encode($id_vivienda->id)}}" class="btn btn-warning">Editar vivienda anterior</a>

                          </div>

                      </div>
                  </div>
 <!-------------------------------------->
                    <div class="panel-collapse collapse in" id="collapse5" style="height: auto;">

                        <div class="panel-body">

                            <form id="familia" method="post" action="/censo-poblacional/vivienda/{{base64_encode($id_vivienda->id)}}/familia">
                                @csrf
                                <input type="hidden" id="id_hogar" name="id_hogar" value="0">
                                <div class="container">
                                    <div class="row">
                                        <div class="titulo_informacion text-wrap">
                                            <h5>Información general de la hogar&nbsp;<small> /Todos los campos son obligatorios</small></h5>
                                        </div>
                                        <div class="col-md-6">
                                            <div id='tipoPropiedad' class="form-group input-group-sm">
                                                <label><span class="asterisco">*</span>Tipo de propiedad</label>
                                                <div class="radio">
                                                    <label><input type="radio" name="tipo_propiedad" value="1" checked>Propia</label>
                                                    &nbsp;
                                                    <label><input type="radio" name="tipo_propiedad" value="2" >Arrendada</label>
                                                </div>
                                            </div>

                                            <div class="form-group input-group-sm">
                                                <div class="form-group ">
                                                    <label><span class="asterisco">*</span>Código de la vivienda</label>
                                                    <div class="clearfix"></div>
                                                    <div class="form-inline input-group-sm">
                                                        <input id="vivienda_id" name="vivienda_id" type="text" readonly=»readonly» value="{{$id_vivienda->id}}" tabindex="2" class="form-control " style="width:100px" required="">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group input-group-sm">

                                                <div class="form-group ">
                                                    <label for="numero_dormitorio"><span class="asterisco">*</span>Dormitorios</label>
                                                    <div class="clearfix"></div>
                                                    <div class="form-inline input-group-sm">
                                                        <input id="numero_dormitorio"  placeholder="Dormitorios total" name="numero_dormitorio" type="number" min="0"
                                                            value="ingresarr" class="form-control" style="width:200px"
                                                            required>

                                                        <input id="dormitorio_usado" name="dormitorio_usado" type="number"
                                                            class="form-control" value=""
                                                            style="width:200px" required="" placeholder="Dormitorios usados">

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group input-group-sm">
                                                <label style="width:300px" for="title">¿Donde preparan los
                                                    alimentos? :</label>
                                                <select name="donde_preparan_alimento" id="donde_preparan_alimento"
                                                    class="form-control" required>
                                                    <option value="">Seleccione el lugar donde preparan el alimento</option>
                                                    <option value="1">Cocina</option>
                                                    <option value="2">Sala</option>
                                                    <option value="3">Habitacion</option>
                                                    <option value="4">Patio</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="titulo_informacion">
                                            <h1>Información general de la educación propia desde el hogar </h1>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group input-group-sm">
                                                <label><span class="asterisco">*</span>¿Número de personas que estan estudiando actualmente?</label>
                                                <input id="num_personas_estudiando" name="num_personas_estudiando" type="number"
                                                    class="form-control" value="" min="0"
                                                    required>

                                            </div>
                                            <div class="form-group input-group-sm">
                                                <label for="forta_educacion_propia"><span class="asterisco">*</span>¿Como está fortaleciendo la educación propia en su familia?</label>

                                                <select id="forta_educacion_propia" name="forta_educacion_propia" class="form-control" required>
                                                    <option value="">Seleccione</option>
                                                    <option value="1">Desde la tradición oral.</option>
                                                    <option value="2">Desde la identidad cultural</option>
                                                    <option value="3">Respetando el derecho mayor</option>
                                                    <option value="4">No perdiendo el pensamiento como misak</option>
                                                    
                                                </select>
                                            </div>
                                            <div class="form-group input-group-sm">
                                                <label for="gustar_edu_propia"><span class="asterisco">*</span>¿Cómo le gustaría que fuera la educación en el pueblo Misak? </label>
                                                <select name="gustar_edu_propia" id="gustar_edu_propia"
                                                    class="form-control" required>
                                                    <option value="">Seleccione</option>
                                                    <option value="1">Desde la nachak </option>
                                                    <option value="2"> Tener en cuenta los saberes previos</option>
                                                    <option value="3 ">Desde la educación convencional </option>
                                                </select>
                                            </div>

                                            <div class="form-group input-group-sm">
                                                <label for="calidad_ie_guambia"><span class="asterisco">*</span>¿
La educación que brindan las instituciones educativas del resguardo de Guambia es
?</label>
                                                <select id="calidad_ie_guambia" name="calidad_ie_guambia" class="form-control" required>
                                                    <option value="">Seleccione</option>
                                                    <option value="1">Excelente</option>
                                                    <option value="2">Bueno</option>
                                                    <option value="3">Regular</option>
                                                    <option value="4">Malo</option>
                                                </select>

                                            </div>

                                            <div class="form-group input-group-sm">
                                                <label for="debilidades_ie_guambia"><span class="asterisco">*</span>¿Que debilidades ha visto
                                                    hasta el momento, de la educación en el pueblo Misak?.</label>
                                                <select name="debilidades_ie_guambia" id="debilidades_ie_guambia"
                                                    class="form-control" required="">
                                                    <option value="">Seleccione</option>
                                                    <option value="1">No hay modalidades que requieran los estudiantes</option>
                                                    <option value="2">Falta de motivación por parte de los padres de familia.</option>
                                                    <option value="3">Falta de medios de transporte para dirigir a las instituciones donde se requiera.</option>
                                                    <option value="4">Docentes que no contextualizan desde el pensamiento holístico </option>
                                                    <option value="5">La educación en Guambia, si cumple las necesidades de la comunidad Misak </option>
                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group input-group-sm">
                                                <label><span class="asterisco">*</span>¿Tiene  hijos estudiando en
                                                    las Instituciones Educativas del Resguardo de Guambía</label>
                                                <select name="hijos_estudiando_guambia" id="ddNoEstudiaResguardo"
                                                   class="form-control"
                                                    onchange="showNoEstudiaResguardo(this);" required>
                                                    <option value="">Seleccione</option>
                                                    <option value="1">SI</option>
                                                    <option value="0">NO</option>

                                                </select>
                                            </div>

                                            <div id="NoGustaQueEstudienGuambia"
                                                style="visibility: hidden; display: none;">
                                                <div class="form-group input-group-sm">
                                                    <label for="ddNoEstudiaResguardoEscuela"><span
                                                            class="asterisco">*</span>¿Por qué no le gusta que sus hijos
                                                        estudien en las instituciones educativas del resguardo de
                                                        Guambia?</label>

                                                    <select name="no_estudia_guambia" id="ddNoEstudiaResguardoEscuela"
                                                        class="form-control" style="display: none;">
                                                        <option value="">Seleccione</option>
                                                        <option value="1">Por qué solo enseñan lo propio</option>
                                                        <option value="2">Pierden mucho tiempo</option>
                                                        <option value="3">Los profesores no tienen buena metodología
                                                            para enseñar</option>    
                                                    </select>
                                                </div>
                                            </div>

                                            <div id="DesercionEscuela" style="visibility: hidden; display: none;">
                                                <div class="form-group input-group-sm">
                                                    <label for="ddNoEstudiaResguardoEscuela1"><span class="asterisco">*</span>¿El problema de la deserción escolar en nuestro pueblo Misak se debe a?</label>
                                                    <select name="deserción_guambia" id="ddNoEstudiaResguardoEscuela1"
                                                        class="form-control" style="display: none;">
                                                        <option value="">Seleccione</option>
                                                        <option value="1">Cambio de domicilio</option>
                                                        <option value="2">Pierde mucho el año</option>
                                                        <option value="3">No hay buena preparación académica</option>
                                                        <option value="4">Falta de motivación de los niños para
                                                            permanecer en la institución educativa </option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="titulo_informacion">
                                            <h1>Consumo de alimentos propios desde la familia </h1>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group input-group-sm">
                                                <label for="tiempo_comida_propia"><span class="asterisco">*</span>¿Cada cuánto consume
                                                    comidas propias?</label>
                                                <select id="tiempo_comida_propia" name="tiempo_comida_propia"
                                                    class="form-control" required>
                                                    <option value="">Seleccione</option>
                                                    <option value="1">Reunion familiar</option>
                                                    <option value="2">Todo los dias</option>
                                                    <option value="3">Cada semana</option>
                                                    <option value="4">Cada mes</option>
                                                    <option value="5">Nunca </option>
                                                </select>
                                            </div>
                                            <div class="form-group input-group-sm">
                                                <label for="alimenta_producto_propio"><span class="asterisco">*</span>¿Se alimenta con productos propios? </label>
                                                <select id="alimenta_producto_propio" name="alimenta_producto_propio"
                                                    class="form-control" required>
                                                    <option value="">Seleccione</option>
                                                    <option value="1">Si</option>
                                                    <option value="0">No</option>

                                                </select>
                                            </div>

                                            <div class="form-group input-group-sm">
                                                <label for="aliemnta_semillas_propio"><span class="asterisco">*</span>¿Se alimenta con semillas
                                                    nativas?</label>
                                                <select id="aliemnta_semillas_propio" name="aliemnta_semillas_propio"
                                                    class="form-control" required>
                                                    <option value="">Seleccione</option>
                                                    <option value="1">SI</option>
                                                    <option value="0">NO</option>
                                                </select>

                                            </div>

                                            <div class="form-group input-group-sm">
                                                <label for="aliemnta_cultivos_propios"><span class="asterisco">*</span>¿Se alimenta con cultivos
                                                    orgánicos? </label>
                                                <select id="aliemnta_cultivos_propios" name="aliemnta_cultivos_propios"
                                                    class="form-control" required>
                                                    <option value="">Seleccione</option>
                                                    <option value="1">SI</option>
                                                    <option value="0">NO</option>
                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group input-group-sm">
                                                <label for="ddArmonizacion"><span class="asterisco">*</span>¿Hace rituales de armonización y de equilibrio como familia? </label>
                                                <select name="rituales_armonizacion" id="ddArmonizacion"
                                                    class="form-control" onchange="showArmonizacion(this);" required>
                                                    <option value="">Seleccione</option>
                                                    <option value="1">SI</option>
                                                    <option value="0">NO</option>

                                                </select>
                                            </div>

                                            <div id="SiHaceArmonizacion" style="visibility: hidden; display: none;">
                                                <div class="form-group input-group-sm">
                                                    <label for="ddSiHaceArmonizacion"><span
                                                            class="asterisco">*</span>Cada cuanto se hace a la
                                                        armonizació</label>
                                                    <select name="tiempo_rituales" id="ddSiHaceArmonizacion" class="form-control" style="display: none;">
                                                        <option value="">Seleccione</option>
                                                        <option value="1">Cada 6 meses</option>
                                                        <option value="2">1 año </option>
                                                        <option value="3">Cada Problema Familiar
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="titulo_informacion">
                                            <h1>Información sobre la sostenibilidad económica y comidas propias que conoce la familia</h1>
                                        </div>

                                        <div id="economias" class="col-md-6">
                                            <div class="titulo_informacion">
                                                <h1>¿Su economía familiar de que depende?</h1>
                                            </div>
                                            @foreach($economia as $economia_familia)
                                            <li>
                                                <label>
                                                    {{ Form::checkbox('economia[]', $economia_familia->id, null) }}
                                                    {{ $economia_familia->nombre}}

                                                </label>
                                            </li>
                                            @endforeach
                                        </div>

                                        <div id='comidas' class="col-md-6">
                                            <div class="titulo_informacion">
                                                <h1> ¿Conoce alguna de estas comidas propias?</h1>
                                            </div>
                                            @foreach($comida as $comida_familia)
                                            <li>
                                                <label>
                                                    {{ Form::checkbox('comidas[]', $comida_familia->id, null) }}
                                                    {{ $comida_familia->nombre}}
                                                </label>
                                            </li>
                                            @endforeach
                                        </div>
                                        <br>
                                    </div>

                                    <div class="row">
                                        <div class="titulo_informacion">
                                            <h1>¿En el yatul que tipo de Plantas Tiene ?. Seleccione las plantas que tiene en el
                                                yatul. </h1>
                                        </div>

                                        <div id='condimentarias' class="col-md-3">
                                            <div class="titulo_informacion">
                                                <h1>Condimentarías </h1>
                                            </div>
                                            @foreach($plancondiaroma as $plantas_codimentarias)
                                                <li>
                                                    <label>
                                                        {{ Form::checkbox('plancondiaroma[]', $plantas_codimentarias->id, null) }}
                                                        {{ $plantas_codimentarias->nombre_codimentarias}}
        
                                                    </label>
                                                </li>
                                            @endforeach
                                        </div>

                                        <div id="aromaticas" class="col-md-3">
                                            <div class="titulo_informacion">
                                                <h1> Aromáticas </h1>
                                            </div>
                                            @foreach($plantaAromaticas as $plantaAromaticas)
                                                <li>
                                                    <label>
                                                        {{ Form::checkbox('plantaAromaticas[]', $plantaAromaticas->id, null) }}
                                                        {{ $plantaAromaticas->nombre_aromáticas}}
        
                                                    </label>
                                                </li>
                                            @endforeach
                                        </div>

                                        <div id="medicinales" class="col-md-3">
                                            <div class="titulo_informacion">
                                                <h1>Medicinales </h1>
                                            </div>
                                            @foreach($plantaMedicinal as $plantaMedicinal)
                                                <li>
                                                    <label>
                                                        {{ Form::checkbox('plantaMedicinal[]', $plantaMedicinal->id, null) }}
                                                        {{ $plantaMedicinal->nombre_medicinales}}
        
                                                    </label>
                                                </li>
                                            @endforeach
                                        </div>

                                        <div id="nutricionales" class="col-md-3">
                                            <div class="titulo_informacion">
                                                <h1> Nutricionales</h1>
                                            </div>
                                            @foreach($plantaNutricional as $plantaNutricional)
                                                <li>
                                                    <label>
                                                        {{ Form::checkbox('plantaNutricional[]', $plantaNutricional->id, null) }}
                                                        {{ $plantaNutricional->nombre_nutricionaless}}
        
                                                    </label>
                                                </li>
                                            @endforeach
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div id="espirituales" class="col-md-3">
                                            <div class="titulo_informacion">
                                                <h1> Espirituales</h1>
                                            </div>
                                            @foreach($plantaEspirituales as $plantaEspirituales)
                                            <li>
                                                <label>
                                                    {{ Form::checkbox('plantaEspirituales[]', $plantaEspirituales->id, null) }}
                                                    {{ $plantaEspirituales->nombre_espirituales}}
                                                </label>
                                            </li>
                                            @endforeach
                                            <br>
                                        </div>
                                    </div>

                                    <div class="pull-right">
                                       
                                        {{-- <a href="#collapse5"  data-parent="#accordion" data-toggle="collapse" class=""> Cerrar </a> --}}
                                        <button type="submit" class="btn btn-success" id="boton">GUARDAR Y CONTINUAR</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>



            <!-- FIN FORMULARIO-->
        </div>
        <!--FIN ContenedorMenuHojaVida-->
    </div>
    <!--FIN col-md-9-->
    </div>
    <!--FIN container-->



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
                    <p>¿Esta seguro que desea guardar la 

Información del hogar?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="btnConfirmar">Confirmar</button>
                </div>
            </div>
        </div>
    </div>




    <script type="text/javascript">
    //--Modificación para disminuir lentitud de la página y disminuir las peticiones al servidor.
    //PARA QUE APARESCAN LOS OBCIONES  CUANDO SELECCIONE  NO TENGO HIJOS ESTUDIANDO  EN LAS INSTITUICONES EDUCATIVAS DEL RESGUARDO
    function showNoEstudiaResguardo() {
        var e = document.getElementById("ddNoEstudiaResguardo");
        var strUser = e.options[e.selectedIndex].value;
        if (strUser != 1) {
            //input ¿Por qué no le gusta que sus hijos estudien en las instituciones educativas del resguardo de Guambia?
            $('#NoGustaQueEstudienGuambia').show();
            $('#NoGustaQueEstudienGuambia').css('visibility', 'visible');
            $('#ddNoEstudiaResguardoEscuela').css('display', 'block');

            //input ¿El problema de la deserción escolar    en nuestro pueblo Misak se debe a?
            $('#DesercionEscuela').show();
            $('#DesercionEscuela').css('visibility', 'visible');
            $('#ddNoEstudiaResguardoEscuela1').css('display', 'block');


        } else {
            //input ¿Por qué no le gusta que sus hijos estudien en las instituciones educativas del resguardo de Guambia?
            $('#ddNoEstudiaResguardoEscuela :nth-child(0)').prop('selected', true);
            $('#NoGustaQueEstudienGuambia').hide();
            $('#NoGustaQueEstudienGuambia').css('visibility', 'hidden');
            $('#ddNoEstudiaResguardoEscuela').css('display', 'none');
            //input ¿El problema de la deserción escolar    en nuestro pueblo Misak se debe a?
            $('#ddNoEstudiaResguardoEscuela1 :nth-child(0)').prop('selected', true);
            $('#DesercionEscuela').hide();
            $('#DesercionEscuela').css('visibility', 'hidden');
            $('#ddNoEstudiaResguardoEscuela1').css('display', 'none');
        }
    };


    function showArmonizacion() {
        var e = document.getElementById("ddArmonizacion");
        var strUser = e.options[e.selectedIndex].value;
        if (strUser == 1) {
            //input ¿Por qué no le gusta que sus hijos estudien en las instituciones educativas del resguardo de Guambia?
            $('#SiHaceArmonizacion').show();
            $('#SiHaceArmonizacion').css('visibility', 'visible');
            $('#ddSiHaceArmonizacion').css('display', 'block');

        } else {
            //input ¿Por qué no le gusta que sus hijos estudien en las instituciones educativas del resguardo de Guambia?
            $('#ddSiHaceArmonizacion :nth-child(1)').prop('selected', true);
            $('#SiHaceArmonizacion').hide();
            $('#SiHaceArmonizacion').css('visibility', 'hidden');
            $('#ddSiHaceArmonizacion').css('display', 'none');

        }
    };
    </script>




    <script>
    function pageLoad() {
        //--Modificación para disminuir lentitud de la página y disminuir las peticiones al servidor.

        showNoEstudiaResguardo();

    }
    </script>





    <script type="text/javascript">
        let hogar = {!!($hogar)!!}; 

        $(document).ready(() => {

            window.onbeforeunload = function() { return "Your work will be lost."; };

            if(hogar.length!=0){
                $('#id_hogar').val(hogar.id);
                cargarFormulario();
            }  

            let formFamilia = $('#familia');
            let modalConfirm = $('#ConfirmAction');
            formFamilia.submit((e) => { 
                e.preventDefault();
                modalConfirm.modal('show');
            });

            $('#btnConfirmar').click((e) => {
                var url = formFamilia.attr('action');
                var type = formFamilia.attr('method');
                $.ajax({
                    type: type,
                    url: url,
                    data: formFamilia.serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if (response.validate) {
                            setTimeout(() => {
                                Swal.fire(
                                    'Exito',
                                    'La informacion de la familia se a guardado exitosamente.',
                                    'success'
                                );
                            }, 200);

                            setTimeout(function() {
                                location.href =  hogar.length==0?`familia/${response.id}/miembros`:`${response.id}/miembros`;
                            }, 2000);
                        } else {
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
                        }
                    },
                }).always(() => {
                    modalConfirm.modal('hide');
                });
            });

        });
        function cargarFormulario(){
            let tipoPropiedad=$('#tipoPropiedad :input[value="'+hogar.tipo_propietario+'"]');
            tipoPropiedad.prop('checked', true);

            $('#numero_dormitorio').val(hogar.numero_dormitorio);
            $('#dormitorio_usado').val(hogar.dormitorio_usado);
            $('#donde_preparan_alimento').val(hogar.donde_preparan_alimento);
            $('#num_personas_estudiando').val(hogar.num_personas_estudiando);
            $('#forta_educacion_propia').val(hogar.forta_educacion_propia);
            $('#ddNoEstudiaResguardo').val(hogar.hijos_estudiando_guambia);
            showNoEstudiaResguardo($('#ddNoEstudiaResguardo'));
            $('#ddNoEstudiaResguardoEscuela').val(hogar.no_estudia_guambia);
            $('#ddNoEstudiaResguardoEscuela1').val(hogar.deserción_guambia);
            $('#gustar_edu_propia').val(hogar.gustar_edu_propia);
            $('#calidad_ie_guambia').val(hogar.calidad_ie_guambia);
            $('#debilidades_ie_guambia').val(hogar.debilidades_ie_guambia);
            $('#tiempo_comida_propia').val(hogar.tiempo_comida_propia);
            $('#ddArmonizacion').val(hogar.rituales_armonizacion);
            showArmonizacion($('#ddArmonizacion'));
            $('#ddSiHaceArmonizacion').val(hogar.tiempo_rituales);
            $('#alimenta_producto_propio').val(hogar.alimenta_producto_propio);
            $('#aliemnta_semillas_propio').val(hogar.aliemnta_semillas_propio);
            $('#aliemnta_cultivos_propios').val(hogar.aliemnta_cultivos_propios);

            let economias = {!!($economias)!!};
            $.each(economias,(index,economia)=>{
                $('#economias :input[value="'+economia.economia_familia_id+'"]').prop('checked', true);
            });
            let comidas = {!!($comidas)!!};
            $.each(comidas,(index,comida)=>{
                $('#comidas :input[value="'+comida.comidas_propias_id+'"]').prop('checked', true);
            });
            let condimentarias = {!!($condimentarias)!!};
            $.each(condimentarias,(index,condimentaria)=>{
                $('#condimentarias :input[value="'+condimentaria.id_codimentarias+'"]').prop('checked', true);
            });
            let aromaticas = {!!($aromaticas)!!};
            $.each(aromaticas,(index,aromatica)=>{
                $('#aromaticas :input[value="'+aromatica.id_aromaticas+'"]').prop('checked', true);
            });
            let medicinales = {!!($medicinales)!!};
            $.each(medicinales,(index,medicinal)=>{
                $('#medicinales :input[value="'+medicinal.id_medicinales+'"]').prop('checked', true);
            });
            let nutricionales = {!!($nutricionales)!!};
            $.each(nutricionales,(index,nutricional)=>{
                $('#nutricionales :input[value="'+nutricional.id_nutricionales+'"]').prop('checked', true);
            });
            let espirituales = {!!($espirituales)!!};
            $.each(espirituales,(index,espiritual)=>{
                $('#espirituales :input[value="'+espiritual.id_espirituales+'"]').prop('checked', true);
            });
            }
    </script>

    
    @endsection