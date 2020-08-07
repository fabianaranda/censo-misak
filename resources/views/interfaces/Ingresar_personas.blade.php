@extends('layouts.menu2')

@section('styles')
<link type="text/css" rel="stylesheet" href="/css/form_ingreso_familia.css">

<!--\\\\\\\ estilos css \\\\\\-->
<link href="css/admin.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="css/estilos_pie_pagina.css">

<style>
    .Agregarpersona {
                text-decoration: none;
                padding: 4px;
                font-weight: 600;
                font-size: 10px;
                color: #ffffff;
                background-color: #5cb85c;
                border-radius: 6px;
                border: 2px solid #5cb85c;
                margin-left: 90px;
            }

            .boton_green {
                text-decoration: none;
                padding: 4px;
                font-weight: 600;
                font-size: 10px;
                color: #ffffff;
                background-color: #5cb85c;
                border-radius: 6px;
                border: 2px solid #5cb85c;
                margin-left: 250px;
                margin-left: -150px;
            }
</style>
@endsection

@section('content')

<!--\\\\\\\ contentpanel start\\\\\\-->
<div class="pull-left breadcrumb_admin clear_both">
    <div class="pull-left page_title theme_color">
        <h1>Censo Poblacional</h1>
        <h2 class="">Conformacion del hogar</h2>
    </div>
    <div class="pull-right">
        <ol class="breadcrumb">
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Censo Poblacional</a></li>
            <li class="active">Conformacion del hogar</li>
        </ol>
    </div>
</div>

<!---///////////FORMULARIO DE ENCUENTA POBLACIONAL////////////////7777----
  -----------
  ------------
  ------------>

<!-- Modal -- Codigo  obtenido desde bootstrapp Modalhttps://getbootstrap.com/docs/4.0/components/modal/-->

<!--  modal Informacion de Moduli -->

<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            Informacion de modulo
            -
            -
            -
            -
        </div>

    </div>
</div>
<!--///////fin de modal /////7-//--->

<!-- FIN-->



<!-- MODAL BUSCAR  CODIGO  DE VIVIENDA -->
<strong>
    <div class="modal fade" id="myModal_buscar_codigo_vivienda" data-keyboard="false" data-backdrop="static">
