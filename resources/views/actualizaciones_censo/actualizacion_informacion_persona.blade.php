@extends('layouts.menu')

@section('content')

 @foreach($datos as $key=>$temp)

<!--\\\\\\\ contentpanel start\\\\\\-->
<div class="pull-left breadcrumb_admin clear_both">
    <div class="pull-left page_title theme_color">
        <h1>Actualizacion</h1>
        <h2 class="">Informacion Persona</h2>
    </div>
    <div class="pull-right">
        <ol class="breadcrumb">
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Actualizacion</a></li>
            <li class="active">Informacion Persona</li>
        </ol>
    </div>
</div>


<div class="container">
    <!--Informacion menu izquierda-->
    <div class="col-md-3 col-sm-4 col-xs-12 ">

       <!-- <iframe frameborder="0" width="100%" scrolling="no" height="245" src="./menu-lateral2 ">


        </iframe>-->
    </div>
    <!-- Fin Informacion menu izquierda-->
    <div class="col-md-9 ">
        <div class="ContenedorFormularioCenso">

            <table>
                <tbody>
                    <tr>

                       
		-->
                       
                        <td style="width:3px;"></td>
                        <td title="-">
                            <table class="estatic">
                                <tbody>
                                    <tr>
                                        <td><b href=""> ACTUALIZAR INFORMACIÓN DE LA PERSONA </b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                     
                    </tr>
                </tbody>
            </table>




            <div class="color_infor noPrint" style="margin-top: 15px;">
                <span class="color_infor  noPrint">Usted se encuentra en:&nbsp;&nbsp;Actualizacion &gt; <font
                        color="#666666"> Informacion Persona </font></span>
            </div>

          
            <!--FIN titulo_infobasica-->
            <!-- FORMULARIO-->
            <!-- FORMULARIO-->
            <!--mENSAJE DE EERORO  , VALIDACION DEL FORMULARIO--->

            <form name="" id="Hogar" method="post" {{ route('Ingresar_Usuarios') }} action="Ingresar_Usuarios/Guardado"
                entype="multipart/form-data">

                <!--validar la solicitud. Puede usar el ayudante csrf_field para generar el campo de token:-->
                {{ csrf_field() }}
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                <div class="col-md-12 col-sm-12 col-xs-12">

                    <div class="titulo_informacion">Informacion General</div> <!-- fin titulo_informacion-->
                    <!--Inicio de formulario-->
                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <div class="col-md-6 col-sm-12 col-xs-12">


                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nombres') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control" name=""
                                        value="{{$temp->nombres}}" required autocomplete="name" autofocus>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="apellidos"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nº Identificacion') }}</label>

                                <div class="col-md-6">
                                    <input id="apellidos" type="text"
                                        class="form-control " name=""
                                        value="{{$temp->docomento_persona}}" required autocomplete="" autofocus>

                                </div>
                            </div>
							
							    <div class="form-group row">
                                <label for="apellidos"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Estado Civil') }}</label>

                                <div class="col-md-6">
                                    <input id="apellidos" type="text"
                                        class="form-control " name=""
                                        value="{{$temp->estado_civil}}" required autocomplete="" autofocus>

                                </div>
                            </div>
							<div class="form-group row">
                                <label for="apellidos"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Fecha Nacimiento') }}</label>

                                <div class="col-md-6">
                                    <input id="apellidos" type="text"
                                        class="form-control " name=""
                                        value="{{$temp->fecha_nacimiento}}" required autocomplete="" autofocus>

                                </div>
                            </div>
						
						<div class="form-group row">
                                <label for="apellidos"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Profecion') }}</label>

                                <div class="col-md-6">
                                    <input id="apellidos" type="text"
                                        class="form-control " name=""
                                        value="" required autocomplete="" autofocus>

                                </div>
                            </div>

                        

                        </div> <!-- fin columna 1-->

                        <div class="col-md-6 col-sm-12 col-xs-12">

                                  <div class="form-group row">
                                <label for="apellidos"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>

                                <div class="col-md-6">
                                    <input id="apellidos" type="text"
                                        class="form-control " name="apellidos"
                                        value="{{$temp->apellidos}}" required autocomplete="" autofocus>

                                </div>
                            </div>
							

                              <div class="form-group row">
                                <label for="apellidos"
                                    class="col-md-4 col-form-label text-md-right">{{ __('tipo ID') }}</label>

                                <div class="col-md-6">
                                    <input  type="text"
                                        class="form-control " name=""
                                        value="{{$temp->tipo_identificacion}}" required autocomplete="" autofocus>

                                </div>
                            </div>
                                  <div class="form-group row">
                                <label for="apellidos"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Genero') }}</label>

                                <div class="col-md-6">
                                    <input  type="text"
                                        class="form-control " name=""
                                        value="" required autocomplete="" autofocus>

                                </div>
                            </div>
							   <div class="form-group row">
                                <label for="apellidos"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nivel Academico ') }}</label>

                                <div class="col-md-6">
                                    <input  type="text"
                                        class="form-control " name=""
                                        value="" required autocomplete="" autofocus>

                                </div>
                            </div>
						<div class="form-group row">
                                <label for="apellidos"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Telefono ') }}</label>

                                <div class="col-md-6">
                                    <input  type="text"
                                        class="form-control " name=""
                                        value="" required autocomplete="" autofocus>

                                </div>
                            </div>

                        </div> <!-- fin columna 2-->
						   <div class="titulo_informacion">Informacion Academica</div>
						   <div class="col-md-6 col-sm-12 col-xs-12">


                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Idiosmas que habla ') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control" name=""
                                        value="" required autocomplete="name" autofocus>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="apellidos"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nº Nivel de  escrutura Namtrik') }}</label>

                                <div class="col-md-6">
                                    <input id="apellidos" type="text"
                                        class="form-control " name=""
                                        value="" required autocomplete="" autofocus>

                                </div>
                            </div>
							
							    <div class="form-group row">
                                <label for="apellidos"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nivel que habla Namtrik') }}</label>

                                <div class="col-md-6">
                                    <input id="apellidos" type="text"
                                        class="form-control " name=""
                                        value="{{$temp->estado_civil}}" required autocomplete="" autofocus>

                                </div>
                            </div>
							<div class="form-group row">
                                <label for="apellidos"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nivel que habla español') }}</label>

                                <div class="col-md-6">
                                    <input id="apellidos" type="text"
                                        class="form-control " name=""
                                        value="{{$temp->fecha_nacimiento}}" required autocomplete="" autofocus>

                                </div>
                            </div>
						
						<div class="form-group row">
                                <label for="apellidos"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Carnet de salud') }}</label>

                                <div class="col-md-6">
                                    <input id="apellidos" type="text"
                                        class="form-control " name=""
                                        value="" required autocomplete="" autofocus>

                                </div>
                            </div>

                        

                        </div> <!-- fin columna 1-->
						 <div class="col-md-6 col-sm-12 col-xs-12">

                                  <div class="form-group row">
                                <label for="apellidos"
                                    class="col-md-4 col-form-label text-md-right">{{ __('----------') }}</label>

                                <div class="col-md-6">
                                    <input id="apellidos" type="text"
                                        class="form-control " name="apellidos"
                                        value="{{$temp->apellidos}}" required autocomplete="" autofocus>

                                </div>
                            </div>
							

                              <div class="form-group row">
                                <label for="apellidos"
                                    class="col-md-4 col-form-label text-md-right">{{ __('tipo ID') }}</label>

                                <div class="col-md-6">
                                    <input  type="text"
                                        class="form-control " name=""
                                        value="{{$temp->tipo_identificacion}}" required autocomplete="" autofocus>

                                </div>
                            </div>
                                  <div class="form-group row">
                                <label for="apellidos"
                                    class="col-md-4 col-form-label text-md-right">{{ __('---------') }}</label>

                                <div class="col-md-6">
                                    <input  type="text"
                                        class="form-control " name=""
                                        value="" required autocomplete="" autofocus>

                                </div>
                            </div>
							   <div class="form-group row">
                                <label for="apellidos"
                                    class="col-md-4 col-form-label text-md-right">{{ __('--------- ') }}</label>

                                <div class="col-md-6">
                                    <input  type="text"
                                        class="form-control " name=""
                                        value="" required autocomplete="" autofocus>

                                </div>
                            </div>
						<div class="form-group row">
                                <label for="apellidos"
                                    class="col-md-4 col-form-label text-md-right">{{ __('--------- ') }}</label>

                                <div class="col-md-6">
                                    <input  type="text"
                                        class="form-control " name=""
                                        value="" required autocomplete="" autofocus>

                                </div>
                            </div>

                        </div> <!-- fin columna 2-->
						
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    
                    </div><!---->
                </div><!----------->












            </form>


            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>

        </div>
        <!--FIN ContenedorFormularioCenso-->
		
    </div>
    <!--FIN col-md-9-->
</div>
<!--FIN container-->
    <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
			p
@endforeach
@endsection