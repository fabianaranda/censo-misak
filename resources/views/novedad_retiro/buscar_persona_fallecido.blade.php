@extends('layouts.menu')

@section('content')
<link rel="stylesheet" href="css/estilos_pie_pagina.css">
<!-- ESTYLE BOTONES -->
<style>
    .botonBuscar {
        text-decoration: none;
        padding: 4px;
        font-weight: 600;
        font-size: 15px;
        color: #ffffff;
        background-color: #5cb85c;
        border-radius: 19px;
        border: 2px solid #5cb85c;
        margin-left: 27px;
    }

    .botonCancelar {
        text-decoration: none;
        padding: 4px;
        font-weight: 600;
        font-size: 20px;
        color: #ffffff;
        background-color: #e41b1a;
        border-radius: 16px;
        border: 2px solid #e41b1a;
        margin-left: 250px;
        margin-left: 20px;
    }

    .inputbuscar {
        text-decoration: none;
        padding: 4px;
        font-weight: 600;
        font-size: 20px;
        color: #130303;
        background-color: #ece9e9;
        border-radius: 16px;
        border: 2px solid #131111;
        margin-left: 250px;
        margin-left: 20px;
    }

</style>

<!--\\\\\\\ contentpanel start\\\\\\-->
<div class="pull-left breadcrumb_admin clear_both">
    <div class="pull-left page_title theme_color">
        <h1> Novedad Retiro</h1>
        <h2 class="">Buscar Persona Fallecida</h2>
    </div>
    <div class="pull-right">
        <ol class="breadcrumb">
            <li><a href="#">Inicio</a></li>
            <li><a href="#"> Novedad Retiro</a></li>
            <li class="active">Buscar Persona Fallecida</li>
        </ol>
    </div>
</div>

<br>
<br>
<br>
<div class="color_informacion_modulo " style="margin-top: 15px;">
    <span class="color_infor  ">Usted se encuentra en: &nbsp;&nbsp;<font color="#060505"> Sistema de Informacion
            Poblacional Misak | SIPEMP &gt; <font color="#060505">Novedad Retiro </font> &gt; <font color="#060505">
                Buscar Persona Fallecida</font> </span>
</div>

<!---//////// CONTENEDOR  INFIRMACION DE USUARIO  Y CARACTERISTICAS  ETC///////////////////////////////------->
<div class="container clear_both padding_fix">
    <!--\\\\\\\ container  start \\\\\\-->
    <div class="page-content">
        <div class="row">


            <div class="col-md-4">
                <div class="profile_bg">
                    <div class="user-profile-sidebar">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="user-identity">
                                    <!--
                       <p><i class="fa fa-users"></i> Administrador</p>
                      <h4><strong>{{ Auth::user()->name }}</strong></h4>
                      -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="account-status-data">
                        <h5>Ingrese documento de la persona fallecida</h5>

                        {{--<form id="" class="form_cunsulta" class="pocicion_formulario">
                            {{ csrf_field() }}--}}

                        <div id="consulta_externa" aling="center" style="padding:10px;">

                            <input id="documento" class="form-control" style="text-align:center;"
                                placeholder="Digíte documento de identidad" type="number">
                            <span class="animated fadeIn"></span>
                        </div>
                        <br>

                        <div class="user-button">
                            <div class="row">
                                <div>

                                    <button id="btnBuscar" class="botonBuscar" style="width: 160px">Buscar</button>

                                </div>
                            </div>
                        </div>

                        {{-- </form> --}}

                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="ContenedorFormularioCenso">
                    <div class="block-web full">
                        <ul class="nav nav-tabs nav-justified nav_bg">
                            <li class="active"><a href="#Informacion_del_sistema" data-toggle="tab"><i
                                        class="fa fa-laptop"></i>Informacion de la persona fallecida </a></li>


                        </ul>
                        <div class="tab-content">
                            <!---/////Informacion del sistema de informacion poblacional////////---->
                            <div class="tab-pane animated fadeInRight active" id="Informacion_del_sistema">
                                <div class="user-profile-content">
                                    <!--  <h5><strong>INFORMACIÓN DE LA  PERSONA N°CC:  </strong> <b> </b></h5>
                      <p> <> </p>-->
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- <h5><strong>Ingresar Informacion</strong> --</h5>-->
                                            <div class="alert alert-success" role="alert">

                                                <div class="table-responsive">
                                                    <table id="tb-fallecidos"
                                                        class="table table-bordered table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>N° CEDULA </th>
                                                                <th>NOMBRE</th>
                                                                <th>APELLIDO</th>
                                                                <th>TIPO ID</th>
                                                                <th>RESGUARDO</th>
                                                                <th>ACCIONES</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            {{--
@foreach($details as $persona)
                                                                  <tr>
                                                                      <td>{{ $persona-> nombres }}</td>
                                                            <td>{{ $persona-> apellidos }}</td>
                                                            <td>{{ $persona-> docomento_persona }}</td>
                                                            <td>{{ $persona-> tipo_identificacion }}</td>
                                                            <td>{{ $persona-> nombre_vereda }}-{{ $persona->nombre_sector }}
                                                            </td>
                                                            <td>{{ $persona-> nombre_reguardo }}</td>
                                                            <td width="10px">
                                                                <a href="{{ route('Novedad-Persona-Fallecido', $persona->id) }}"
                                                                    class="btn btn-sm btn-danger">
                                                                    Generar Retiro
                                                                </a>
                                                            </td>
                                                            </tr>
                                                            @endforeach--}}
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!------/////////Ingresar usuarios y roles en el sistema //////////////////-------------->
                    <br>
                </div>
                <!--/platafoma-->
            </div>
        </div>


        <br>
        <br>




        <!--//////Meno de informacion de sistema ,  ingresar usuarios y ver usuarios en el sistema ///////////--->
        <!--/col-md-4-->

        <!--/col-md-8-->
    </div>
</div>
<!--/row-->
</div>
</div>

@endsection

@section('script')
<script>
    $(document).ready(() => {
        $('#btnBuscar').click(() => {
          if($('#documento').val()!=''){
            $.ajax({
                type: 'GET',
                url: 'Buscar-Persona-Fallecido/'+$('#documento').val(),
                success: function (response) {
                    if (response.result) {
                        if(response.personas.length>0){
                            rows='';
                            $.each(response.personas,(index,persona)=>{
                                row='<tr>'+
                                '<td>'+persona['docomento_persona']+'</td>'+
                                '<td>'+persona['nombres']+'</td>'+
                                '<td>'+persona['apellidos']+'</td>'+
                                '<td>'+persona['tipo_identificacion']+'</td>'+
                                '<td>'+persona['nombre_reguardo']+'</td>'+
                                '<td><a href="Novedad-Persona-Fallecido/'+btoa(persona['id'])+'">Registrar Novedad</a></td>'
                                '</tr>';
                                rows=rows+row;
                            });
                            $('#tb-fallecidos tbody').empty();
                            $('#tb-fallecidos tbody').html(rows);
                        }else{
                            Swal.fire('Advertencia', 'No se han encontrado personas con este documento', 'warning')
                        }
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Hubo un error al consultar, comuniquese con el administrador.',
                        })
                    }
                },
            });
          }            
        });
    });

</script>
@endsection

