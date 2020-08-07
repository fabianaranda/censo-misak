@extends('layouts.menu')

@section('content')
    
<link rel="stylesheet" href="/css/estilos_pie_pagina.css">

<link type="text/css" rel="stylesheet" href="/css/form_ingreso_familia.css">

    
    <!--\\\\\\\ contentpanel start\\\\\\-->
    <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
            <h1>Actualizacion</h1>
            <h2 class="">Actualizacion Informacion General</h2>
        </div>
        <div class="pull-right">
            <ol class="breadcrumb">
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Actualizacion</a></li>
                <li class="active">Actualizacion Informacion General</li>
            </ol>
        </div>
    </div>
    <br>
    <br>
    <div class="color_informacion_modulo " style="margin-top: 15px;">
        <span class="color_infor  ">Usted se encuentra en: &nbsp;&nbsp;<font color="#060505"> Sistema de Informacion
                Poblacional Misak -SIPEMP &gt; <font color="#060505">Actualizacion </font> &gt; <font color="#060505">
                    Informacion General</font> </span>
    </div>


    {{-- Formulario --}}
    
    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="etiqueta2"> Recuerde que los campos con un asterisco (*) son obligatorios.
                </div>
    
                <form id="formInfoPersonal" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- @method('PUT') --}}
                    <!-- Codigos foraneos tabla personas -->
                    <input name="hoga_id" type="hidden" value="{{ $datos->hogar_id }}">

                    <input name="persona_id" type="hidden" value="{{ $datos->id }}">
                    <!---- fin codigos foraneos -->

                    {{-- Informacion basica de la persona --}}
                    <div class="row separador">
                        <div class="col-md-12 form-group text-center">
                            Información de la persona (*)
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 form-group input-group-sm">
                            <div class="etiqueta2 usuario">Nombre.(*)</div>
                            <input type="text" id="nombre" name="nombre" maxlength="50" placeholder="Ingrese nombre"
                            class="form-control" required value="{{ $datos->nombres }}">
        
                        </div>
                        <div class="col-md-4 form-group input-group-sm">
                            <div class="etiqueta2 usuario">Apellido.(*)</div>
                            <input type="text" id="apellido" name="apellido" maxlength="50"
                                placeholder="Ingrese apellido" class="form-control" required value="{{ $datos->apellidos }}">
                        </div>
                        <div class="col-md-4 form-group input-group-sm">
                            <div class="etiqueta2 usuario">Estado civil.(*)</div>
                            <select id="estado_civil" name="estado_civil" class="form-control" required>
                                <option value="">Seleccione</option>
                                <option value="SO" {{ $datos->estado_civil=='SO'?'selected':'' }}>Soltero(a)</option>
                                <option value="CA" {{ $datos->estado_civil=='CA'?'selected':'' }}>Casado(a)</option>
                                <option value="SE" {{ $datos->estado_civil=='SE'?'selected':'' }}>Separado(a) o Divorciado(a)</option>
                                <option value="VI" {{ $datos->estado_civil=='VI'?'selected':'' }}>Viudo(a)</option>
                                <option value="UN" {{ $datos->estado_civil=='UN'?'selected':'' }}>Unión Libre</option>
                            </select>
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-md-4 form-group input-group-sm">
                            <div class="etiqueta2">Tipo Identificación.(*)</div>
                            <div>
                                <select id="tipo_identificacion" id="tipo_identificacion" name="tipo_identificacion" class="form-control">
                                    <option value="">Seleccione</option>
                                    <option value="CC" {{ $datos->tipo_identificacion=='CC'?'selected':'' }}>Cedula de Ciudadania</option>
                                    <option value="TI" {{ $datos->tipo_identificacion=='TI'?'selected':'' }}>Tarjeta de Identidad</option>
                                    <option value="CE" {{ $datos->tipo_identificacion=='CE'?'selected':'' }}>Cedula de Extranjeria</option>
                                    <option value="PA" {{ $datos->tipo_identificacion=='PA'?'selected':'' }}>Pasaporte</option>
                                </select>
                            </div>
                        </div>
        
                        <div class="col-md-4 form-group input-group-sm">
                            <div class="etiqueta2">Numero Identificación.(*)</div>
                            <input type="text" id="documento_persona" name="documento_persona" maxlength="30"
                                placeholder="Ingrese identificación" class="form-control" required value="{{ $datos->docomento_persona }}">
                        </div>
                        <div class="col-md-4 form-group input-group-sm">
                            <div class="etiqueta2">Fecha de nacimiento(*)</div>
                            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Ingrese fecha de nacimiento" class="form-control" required value="{{ $datos->fecha_nacimiento }}">
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-md-6 form-group input-group-sm">
                            <div class="etiqueta2">Parentesco. (*)</div>
                            <select id="parentesco" name="parentesco" class="form-control" required>
                                <option value="">Seleccione</option>
                                <option value="CF" {{ $datos->parentesco=='CF'?'selected':'' }}>Cabeza Hogar</option>
                                <option value="PA" {{ $datos->parentesco=='PA'?'selected':'' }}>Padre</option>
                                <option value="MA" {{ $datos->parentesco=='MA'?'selected':'' }}>Madre</option>
                                <option value="HI" {{ $datos->parentesco=='HI'?'selected':'' }}>Hijo</option>
                                <option value="NI" {{ $datos->parentesco=='NI'?'selected':'' }}>Nieto</option>
        
                            </select>
        
                        </div>
                        <div class="col-md-6 form-group input-group-sm">
                            <div class="etiqueta2">Nivel educativo(*)</div>
                            <select id="nivel_educativo" name="nivel_educativo" class="form-control" required>
                                <option value="">Seleccione</option>
                                <option value="NE" {{ $datos->nivel_academico=='NE'?'selected':'' }}>No tiene Estodio</option>
                                <option value="PR"{{ $datos->nivel_academico=='PR'?'selected':'' }}>Preescolar</option>
                                <option value="P"{{ $datos->nivel_academico=='P'?'selected':'' }}>Básica Primaria(1-5)</option>
                                <option value="BS" {{ $datos->nivel_academico=='BS'?'selected':'' }}>Básica Secundaria(6-9)</option>
                                <option value="MD" {{ $datos->nivel_academico=='MD'?'selected':'' }}>Media(10-13)</option>
                                <option value="TL" {{ $datos->nivel_academico=='TL'?'selected':'' }}>Técnica Laboral</option>
                                <option value="TP" {{ $datos->nivel_academico=='TP'?'selected':'' }}>Técnica Profesional</option>
                                <option value="T"{{ $datos->nivel_academico=='T'?'selected':'' }}>Tecnológica</option>
                                <option value="PG"{{ $datos->nivel_academico=='PG'?'selected':'' }}>Universitaria</option>
                                <option value="E"{{ $datos->nivel_academico=='E'?'selected':'' }}>Especialización</option>
                                <option value="M"{{ $datos->nivel_academico=='M'?'selected':'' }}>Maestría</option>
                                <option value="D"{{ $datos->nivel_academico=='D'?'selected':'' }}>Doctorado</option>
        
                            </select>
                        </div>
                    </div>

                    {{-- Informacion del censo --}}

                    <div class="contenedor_informacion_persona">
                        <!--Contenedor informacion_persona --->
    
                        <div class="recuadro_info_persona"> INGRESE INFORMACION GENERAL DE: {{ $datos->nombres }}
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
                                    <label><span class="asterisco">*</span>¿Cuál carnet de Salud tiene? </label>
                                    <select id="carnet_salud_id" name="carnet_salud_id" id="servicio_acueducto" class="form-control" required>
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
                                    <select name="profecion_id" id="profecion_id" class="form-control" style="width:"
                                        required="">
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
                                        <option value="Propia">Medico Tradicional </option>
                                        <option value="Católica">medicina ocidental </option>
                                    </select>
                                </div>
    
                                <div class="form-group input-group-sm">
                                    <label><span class="asterisco">*</span>Cargar documento de identidad formato PDF</label>
                                    <input type="file" id="documento_pdf" name="documento_pdf" class="btn-danger" accept=".pdf">
                                </div>
                                <div class="form-group input-group-sm">
                                    <label style="width:300px">Comunidad Indigena :</label>
                                    <input id="comunidad_indigena" name="comunidad_indigena" placeholder="Comunidad" type="text" class="form-control">
                                </div>
    
    
                            </div> <!-- Fin Columna 2-->
    
                        </div>
                        <div class="clearfix"></div>
                        <!--Cierra el contenedor 2 . recuadro -->
                    </div>

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
                                                            name="" required="" type="radio" aria-required="true">
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
    
                        </div>
                        <div class="clearfix"></div>
                        <!--Cierra el contenedor 2 . recuadro -->
                    </div>
    
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
                                    <label><span class="asterisco">*</span>¿Tiene usted conocimientos empíricos “Sabios”?
                                    </label>
                                    <select id="conocimientos_empiricos" name="conocimientos_empiricos" class="form-control" required>
                                        <option value="">Seleccione</option>
                                        <option value="1">Artesano/a</option>
                                        <option value="2">músico</option>
                                        <option value="3">deportistas</option>
                                        <option value="4">consejeros (wachip, kᶿrᶿshᶿp)</option>
                                        <option value="5">constructor/a</option>
                                        <option value="6">constructor/a</option>
                                        <option value="7">peluquero/a</option>
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
                                <!-- <div class="form-group input-group-sm">
                                                     <label ><span class="asterisco">*</span>cual? </label>
                                                          <input type="text"  name="" id="nombre5" placeholder="Ingrese contenido"  class="form-control" style="text-transform:uppercase;" style="width:300px" > 
                                                      </div>-->
    
                            </div> <!-- Fin Columna 2-->
    
                        </div>
                        <div class="clearfix"></div>
                        <!--Cierra el contenedor 2 . recuadro -->
                    </div>
    
                    <div class="contenedor_informacion_persona">
                        <!--Contenedor informacion_persona --->
    
                        <div class="recuadro_info_persona">____________</div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
    
    
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <!--Columna 1-->
    
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
    
                            </div> <!-- Fin de Columna 1-->
    
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <!--Columna 2-->
    
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
    
                            </div> <!-- Fin Columna 2-->
                        </div>
                        <div class="clearfix"></div>
                        <!--Cierra el contenedor 2 . recuadro -->
                    </div>
    
                    <div class="contenedor_informacion_persona">
                        <!--Contenedor informacion_persona --->
    
                        <div class="recuadro_info_persona">--------------------</div>
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

                    {{-- Informacion de educación formal --}}
                    <div id="SiTieneEducacion">
                        <div class="recuadro_info_persona">SELECCIONE EL NIVEL DE EDUCACIÓN QUE TIENE </div>
                            <div id="educacionDiv" class="col-md-12 form-group" style="display: none;">
                                <input class="form-control" id="educacionInput" type="text" style="text-align: center;" disabled>                                            
                            </div>
                        <div class="container">
    
                            <div class="row">
                                <div class="col-md-12 form-group input-group-sm">
                                    <div class="etiqueta2"> Recuerde que los campos con un asterisco (*) son
                                        obligatorios.
                                    </div>
                                </div>
                            </div>
    
                            <div class="row">
                                <div class="col-md-4 form-group input-group-sm">
                                    <div class="etiqueta2 usuario">Seleccione departamento(*)</div>
    
                                    <select id="departamento" name="departamento" class="form-control">
                                        <option value="">Seleccione</option>
                                        @foreach($departamentos as $departamento)
                                            <option value="{{ $departamento->codigo_departamento }}">
                                                {{ $departamento->nombre_depatamento }}</option>
                                        @endforeach
                                    </select>
    
                                </div>
                                <div class="col-md-4 form-group input-group-sm">
                                    <div class="etiqueta2 usuario">Seleccione Municipio(*)</div>
    
                                    <select id="municipio" name="municipio" class="form-control">
                                        <option value="">Seleccione</option>
                                    </select>
                                </div>
                                <div class="col-md-4 form-group input-group-sm">
                                    <div class="etiqueta2 usuario">Seleccione colegio(*)</div>
    
                                    <select id="colegio" name="colegio" class="form-control">
                                        <option value="">Seleccione</option>
                                    </select>
    
                                </div>
                            </div>
    
                            <div class="row">
                                <div class="col-md-4 form-group input-group-sm">
                                    <div class="etiqueta2">Seleccione sede Colegio(*)</div>
                                    <select id="sede" name="sede" class="form-control text-center">
                                        <option value="">Seleccione</option>
                                    </select>
                                </div>
                                <div class="col-md-4 form-group input-group-sm">
                                    <div class="etiqueta2 usuario">Seleccione tipo de educación(*)</div>
                                    <select id="tipo_educacion" name="tipo_educacion" class="form-control">
                                        <option value="">Seleccione</option>
                                    </select>
                                </div>
                                <div class="col-md-4 form-group input-group-sm">
                                    <div class="etiqueta2">Seleccione Estado(*)</div>
                                    <select id="estado" name="estado" class="form-control">
                                        <option value="">Seleccione</option>
                                        <option value="En Curso">En Curso</option>
                                        <option value="Incompleto">Incompleto</option>
                                        <option value="Graduado">Graduado</option>
                                        <option value="Retirado">Retirado</option>
                                    </select>
                                </div>
                            </div>
    
                            <div class="row">
                                <div class="col-md-4 form-group input-group-sm">
                                    <div class="etiqueta2">Año que estudio/a (*)</div>
                                    <input id='anio' name='anio' type="number" placeholder="YYYY">
                                </div>
                                <div class="col-md-4 form-group input-group-sm">
                                    <div class="etiqueta2">Modalidad (*)</div>
                                    <input type="text" id="modalidad" name="modalidad"
                                        placeholder="Ingrese modalidad de estudio" class="form-control">
                                </div>
                                <div class="col-md-4 form-group input-group-sm">
                                    <div for="ddNoEstudiaResguardo" class="etiqueta2">Tiene estudios de Educacion
                                        Superior(*)</div>
                                    <select name="nivel_academico" class=" form-control" id="ddNoEstudiaResguardo"
                                        onchange="showNoEstudiaResguardo(this);" autocomplete="of">
                                        <option value="">Seleccione</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- BOTON SUBMIT --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-right">
                                <button type="submit" class="btn btn-success" style="background-color:#1b9e1d;color:white;" id="guardar">Guardar</button>
                            </div>
                        </div>
                    </div>
                    <br>
                </form>

                {{-- Informacion de educación superior --}}
                <div id="NoGustaQueEstudienGuambia" style="visibility: hidden; display: none;">
                    <div class="container">
                        <div class="contenedor_informacion_persona">
                            <!--Contenedor informacion_persona --->
    
                            <div class="recuadro_info_persona">Agregar el Nivel de Educacion superior</div>
    
                            <div class="contenedor_informacion_persona">
                                <div class="container">
                                    <form id="formSuperior">
                                        <div class="form-group input-group-sm col-md-4">
                                            <label><span class="asterisco">*</span>Tipo Educacion Superior
                                            </label>
                                            <select id="tipo_educacion_superior" name="tipo_educacion_superior"
                                                class="form-control" required>
                                                <option value="">Seleccione</option>
                                                <option value="TL">Técnica Laboral</option>
                                                <option value="TC">Tecnológica</option>
                                                <option value="UN">Universitaria</option>
                                                <option value="EP">Especialización</option>
                                                <option value="ME">Maestria</option>
                                                <option value="DOC">Doctorado</option>
                                            </select>
                                        </div>
    
                                        <div class="form-group input-group-sm col-md-4">
                                            <label>
                                                <span class="asterisco">*</span>
                                                Estado</label>
                                            <select id="estado_actual" name="estado_actual" class="form-control" required>
                                                <option value="">Seleccione</option>
                                                <option value="En Curso">En Curso</option>
                                                <option value="Incompleto">Incompleto</option>
                                                <option value="Graduado">Graduado</option>
                                                <option value="Retirado">Retirado</option>
                                            </select>
                                        </div>
                                        <div class="form-group input-group-sm col-md-4">
                                            <label><span class="asterisco">*</span>Nombre de la
                                                Carrera</label>
                                            <input id="nombre_carrera" name="nombre_carrera" type="text"
                                                class="form-control" placeholder="Nombre carrera" required>
                                        </div>
                                        <div class="form-group input-group-sm col-md-12">
                                            <input type="submit" class="Agregareducacion"
                                                value="Agregar carrera de educacion superior" id="agregarCarrera"
                                                class="btn btn-primary" data-index="-1">
                                                <button type="reset" class="btn btn-primary">Resetear</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="titulo_informacion">
                        <h1>Educación superior</h1>
                    </div>
    
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Tipo Educacion Superior</th>
                                <th>Nombre de la Carrera</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="bodyTable">
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
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

