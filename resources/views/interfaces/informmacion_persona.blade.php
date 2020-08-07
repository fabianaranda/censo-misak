@extends('layouts.menu2')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>

<!--\\\\\\\ contentpanel start\\\\\\-->
<div class="pull-left breadcrumb_admin clear_both">
    <div class="pull-left page_title theme_color">
        <h1>Censo Poblacional</h1>
        <h2 class="">Información Persona</h2>
    </div>
    <div class="pull-right">
        <ol class="breadcrumb">
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Censo Poblacional</a></li>
            <li class="active">Información Persona</li>
        </ol>
    </div>
</div>
{{--{{count($datosPersona)}}--}}

<!-- INICIO DE  CODIGO DE FORMULARIO -->


<div class="container">

    <!--Informacion menu izquierda-->
    <div class="col-md-3 col-sm-4 col-xs-12 ">

        <iframe frameborder="0" width="100%" scrolling="no" height="245" src="">

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
                                <table class="active">
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
                                                <b href="">PERSONAS MISAK </b>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                            </td>


                            <td style="width:3px;"></td>
                            <td title="Información de la persona que viven dentro de la familia ">
                                <table class="estatic">
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
                    <span class="color_infor  noPrint">Usted se encuentra en: &nbsp;&nbsp;Censo Poblacional Misak
                        SIPEMP&gt; <font color="#666666">Información Persona</font></span>
                </div>
                <h1>Información Persona </h1>
            </div>
            <!--FIN titulo_infobasica-->

            <!-- FORMULARIO-->
            <form id="censoPersona" method="POST" enctype="multipart/form-data">

                {{ csrf_field() }}

                <!-- Codigos foraneos tabla personas -->
                <input name="hoga_id" type="hidden" value="{{ $datos->hogar_id }}">

                <input name="persona_id" type="hidden" value="{{ $datos->id }}">
                <!---- fin codigos foraneos -->

                <div class="contenedor_informacion_persona">
                    <!--Contenedor informacion_persona --->

                    <div class="recuadro_info_persona"> INGRESE INFORMACIÓN GENERAL DE: {{ $datos->nombres }}
                        {{ $datos->apellidos }} CC N° {{ $datos->docomento_persona }} </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">



                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <!--Columna 1-->

                            <div class="form-group input-group-sm">
                                <label for="genero"><span class="asterisco">*</span>Genero</label>
                                <select name="genero" id="genero" class="form-control"
                                    onchange="" required>
                                    <option value="">Seleccione</option>
                                    <option value="M">Hombre</option>
                                    <option value="F">Mujer</option>
                                </select>
                            </div>
                            <div class="form-group input-group-sm">
                                <label><span class="asterisco">*</span>¿Perteneces a alguna empresa asociativa? </label>
                                <select id="empresa_asociativa" name="empresa_asociativa" type="text" class="form-control" required>
                                    <option value="">Seleccione</option>
                                    <option value="Natural">Natural</option>
                                    <option value="jurídica">jurídica</option>
                                    <option value="Privada">Privada</option>
                                    <option value="Publica">Publica </option>
                                    <option value="Ninguno">Ninguno</option>
                                </select>
                            </div>

                            <div class="form-group input-group-sm">
                                <label><span class="asterisco">*</span>¿Cuál carnet de salud tiene? </label>
                                <select id="carnet_salud_id" name="carnet_salud_id" id="servicio_acueducto"  id="framework" class="form-control selectpicker" data-live-search="true"    required>
                                    <option value="">Seleccione carnet de Salud</option>
                                    @foreach($carnet_salud as $key => $carnet_salud)
                                        <option value="{{ $key }}"> {{ $carnet_salud }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group input-group-sm">
                                <label>
                                    <span class="asterisco">*</span>
                                    ¿Profesión Actual?</label>
                                    <select name="profecion_id" id="profecion_id"  style="width:"
                                    required="" id="framework" class="form-control selectpicker" data-live-search="true" >
                                    <option value="">Seleccione Profesión Actual</option>
                                    @foreach($profecion as $key => $profecion)
                                        <option value="{{ $key }}"> {{ $profecion }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group input-group-sm">
                                <label style="width:300px" for="title">Número Telefono :</label>
                                <input id="telefono" name="telefono" placeholder="Teléfono" type="text" class="form-control">
                            </div>

                        </div> <!-- Fin de Columna 1-->

                        <div class="col-md-6 col-sm-12 col-xs-12">

                            <div class="form-group input-group-sm">
                                <label><span class="asterisco">*</span>¿Pertenece a alguna religión?</label>
                                <select id="religion" name="religion" type="text" class="form-control" required>
                                    <option value="">Seleccione</option>
                                    <option value="Propia">Propia</option>
                                    <option value="Católica">Católica</option>
                                    <option value="Cristiana ">Cristiana </option>
                                    <option value="Ateo">Ateo</option>
                                </select>
                            </div>

                            <div class="form-group input-group-sm">
                                <label><span class="asterisco">*</span>¿Ha dónde recurre si se enferma? </label>
                                <select id="enfemerma_recurre" name="enfemerma_recurre" type="text" class="form-control" required>
                                    <option value="">Seleccione</option>
                                    <option value="Propia">Medicina Tradicional </option>
                                    <option value="Católica">Medicina ocidental </option>
                                </select>
                            </div>

                            <div class="form-group input-group-sm">
                                <label><span class="asterisco">*</span>Cargar documento de identidad formato PDF</label>
                                <input type="file" id="documento_pdf" name="documento_pdf" class="btn-danger" accept=".pdf">
                            </div>
                            <div class="form-group input-group-sm">
                                <label style="width:300px"> Codigo Comunidad Indigena :</label>
                                <input id="comunidad_indigena" name="comunidad_indigena" value="11670001" placeholder="Comunidad" type="text" class="form-control" autocomplete="off" readonly=»readonly»>
                            </div>


                        </div> <!-- Fin Columna 2-->

                    </div>
                    <div class="clearfix"></div>
                    <!--Cierra el contenedor 2 . recuadro -->
                </div>
                <!--Fin del contenedor informacion_persona -->

                <div class="contenedor_informacion_persona">
                    <!--Contenedor informacion_persona --->

                    <div class="recuadro_info_persona">SELECCIONE LOS IDIOMAS QUE HABLA: {{ $datos->nombres }}
                        {{ $datos->apellidos }} CC N° {{ $datos->docomento_persona }}</div>
                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <div id="idiomas" class="col-md-3 col-lg-3">
                            </ul>
                            @foreach($idiomas as $idiomas_persona)
                                <li>                                    
                                    {{--<input name="{{$idiomas_persona->id}}" id="{{$idiomas_persona->id}}" value="{{$idiomas_persona->id}}" type="checkbox">
                                    <label>{{$idiomas_persona->nombre}}</label>--}}
                                    <label>
                                        {{ Form::checkbox('idiomas[]', $idiomas_persona->id, null) }}
                                        {{ $idiomas_persona->nombre }}
                                    </label>
                                </li>
                            @endforeach
                            </ul>
                        </div>

                    </div>
                    <div class="clearfix"></div>
                    <!--Cierra el contenedor 2 . recuadro -->
                </div>
                <!--Fin del contenedor informacion_persona -->

                <div class="contenedor_informacion_persona">
                    <!--Contenedor informacion_persona --->

                    <div class="recuadro_info_persona"> CONOCIMIENTOS DE NAMUY WAM DE : {{ $datos->nombres }}
                        {{ $datos->apellidos }} CC N° {{ $datos->docomento_persona }}</div>

                    <div class="col-xs-12 col-xs-12 estilo1" id='namuy_wam'>
                        <fieldset>
                            <div class="form-group">
                                <label for="" class="col-lg-2 control-label">Habla Namuy Wam</label>
                                <div class="col-lg-10">
                                    <div class="form-group input-group-sm">
                                        <div class="form-group">
                                            <div class="btn-group" data-toggle="buttons">
                                                <label class="btn btn-conocimiento" class="btn btn-info active"
                                                    data-toggle="tooltip" data-placement="bottom">
                                                    <input id="habla_namuy_wam" name="habla_namuy_wam" value="No habla" data-val="true"
                                                        data-val-required="El nivel de habilidad es un campo obligatorio"
                                                        required="" type="radio" aria-required="true">
                                                    No habla
                                                </label>
                                                <label class="btn btn-conocimiento" class="btn btn-info active"
                                                    data-toggle="tooltip" data-placement="bottom">
                                                    <input name="habla_namuy_wam" value="Entiende, pero no habla"
                                                        data-val="true"
                                                        data-val-required="El nivel de habilidad es un campo obligatorio"
                                                        required="" type="radio" aria-required="true">
                                                    Entiende, pero no habla
                                                </label>
                                                <label class="btn btn-conocimiento" class="btn btn-info active"
                                                    data-toggle="tooltip" data-placement="bottom">
                                                    <input name="habla_namuy_wam" value="Si Habla" data-val="true"
                                                        data-val-required="El nivel de habilidad es un campo obligatorio"
                                                        id="" name="" required="" type="radio" aria-required="true">
                                                    Si Habla
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <label for="" class="col-lg-2 control-label"> Escritura </label>
                                <div class="col-lg-10">
                                    <div class="form-group input-group-sm">
                                        <div class="form-group">
                                            <div class="btn-group" data-toggle="buttons">
                                                <label class="btn btn-conocimiento" class="btn btn-info active"
                                                    data-toggle="tooltip" data-placement="bottom">
                                                    <input name="escritura_namuy_wam" value="No escribe" data-val="true"
                                                        data-val-required="El nivel de habilidad es un campo obligatorio"
                                                        required="" type="radio" aria-required="true">
                                                    No escribe
                                                </label>
                                                <label class="btn btn-conocimiento" class="btn btn-info active"
                                                    data-toggle="tooltip" data-placement="bottom">
                                                    <input name="escritura_namuy_wam" value="Escribe, pero no habla"
                                                        data-val="true"
                                                        data-val-required="El nivel de habilidad es un campo obligatorio"
                                                        required="" type="radio" aria-required="true">
                                                    Escribe, pero no habla
                                                </label>
                                                <label class="btn btn-conocimiento" class="btn btn-info active"
                                                    data-toggle="tooltip" data-placement="bottom">
                                                    <input name="escritura_namuy_wam" value="Escribe y habla"
                                                        data-val="true"
                                                        data-val-required="El nivel de habilidad es un campo obligatorio"
                                                        required="" type="radio" aria-required="true">
                                                    Escribe y habla
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="clearfix"></div>
                    <!--Cierra el contenedor 2 . recuadro -->
                </div>
                <!--Fin del contenedor informacion_persona -->

                <div class="contenedor_informacion_persona">
                    <div class="recuadro_info_persona"> CONOCIMIENTOS DEL ESPAÑOL DE: {{ $datos->nombres }}
                        {{ $datos->apellidos }} CC N° {{ $datos->docomento_persona }}</div>
                    <div class="col-xs-12 col-xs-12 estilo1" id="español">
                        <fieldset>
                            <div class="form-group">
                                <label for="" class="col-lg-2 control-label">Habla Español </label>
                                <div class="col-lg-10">
                                    <div class="form-group input-group-sm">
                                        <div class="form-group">


                                            <div class="btn-group" data-toggle="buttons">
                                                <label class="btn btn-conocimiento" class="btn btn-info active"
                                                    data-toggle="tooltip" data-placement="bottom">
                                                    <input name="habla_español" value="No habla" data-val="true"
                                                        data-val-required="El nivel de habilidad es un campo obligatorio"
                                                        id="radio-36920633" name="" required="" type="radio"
                                                        aria-required="true">
                                                    No habla
                                                </label>
                                                <label class="btn btn-conocimiento" class="btn btn-info active"
                                                    data-toggle="tooltip" data-placement="bottom">
                                                    <input name="habla_español" value="Entiende, pero no habla"
                                                        data-val="true"
                                                        data-val-required="El nivel de habilidad es un campo obligatorio"
                                                        id="radio-36920633" name="" required="" type="radio"
                                                        aria-required="true">
                                                    Entiende, pero no habla
                                                </label>
                                                <label class="btn btn-conocimiento" class="btn btn-info active"
                                                    data-toggle="tooltip" data-placement="bottom">
                                                    <input name="habla_español" value="Si Habla" data-val="true"
                                                        data-val-required="El nivel de habilidad es un campo obligatorio"
                                                        id="" name="" required="" type="radio" aria-required="true">
                                                    Si Habla
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <label for="" class="col-lg-2 control-label">Escritura </label>
                                <div class="col-lg-10">
                                    <div class="form-group input-group-sm">
                                        <div class="form-group">
                                            <div class="btn-group" data-toggle="buttons">
                                                <label class="btn btn-conocimiento" class="btn btn-info active"
                                                    data-toggle="tooltip" data-placement="bottom">
                                                    <input name="escribe_español" value="No escribe" data-val="true"
                                                        data-val-required="El nivel de habilidad es un campo obligatorio"
                                                        required="" type="radio" aria-required="true">
                                                    No escribe
                                                </label>
                                                <label class="btn btn-conocimiento" class="btn btn-info active"
                                                    data-toggle="tooltip" data-placement="bottom">
                                                    <input name="escribe_español" value="Escribe,pero no habla"
                                                        data-val="true"
                                                        data-val-required="El nivel de habilidad es un campo obligatorio"
                                                        required="" type="radio" aria-required="true">
                                                    Escribe,pero no habla
                                                </label>
                                                <label class="btn btn-conocimiento" class="btn btn-info active"
                                                    data-toggle="tooltip" data-placement="bottom">
                                                    <input name="escribe_español" value="Escribe y habla"
                                                        data-val="true"
                                                        data-val-required="El nivel de habilidad es un campo obligatorio"
                                                        id="" name="" required="" type="radio" aria-required="true">
                                                    Escribe y habla
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                    </div>
                    <div class="clearfix"></div>
                    <!--Cierra el contenedor 2 . recuadro -->
                </div>
                <!--Fin del contenedor informacion_persona -->

                <div class="contenedor_informacion_persona">
                    <!--Contenedor informacion_persona --->

                    <div class="recuadro_info_persona"> {{ $datos->nombres }} {{ $datos->apellidos }} CC N°
                        {{ $datos->docomento_persona }} SE VISTE CON EL VESTIDO PROPIO</div>



                    <div class="col-xs-12 col-xs-12   estilo1">

                        <br>
                        <fieldset>
                            <div class="form-group">
                                <label for="" class="col-lg-2 control-label">Vestimenta </label>
                                <div class="col-lg-10">
                                    <div id="vestimenta" class="form-group input-group-sm">
                                        <div class="form-group">


                                            <div class="btn-group contendor_bt" data-toggle="buttons">
                                                <label class="btn btn-conocimiento" class="btn btn-info active"
                                                    data-toggle="tooltip" data-placement="bottom">
                                                    <input name="vestimenta_misak" value="No se viste" data-val="true"
                                                        data-val-required="El nivel de habilidad es un campo obligatorio"
                                                        required="" type="radio" aria-required="true">
                                                    No se viste
                                                </label>
                                                <label class="btn btn-conocimiento" class="btn btn-info active"
                                                    data-toggle="tooltip" data-placement="bottom">
                                                    <input name="vestimenta_misak" value="Se viste cada evento especial"
                                                        data-val="true"
                                                        data-val-required="El nivel de habilidad es un campo obligatorio"
                                                        required="" type="radio" aria-required="true">
                                                    Se viste cada evento especial
                                                </label>
                                                <label class="btn btn-conocimiento" class="btn btn-info active"
                                                    data-toggle="tooltip" data-placement="bottom">
                                                    <input name="vestimenta_misak" value="Si se viste" data-val="true"
                                                        data-val-required="El nivel de habilidad es un campo obligatorio"
                                                        required="" type="radio" aria-required="true">
                                                    Si se viste
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <br>
                        <!--
									 <fieldset>
                                     <div class="form-group">
                                        <label for="" class="col-lg-2 control-label">Escritura  </label>
                                          <div class="col-lg-10">
                                              <div class="form-group input-group-sm">
                                                    <div class="form-group">
                                                            
                                                      
                                                         <div class="btn-group" data-toggle="buttons">
                                                                <label  class="btn btn-conocimiento" class="btn btn-info active" data-toggle="tooltip" data-placement="bottom" >
                                                                    <input   data-val="true" data-val-required="El nivel de habilidad es un campo obligatorio" id="radio-36920633" name="" required="" type="radio" aria-required="true">
                                                                    No escribe 
                                                                  </label>
																   <label  class="btn btn-conocimiento"  class="btn btn-info active"data-toggle="tooltip" data-placement="bottom" >
                                                                    <input   data-val="true" data-val-required="El nivel de habilidad es un campo obligatorio" id="radio-36920633" name="" required="" type="radio" aria-required="true">
                                                                     Escribe, pero no habla 
                                                                   </label>
                                                                   <label  class="btn btn-conocimiento"  class="btn btn-info active" data-toggle="tooltip" data-placement="bottom" >
                                                                    <input   data-val="true" data-val-required="El nivel de habilidad es un campo obligatorio" id="" name="" required="" type="radio" aria-required="true">
                                                                    Escribe y habla 
                                                                    </label>
                                                         </div>
                                                       
                                                       </div>
                                                    </div>
                                                  </div>
                                            </div>
											</fieldset>-->

                    </div>
                    <div class="clearfix"></div>
                    <!--Cierra el contenedor 2 . recuadro -->
                </div>
                <!--Fin del contenedor informacion_persona -->

                <div class="contenedor_informacion_persona">
                    <!--Contenedor informacion_persona --->

                    <div class="recuadro_info_persona">CONOCIMIENTOS ANCESTRALES DESDE SER MISAK DE:
                        {{ $datos->nombres }}
                        {{ $datos->apellidos }} CC N° {{ $datos->docomento_persona }}</div>
                    <div class="col-md-12 col-sm-12 col-xs-12">


                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <!--Columna 1-->

                            <div class="form-group input-group-sm">
                                <label><span class="asterisco">*</span>¿Es usted médico tradicional? </label>
                                <select id="medico_tradicional" name="medico_tradicional" class="form-control" required>
                                    <option value="">Seleccione</option>
                                    <option value="Ninguno">Ninguno</option>
                                    <option value="Partera">Partera/o</option>
                                    <option value="Sobandero">Sobandero/a</option>
                                    <option value="Pulsador">Pulsador/a</option>
                                    <option value="Medico T">Merepik</option>

                                </select>
                            </div>

                        </div> <!-- Fin de Columna 1-->

                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <!--Columna 2-->

                            <div class="form-group input-group-sm">
                                <label><span class="asterisco">*</span>¿Tiene usted conocimientos empíricos “Saberes locales”?
                                </label>
                                <select id="conocimientos_empiricos" name="conocimientos_empiricos" class="form-control" required>
                                    <option value="">Seleccione</option>
                                    <option value="7">Ninguno</option>
                                    <option value="1">Artesano/a</option>
                                    <option value="2">músico</option>
                                    <option value="3">deportistas</option>
                                    <option value="4">consejeros (wachip, kᶿrᶿshᶿp)</option>
                                    <option value="5">constructor/a</option>
                                  <option value="8">pintor/a</option>
                                    <option value="9">mecamico/a</option>
                                    <option value="10">cerámica </option>
                                </select>
                            </div>


                        </div> <!-- Fin Columna 2-->

                    </div>
                    <div class="clearfix"></div>
                    <!--Cierra el contenedor 2 . recuadro -->
                </div>
                <!--Fin del contenedor informacion_persona -->

                <div class="contenedor_informacion_persona">
                    <!--Contenedor informacion_persona --->

                    <div class="recuadro_info_persona"> HÁBITOS DE VIDA SALUDABLES DE: {{ $datos->nombres }}
                        {{ $datos->apellidos }} CC N° {{ $datos->docomento_persona }} </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-6 col-sm-12 col-xs-12">                           <!--Columna 1-->
                            <div class="form-group input-group-sm">
                                <label><span class="asterisco">*</span>¿Qué deporte practica constantemente?</label>
                                <select id="deporte_constante" name="deporte_constante" class="form-control" required>
                                    <option value="">Seleccione</option>
                                    <option value="1">Futbol</option>
                                    <option value="2">Basket</option>
                                    <option value="3">Baseball</option>
                                    <option value="4">Tejo</option>
                                </select>
                            </div>

                            <div class="form-group input-group-sm">
                                <label f><span class="asterisco">*</span>¿Conoce lugares sagrados dentro del resguardo de
                                    Guambia?</label>
                                <select id="lugares_sagrados" name="lugares_sagrados" class="form-control" required>
                                    <option value="">Seleccione</option>
                                    <option value="sí">Sí</option>
                                    <option value="no">No</option>
                                </select>
                            </div>

                        </div> <!-- Fin de Columna 1-->

                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <!--Columna 2-->

                            <div class="form-group input-group-sm">
                                <label><span class="asterisco">*</span>¿Conoce algun juegos tradicionales?</label>
                                <select id="juegos_tradicionales" name="juegos_tradicionales" class="form-control" required>
                                    <option value="">Seleccione</option>
                                    <option value="Sí">Sí</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="form-group input-group-sm">
                                <label f><span class="asterisco">*</span>¿Le realizan baños en las diferentes etapas de
                                    la vida? </label>
                                <select id="baños_etapas_vida" name="baños_etapas_vida" class="form-control" required>
                                    <option value="">Seleccione</option>
                                    <option value="Vientre (preconcepción)">Vientre (preconcepción) </option>
                                    <option value="Concepción">Concepción</option>
                                    <option value="Niñez">Niñez</option>
                                    <option value="Juventud">Juventud</option>
                                    <option value="Adulto mayor">Adulto mayor</option>
                                </select>
                            </div>
                            <!-- <div class="form-group input-group-sm">
                                                 <label ><span class="asterisco">*</span>cual? </label>
                                                      <input type="text"  name="" id="nombre5" placeholder="Ingrese contenido"  class="form-control" style="text-transform:uppercase;" style="width:300px" > 
                                                  </div>-->

                        </div> <!-- Fin Columna 2-->

                    </div>
                    <div class="clearfix"></div>
                    <!--Cierra el contenedor 2 . recuadro -->
                </div>
                <!--Fin del contenedor informacion_persona -->
                 <!--Contenedor informacion_persona ---
                <div class="contenedor_informacion_persona">
                   

                    <div class="recuadro_info_persona">____________</div>
                    <div class="col-md-12 col-sm-12 col-xs-12">


                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <!--Columna 1--

                            <div class="form-group input-group-sm">
                                <label f><span class="asterisco">*</span>¿Le realizan baños en las diferentes etapas de
                                    la vida? </label>
                                <select id="baños_etapas_vida" name="baños_etapas_vida" class="form-control" required>
                                    <option value="">Seleccione</option>
                                    <option value="Vientre (preconcepción)">Vientre (preconcepción) </option>
                                    <option value="Concepción">Concepción</option>
                                    <option value="Niñez">Niñez</option>
                                    <option value="Juventud">Juventud</option>
                                    <option value="Adulto mayor">Adulto mayor</option>
                                </select>
                            </div>

                        </div> <!-- Fin de Columna 1--

                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <!--Columna 2--

                            <div class="form-group input-group-sm">

                                <div id="Mujer">
                                    <div class="form-group input-group-sm">
                                        <label for="ddMujer"><span class="asterisco">*</span>¿Cuando llega la
                                            menstruación usted guarda?</label>
                                        <select name="mestruacion" id="mestruacion"
                                            class="form-control">
                                            <option value="">Seleccione</option>
                                            <option value="Sí">SI</option>
                                            <option value="No">NO</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- Fin Columna 2--
                    </div>
                    <div class="clearfix"></div>
                    <!--Cierra el contenedor 2 . recuadro --
                </div>
                Fin del contenedor informacion_persona -->

                <div class="contenedor_informacion_persona">
                    <!--Contenedor informacion_persona --->

                    <div class="recuadro_info_persona">ENFERMEDADES DE {{ $datos->nombres }}
                        {{ $datos->apellidos }} CC N° {{ $datos->docomento_persona }}</div>
                    <div class="col-md-12 col-sm-12 col-xs-12">


                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <!--Columna 1-->

                            <div class="form-group input-group-sm">
                                <label f><span class="asterisco">*</span>¿Precenta alguna de estas enfermedades? </label>
                                <select id="enfermedades_id" name="enfermedades_id" class="form-control" required>
                                    <option value="">Seleccione</option>
                                    @foreach($enfermedades as $key => $enfermedad)
                                        <option value="{{ $key }}"> {{ $enfermedad }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group input-group-sm">
                                <label f><span class="asterisco">*</span>¿Recurre a la medicina alternativa? </label>
                                <select id="medicina_alternativa" name="medicina_alternativa" class="form-control" required>
                                    <option value="">Seleccione</option>
                                    <option value="Ninguno">Ninguno </option>
                                    <option value="Homeópata">Homeópata</option>
                                    <option value="Reflexología">Reflexología</option>
                                    <option value="Acupuntura">Acupuntura</option>
                                    <option value="Aromaterapia">Aromaterapia</option>
                                    <option value="Temascal">Temascal</option>
                                    <option value="Yagüe">Yagüe</option>
                                    <option value="Rape">Rape</option>
                                    <option value="Dudoterapia">Dudoterapia </option>
                                </select>
                            </div>

                        </div> <!-- Fin de Columna 1-->

                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <!--Columna 2-->

                            <div class="form-group input-group-sm">
                                <label><span class="asterisco">*</span>¿Usted consume? </label>
                                <select id="consumo_sustancias" name="consumo_sustancias" class="form-control" required>
                                    <option value="">Seleccione</option>
                                    <option value="1">Alcohol</option>
                                    <option value="2">Cigarrillo</option>
                                    <option value="3">Sustancias psicoactivas </option>
                                    <option value="4">No consume</option>
                                </select>
                            </div>


                        </div> <!-- Fin Columna 2-->

                    </div>
                    <div class="clearfix"></div>
                    <!--Cierra el contenedor 2 . recuadro -->
                </div>
                <!--Fin del contenedor informacion_persona -->

                <div class="contenedor_informacion_persona">
                    <!--Contenedor informacion_persona --->

                    <div class="recuadro_info_persona"> SELECCIONE SI TIENE ALGUNA DE ESTAS LIMITACIONES FÍSICAS
                        {{ $datos->nombres }} {{ $datos->apellidos }} CC N° {{ $datos->docomento_persona }}</div>
                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <div id="limitaciones" class="col-md-3 col-lg-3">
                            </ul>
                            @foreach($limitaciones_fisinas as $limitacion)
                                <li>
                                    <label>
                                        {{ Form::checkbox('limitaciones_fisinas[]', $limitacion->id, null) }}
                                        {{ $limitacion->nombre }}
                                    </label>
                                </li>
                            @endforeach
                            </ul>
                        </div>

                    </div>
                    <div class="clearfix"></div>
                    <!--Cierra el contenedor 2 . recuadro -->
                </div>
                <!--Fin del contenedor informacion_persona -->


                <!--borones Guardar y continuar -->
                <div class="pull-right ">
                    <input type="submit" class="botones_censo_poblacional" value="GUARDAR Y CONTINUAR" id="boton"
                        class="btn btn-primary">
                </div>

            </form>
            <!--fIN DE VALIDACION DE ESTADO DEL CENSO POBLACIONL-->

            <!--fIN DE VALIDACION DE ESTADO DEL CENSO POBLACIONL-->


            <br>
            <br>
            <!-- FIN FORMULARIO-->
        </div>
        <!--FIN ContenedorMenu-->
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
                <p>¿Esta seguro que desea realizar esta acción?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btnConfirmar">Confirmar</button>
            </div>
        </div>
    </div>
</div>

<br>
<br>
<br>
</div>
</div>
</div>


@endsection

@section('scripts')

<script type="text/javascript">

let datosPersona = {!!($datos->status==0?0:$datosPersona)!!};

let form=$('#censoPersona');

$(document).ready(()=>{
    if(datosPersona!=0){
        cargarFormulario();
    }
    
    form.on('submit', (event)=> {
        event.preventDefault(); //cancelar el envio
        modalConfirm.modal('show');
    });

    let modalConfirm = $('#ConfirmAction');
        $('#btnConfirmar').click((e) => { 
            e.preventDefault();
            let data = new FormData($('#censoPersona')[0]);
            $.ajax({
                type: 'POST',
                url: `{{$datos->id}}`,
                data: data,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.status) {
                        setTimeout(() => {
                            Swal.fire(
                                'Exito',
                                'Se ha guardado con éxito.',
                                'success'
                            );
                        }, 200);
                        setTimeout(function () {
                            location.href = location.href+ `/educacion-formal`;
                        }, 2000);

                    } else {
                        let mensaje ="";
                        if(response.errors){
                            $.map(response.errors,(value, index)=>{
                                mensaje+=value+'\n';
                            });
                        }else{
                            mensaje = response.mensaje;
                        }
                        setTimeout(() => {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Error',
                                text: mensaje,
                            })
                        }, 200);
                    }
                }
            }).fail(() => {
                setTimeout(() => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Ocurrio un error en el servidor, cantacta al administrador.',
                    })
                }, 200);
            }).always(() => {
                modalConfirm.modal('hide');
            });
        });
});    