</strong>
<div class="modal-dialog modal-lg">
    <div class="modal-content  ">
        <img src="icon/Advertencia.png" width="200px" align="center">
        <div class="modal-header">
            <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
            <h4 class="modal-title">Consultar la información de código de la vivienda, ingresado el número de
                identificación de la persona que está a cargo de la casa </h4>
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
                                @csrf
                                <div id="consulta_externa">
                                    <label>Ingresar el número de identificación de la persona </label><br>
                                    <input id="nuip" name="q" class="form-control" value="{{$id_familia}}"
                                        placeholder="Digíte el número sin puntos ni comas"
                                        title="El nùmero de cèdula debe ser de 2 a 10 dígitos" value="" style="">
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
        <iframe  frameborder="0" width="100%"  height="245"   allow="fullscreen" src="/menu-lateral/40">
        
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
                                <table class="estatic">
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
                                                <b href="">PERSONAS MISAK</b>
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
                    <span class="color_infor  noPrint">Usted se encuentra en: &nbsp;&nbsp;Familia Misak &gt; <font
                            color="#666666">Conformacion del hogar</font></span>
                </div>
            
                <div class="well resume-module module-jobs">
                    <h2 class="module-title">
                        Agregar residentes y/o miembros del hogar
                    </h2>
                    <div class="js-box-laboral-experience" id="experiencia-laboral">
                        <h3 class="h4">Ingrese a las personas que conforman el hogar . </h3>
                        <div class="module-collapsible collapse in" aria-expanded="true">
                            <div class="module-summary-wrapper laboral-experience">
                                <p class="text-muted">
                                    El hogar lo conforman una, o un grupo de personas, que viven la mayor parte del
                                    tiempo en la vivienda que habita la familia, sean parentescos o no, Se trata de
                                    personas que generalmente comen juntos y atienden necesidades básicas como cargo de
                                    un presupuesto común.
                            </div>
                        </div>
                    </div>
                </div>
                <!---------------------->
                <div class="row">
                      <div class="col-md-12">

                          <div class="pull-right botones-pies">


                          <button id="editarHogarAnterior" class="btn btn-warning">Editar hogar anterior</button>

                          </div>

                      </div>
                  </div>
 <!-------------------------------------->
            </div>
            <!--FIN titulo_infobasica-->
            <!-- FORMULARIO-->   
            

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <!-- fin titulo_informacion-->
                    <!--Inicio de formulario-->


                    <div class="container">

                        <!--<div class="jumbotron">-->

                        <div class="row">
                            <div class="col-md-12 form-group input-group-sm">
                                <div class="etiqueta2"> Recuerde que los campos con un asterisco (*) son obligatorios.
                                </div>
                                
                            </div>
                        </div>
                        <!--</div>-->
                        <form id="miForm" action="">

                            <div class="row separador">
                                <div class="col-md-12 form-group text-center">
                                    Información de la persona (*)
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 form-group input-group-sm">
                                    <div class="etiqueta2 usuario">Nombres.(*)</div>
                                    <input type="text" id="nombre" name="nombre" maxlength="50" placeholder="Ingrese nombre"
                                        class="form-control" required  style="text-transform:uppercase;"   onkeyup="javascript:this.value=this.value.toUpperCase();">
                                        

                                </div>
                                <div class="col-md-4 form-group input-group-sm">
                                    <div class="etiqueta2 usuario">Apellidos.(*)</div>
                                    <input type="text" id="apellido" name="apellido" maxlength="50"
                                        placeholder="Ingrese apellido" class="form-control" required style="text-transform:uppercase;"   onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>
                                <div class="col-md-4 form-group input-group-sm">
                                    <div class="etiqueta2 usuario">Estado civil.(*)</div>
                                    <select id="estado_civil" name="estado_civil" class="form-control" required style="text-transform:uppercase;"   onkeyup="javascript:this.value=this.value.toUpperCase();">
                                        <option value="">Seleccione</option>
                                        <option value="SO">Soltero(a)</option>
                                        <option value="CA">Casado(a)</option>
                                        <option value="SE">Separado(a) o Divorciado(a)</option>
                                        <option value="VI">Viudo(a)</option>
                                        <option value="UN">Unión Libre</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 form-group input-group-sm">
                                    <div class="etiqueta2">Tipo Identificación.(*)</div>
                                    <div>
                                        <select id="tipo_identificacion" id="tipo_identificacion" name="tipo_identificacion" class="form-control" style="text-transform:uppercase;"   onkeyup="javascript:this.value=this.value.toUpperCase();">
                                            <option value="">Seleccione</option>
                                            <option value="RC">Registro Civil</option>
                                            <option value="TI">Tarjeta de Identidad</option>
                                            <option value="CC">Cedula de Ciudadania</option>
                                            <option value="CE">Cedula de Extranjeria</option>
                                            <option value="PA">Pasaporte</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4 form-group input-group-sm">
                                    <div class="etiqueta2">Numero Identificación.(*)</div>
                                    <input type="number" id="documento_persona" name="documento_persona" maxlength="30"
                                        placeholder="Ingrese identificación" class="form-control" required >
                                </div>
                                <div class="col-md-4 form-group input-group-sm">
                                    <div class="etiqueta2">Fecha de nacimiento(*)</div>
                                    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Ingrese fecha de nacimiento" class="form-control" required style="text-transform:uppercase;"   onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group input-group-sm">
                                    <div class="etiqueta2">Parentesco. (*)</div>
                                    <select id="parentesco" name="parentesco" class="form-control" required style="text-transform:uppercase;"   onkeyup="javascript:this.value=this.value.toUpperCase();">
                                        <option value="">Seleccione</option>
                                        <option value="CF">Cabeza Hogar</option>
                                        <option value="PA">Padre</option>
                                        <option value="MA">Madre</option>
                                        <option value="HI">Hijo/a</option>
                                        <option value="NI">Nieto/a</option>

                                    </select>

                                </div>
                                <div class="col-md-6 form-group input-group-sm">
                                    <div class="etiqueta2">Nivel educativo(*)</div>
                                    <select id="nivel_academico" name="nivel_academico" class="form-control" required style="text-transform:uppercase;"   onkeyup="javascript:this.value=this.value.toUpperCase();">
                                        <option value="">Seleccione</option>
                                        <option value="NE">No tiene Estodio</option>
                                        <option value="PR">Preescolar</option>
                                        <option value="P">Básica Primaria(1-5)</option>
                                        <option value="BS">Básica Secundaria(6-9)</option>
                                        <option value="MD">Media(10-13)</option>
                                        <option value="TL">Técnica Laboral</option>
                                        <option value="TP">Técnica Profesional</option>
                                        <option value="T">Tecnológica</option>
                                        <option value="PG">Universitaria</option>
                                        <option value="E">Especialización</option>
                                        <option value="M">Maestría</option>
                                        <option value="D">Doctorado</option>

                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center form-group input-group-sm">
                                    <button class="boton_green" id="btnAgregarPersona" type="submit" class="btn btn-primary">Agregar persona en el Hogar</button>
                                    &nbsp;&nbsp;
                                    <button onclick="limpiarFormulario()">Limpiar</button>
                                </div>
                            </div>
                            <br>
                        </form>
                    </div>

                    <!--------------------------------------->
                </div>

                <div class="titulo_informacion">

                    <div class="well resume-module module-jobs">
                        <h2 class="module-title">
                            Conformación del hogar
                        </h2>
                        <div class="js-box-laboral-experience" id="experiencia-laboral">
                            <h3 class="h4"> Listado de personas que conforman el hogar </h3>
                            <div class="module-collapsible collapse in" aria-expanded="true">
                                <div class="module-summary-wrapper laboral-experience">
                                    <p class="text-muted">
                                        Si, en este listado se encuentran toda las personas que conforman el hogar dar
                                        “GUARDAR Y CONTINUAR” , de lo contrario agregar otra persona, en el apartado
                                        “AGREGAR RESIDENTES Y/O MIEMBROS DEL HOGAR “
                                        Verificar si los datos ingresados en el listado del núcleo familia están
                                        correctos antes de dar “GUARDAR Y CONTINUAR” la información suministrada.

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="table-container table-responsive-md">
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">N°</th>
                        <th scope="col">N° Identificación</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Parentesco</th>
                        <th scope="col">Tipo Iden</th>
                        <th scope="col">Fecha Nacimiento</th>
                        <th scope="col">N Academico</th>
                        <th scope="col">E Civil</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody id="bodyTable">

                </tbody>
            </table>
            </div>
            {{--<button  class="btn btn-danger btn-xs" id="guardar"   onclick="location.href='{{ url('Personas',$id_familia) }}'" >Cancelar</button>
	--}}
            <br>
            
            <div>

                <!--<form method="post" action="Personas">-->
                    <div>
                        <div class="pull-left">
                            <div class="clearfix"></div>
                            <div class="form-inline input-group-sm">
                               {{-- <label ><span class="asterisco">*</span>Codigo Hogar</label>--}}
                            <input id="hogar_id" name="hogar_id" type="hidden"  value="{{$id_familia}}" tabindex="2"  class="form-control btn-warning" style="width:60px">
                            </div>
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="boton_green" id="guardar">GUARDAR Y CONTINUAR</button>
                        </div>
                    </div>
                <!--</form>-->
            </div> 

            

            <br>
            <br>
       <!---------------------->
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
                <p>¿Esta seguro que desea guadar la información?</p>
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
@endsection