<script type="text/javascript">
    //--Modificación para disminuir lentitud de la página y disminuir las peticiones al servidor.
    //PARA QUE APARESCAN LOS OBCIONES   CUANDO SELECCIONE SI O NO / EDUCACION SUPERIOR 

        //// SI TIENE EDUCACION SUPERIOR //////////////////
        function showNoEstudiaResguardo() {
            var e = document.getElementById("ddNoEstudiaResguardo");
            var strUser = e.options[e.selectedIndex].value;
            if (strUser == 1) {

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

</script>

<script>
    let datosPersona = {!!($datos->status==0?0:$datosPersona)!!};
    let formEduFormal=$('#formFormal');
    let estidioSuperior = [];
    $(document).ready(() => {
        
        window.onbeforeunload = function() { return "Your work will be lost."; };

        if(datosPersona!=0){
            cargarFormulario();
        }

        $('#btnSiguiente').click(()=>{
            $.ajax({
                type: "DELETE",
                url: location.href,
                data: formEduFormal.serialize(),
                dataType: "json",
                success: function (response) {
                    if(response.validate){
                        location.href = `resumen`;
                    }else{
                        Swal.fire(
                            'Error',
                            validate.mensaje,
                            'error'
                        );
                    }
                }
            });
        });

        $('#departamento').change(() => {
            if ($('#departamento').val() != '') {
                $.ajax({
                        url: `/educacion-formal/consultarmunicipios/${$('#departamento').val()}`,
                        type: "GET",
                        dataType: 'json',
                        cache: false
                    })
                    .done((response) => {
                        $('#municipio').empty();
                        $('#municipio').append('<option value="">Seleccione</option>');
                        $.map(response, (municipio, index) => {
                            $('#municipio').append(
                                `<option value="${municipio.codigo_muni}">${municipio.nombre_municipio}</option>`
                                );
                        });
                    });
            }
        });

        $('#municipio').change(() => {
            if ($('#municipio').val() != '') {
                $.ajax({
                        url: `/educacion-formal/consultarcolegios/${$('#municipio').val()}`,
                        type: "GET",
                        dataType: 'json',
                        cache: false
                    })
                    .done((response) => {
                        $('#colegio').empty();
                        $('#colegio').append('<option value="">Seleccione</option>');
                        $.map(response, (colegio, index) => {
                            $('#colegio').append(
                                `<option value="${colegio.codigo_colegio}">${colegio.nombre_colegio}</option>`
                                );
                        });
                    });
            }
        });

        $('#colegio').change(() => {
            if ($('#colegio').val() != '') {
                $.ajax({
                        url: `/educacion-formal/consultarsedes/${$('#colegio').val()}`,
                        type: "GET",
                        dataType: 'json',
                        cache: false
                    })
                    .done((response) => {
                        $('#sede').empty();
                        $('#sede').append('<option value="">Seleccione</option>');
                        $.map(response, (sede, index) => {
                            $('#sede').append(
                                `<option value="${sede.codigo_sede}">${sede.nombre_sede}</option>`
                            );
                        });
                    });
            }
        });

        $('#sede').change(() => {
            if ($('#sede').val() != '') {
                $.ajax({
                        url: `/educacion-formal/consultartiposeducacion/${$('#sede').val()}`,
                        type: "GET",
                        dataType: 'json',
                        cache: false
                    })
                    .done((response) => {
                        $('#tipo_educacion').empty();
                        $('#tipo_educacion').append('<option value="">Seleccione</option>');
                        $.map(response, (tipo, index) => {
                            $('#tipo_educacion').append(
                                `<option value="${tipo.codigo_tipo}">${tipo.tipo}</option>`
                                );
                        });
                    });
            }
        });

        let modalConfirm = $('#ConfirmAction');

        formEduFormal.submit((e)=> {
            e.preventDefault();
        });

        let formSuperior = $('#formSuperior');
        formSuperior.submit((e) => {
            e.preventDefault();
            var estudio = {};
            $.map(formSuperior.serializeArray(), function (element, index) {
                estudio[element['name']] = element['value'];
            });
            if($('#agregarCarrera').data('index') == -1){
                // Registrar Carrera
                estidioSuperior.push(estudio);
            }else{
                // Actualizar carrera
                estidioSuperior[$('#agregarCarrera').data('index')] = estudio;
            }

            $('#bodyTable').html(estructurarTablaDeCarreras());
            formSuperior[0].reset();
        });

        $("[type='reset']").closest('#formSuperior').on('reset', function () {
            $('#agregarCarrera').data('index', '-1');
        });

        let formInfoPersonal = $('#formInfoPersonal');
        formInfoPersonal.on('submit', (event)=> {
            event.preventDefault();
            modalConfirm.modal('show');
        }); 

        $('#btnConfirmar').click((e) => { 
            e.preventDefault();
            let data = new FormData($('#formInfoPersonal')[0]);

            $.ajax({
                type: 'POST',
                headers: {"X-CSRF-TOKEN": $('[name=_token]').val()},
                url: location.href,
                data: data,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.result) {
                        if(estidioSuperior.length > 0){
                            $.ajax({
                                url: 'educacion-superior',
                                type: 'POST',
                                data: { 
                                    estudioSuperior: JSON.stringify(estidioSuperior),
                                    id_info_persona: response.id,
                                },
                                success: function (response) {
                                    if(response.result){
                                        setTimeout(() => {
                                            Swal.fire(
                                                'Exito',
                                                'Se ha actualizado exitosamente',
                                                'success'
                                            );
                                        }, 200);

                                        setTimeout(function () {
                                            location.href = `/Actualizacion-informacion-general`;
                                        }, 2000);

                                    }else{
                                        setTimeout(() => {
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Error',
                                                text: response.mensaje,
                                            });
                                        }, 200);
                                    }     
                                }
                            });
                        }else{
                            setTimeout(() => {
                                Swal.fire(
                                    'Exito',
                                    'Se ha actualizado exitosamente',
                                    'success'
                                );
                            }, 200);

                            setTimeout(function () {
                                location.href = `/Actualizacion-informacion-general`;
                            }, 2000);
                        }
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.mensaje,
                        })
                    }
                }
            }).fail((error) => {
                // console.log(e.responseJSON.errors);
                let mensaje='';
                $.map(error.responseJSON.errors, function (elementOrValue, indexOrKey) {
                    // console.log(elementOrValue);
                    mensaje+= elementOrValue[0]+"  ";
                });
                setTimeout(() => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: mensaje,
                    });
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

        let educacionFormal={!!($educacionFormal)!!};
        if(educacionFormal.length>0){
            $('#educacionDiv').show();
            $('#educacionInput').val(educacionFormal[0].nombre_depatamento+' - '+
            educacionFormal[0].nombre_municipio+' - '+educacionFormal[0].nombre_colegio+' - '+
            educacionFormal[0].nombre_sede+' - '+educacionFormal[0].tipo+' - '+educacionFormal[0].estado+' - '+
            educacionFormal[0].año_educacion+' - '+educacionFormal[0].modalidad_colegio);
        }
        
        estidioSuperior={!!($educacionSuperior)!!};
        if(estidioSuperior.length>0){
            $('#ddNoEstudiaResguardo').val('1');
            showNoEstudiaResguardo($('#ddNoEstudiaResguardo'));
            $('#bodyTable').html(estructurarTablaDeCarreras());
        }
        
    }

    function estructurarTablaDeCarreras(){
        let html = '';
            $.each(estidioSuperior, function (index, element) {
                html+=`<tr>
                        <td>${index + 1}</td>
                        <td>${element.tipo_educacion_superior}</td>
                        <td>${element.nombre_carrera}</td>
                        <td>${element.estado_actual}</td>
                        <td>
                            <button type="button"  class="borrar" onClick="editar('${index}')">Editar</button>
                            <button type="button"  class="borrar" onClick="borrar('${index}')">Eliminar</button>
                        </td>
                     </tr>`;
            });
        return html;
    }

    function borrar(index) {
        estidioSuperior.splice(index, 1);
        $('#bodyTable').html(estructurarTablaDeCarreras());
    }

    function editar(index) {
        $('#tipo_educacion_superior option').attr('selected', false);
        $('#estado_actual option').attr('selected', false);
        $('#tipo_educacion_superior').val(estidioSuperior[index].tipo_educacion_superior);
        $('#estado_actual').val(estidioSuperior[index].estado_actual);
        $('#nombre_carrera').val(estidioSuperior[index].nombre_carrera);
        $('#agregarCarrera').data('index', index); //-1 = Register, >=0 = Actualizar
    }

</script>


@endsection