function cargarFormulario(){
    $('#genero').val(datosPersona.sexo);
    $('#religion').val(datosPersona.religion);
    $('#empresa_asociativa').val(datosPersona.empresa_asociativa);
    $('#enfemerma_recurre').val(datosPersona.enfemerma_recurre);
    $('#carnet_salud_id').val(datosPersona.carnet_salud_id);
    $('#profecion_id').val(datosPersona.profecion_id);
    $('#comunidad_indigena').val(datosPersona.comunidad_indigena);
    $('#telefono').val(datosPersona.telefono);
    let idiomas={!!($idiomasPersona)!!};
    idiomas.forEach((idioma,index)=>{
        $('#idiomas :input[value="'+idioma.idiomas_id+'"]').prop('checked', true);
    });
    let inputNamuyHabla=$('#namuy_wam :input[value="'+datosPersona.habla_namuy_wam+'"]');
    inputNamuyHabla.prop('checked', true);
    inputNamuyHabla.parent().addClass('active');
    let inputNamuyEscribe=$('#namuy_wam :input[value="'+datosPersona.escritura_namuy_wam+'"]');
    inputNamuyEscribe.prop('checked', true);
    inputNamuyEscribe.parent().addClass('active');

    let inputEspañolHabla=$('#español :input[value="'+datosPersona.habla_español+'"]');
    inputEspañolHabla.prop('checked', true);
    inputEspañolHabla.parent().addClass('active');
    let inputEspañolEscribe=$('#español :input[value="'+datosPersona.escribe_español+'"]');
    inputEspañolEscribe.prop('checked', true);
    inputEspañolEscribe.parent().addClass('active');   

    let inputVestimenta=$('#vestimenta :input[value="'+datosPersona.vestimenta_misak+'"]');
    inputVestimenta.prop('checked', true);
    inputVestimenta.parent().addClass('active');
    
    $('#medico_tradicional').val(datosPersona.medico_tradicional);
    $('#conocimientos_empiricos').val(datosPersona.conocimientos_empiricos);
    $('#deporte_constante').val(datosPersona.deporte_constante);
    $('#juegos_tradicionales').val(datosPersona.juegos_tradicionales);
    $('#lugares_sagrados').val(datosPersona.lugares_sagrados);
    $('#baños_etapas_vida').val(datosPersona.baños_etapas_vida);
    $('#mestruacion').val(datosPersona.mestruacion);
    $('#enfermedades_id').val(datosPersona.enfermedades_id);
    $('#consumo_sustancias').val(datosPersona.consumo_sustancias);
    $('#medicina_alternativa').val(datosPersona.medicina_alternativa);

    let limitaciones={!!($limitacionesPersona)!!};
    limitaciones.forEach((limitacion,index)=>{
        $('#limitaciones :input[value="'+limitacion.limitaciones_fisinas_id+'"]').prop('checked', true);
    });
    
}

</script>
    
@endsection