@section('scripts')

<script type="text/javascript">
    
    let personas = [];
    
    
    $(document).ready(()=>{  

        window.onbeforeunload = function() { return "Your work will be lost."; };

        $.map({!! $miembros_familia !!}, (persona, index) => {
            let arrayPersona =[];
            arrayPersona[0] = persona.nombres;
            arrayPersona[1] = persona.apellidos;
            arrayPersona[2] = persona.estado_civil;
            arrayPersona[3] = persona.tipo_identificacion;
            arrayPersona[4] = persona.docomento_persona;
            arrayPersona[5] = persona.fecha_nacimiento;
            arrayPersona[6] = persona.parentesco;
            arrayPersona[7] = persona.nivel_academico;
            arrayPersona[8] = index+1;
            personas.push(arrayPersona);
        });

        if(personas.length > 0){
            cargarTabla();
        }

        $('#editarHogarAnterior').click(()=>{
            window.location.href=window.location.href.replace('/miembros','');
        });
    
        $('#miForm').on('submit', (event) => {
            event.preventDefault();
            //Validar si la persona ya existe dentro de este nucleo familiar, si es así que no se permita ingresar ya que para modificar la informacion de la persona tiene que ir al formulario de actualizar datos
            if(validarDocumento($('#documento_persona').val())){
                let persona=[];
                $.map($('#miForm').serializeArray(), function(n, i) {
                    persona[i] = n['value'];      
                });

                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('[name="_token"]').val()
                    },
                    url: "miembros/validar-existencia",
                    data: {
                        documento: persona[4]
                    } ,
                    dataType: "json",
                    success: (response) => {
                        if(!response.status){
                            Swal.fire({
                                title: '¿Está seguro?',
                                text: response.mensaje,
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Seguro'
                            }).then((result) => {
                                if(result.value){
                                    personas.push(persona);
                                    // console.log(personas);
                                    cargarTabla();
                                    limpiarFormulario();
                                }
                            });
                        }else{
                            personas.push(persona);
                            // console.log(personas);
                            cargarTabla();
                            limpiarFormulario();
                        }
                    }
                });
            }else{
                setTimeout(() => {
                    Swal.fire(
                        'Advertencia',
                        'Esta persona ya fue añadida a la tabla.',
                        'warning'
                        )
                }, 200);
            }
        });
        
        let modalConfirm = $('#ConfirmAction');
        $('#btnConfirmar').click((e) => { 
            e.preventDefault();
            $.ajax({
                url: `miembros`,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('[name="_token"]').val()
                },
                data: {
                    personas:personas,
                    hogar_id:$('#hogar_id').val()
                    },
                success: (response) => {
                    if(response.result){
                            setTimeout(() => {
                                Swal.fire(
                                    'Exito',
                                    'Se ha guardado con éxito.',
                                    'success'
                                )
                            }, 200);
                            setTimeout(function() {
                                location.href = `censo`;
                            }, 2000);
                        }else{
                            setTimeout(() => {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: response.mensaje
                                })    
                            }, 200);                            
                        }    
                },
            }).always(() => {
                modalConfirm.modal('hide');
            });
        });

        $('#guardar').click(function() {
            if (personas.length > 0) {
                modalConfirm.modal('show');    
            } else {
                setTimeout(() => {
                    Swal.fire(
                        'Advertencia',
                        'Debe ingresar personas en el Hogar.',
                        'warning'
                    );
                }, 200);
            }
        });
    });
    
    function limpiarFormulario() {
        $('#miForm')[0].reset();
    }
    
    
    function cargarTabla() {            
            var html = '';
            $.each(personas, function(index, value) {
                personas[index][8] = index + 1;
                html = html+'<tr>'+
                '<td>' + personas[index][8] + '</td>'+
                '<td>' + value[4] + '</td>' +
                '<td>' + value[0] + '</td>' + 
                '<td>' + value[1] + '</td>' + 
                '<td>' + value[6] + '</td>' +
                '<td>' + value[3] + '</td>'+
                '<td>' + value[5] + '</td>'+ 
                '<td>' + value[7] + '</td>' + 
                '<td>' + value[2] + '</td>' + 
                '<td><button style="margin:3px;" class="btn btn-warning" onclick="editar(' + index +')">Editar</button><button class="btn btn-danger" onclick="borrar(' + index +')">Eliminar</button></td>'+ 
                '</tr>';
            });
            $('#bodyTable').empty();
            $('#bodyTable').html(html);
        }
    
    function borrar(index) {
        personas.splice(index, 1);
        cargarTabla();
    }
    function validarDocumento(documento){
        let validate=true;
        personas.forEach(function(persona,index){
            if(persona[4]==documento){
                validate= false;
                return false;
            }
        });
        return validate;
    }

    function editar(index){
        limpiarFormulario();
        $('#nombre').val(personas[index][0]);
        $('#apellido').val(personas[index][1]);
        $('#estado_civil').val(personas[index][2]);
        $('#tipo_identificacion').val(personas[index][3]);
        $('#documento_persona').val(personas[index][4]);
        $('#fecha_nacimiento').val(personas[index][5]);
        $('#parentesco').val(personas[index][6]);
        $('#nivel_academico').val(personas[index][7]);
        window.scrollTo(200, screen.height/2 );
        borrar(index);
    }
    
    
    </script>
@endsection