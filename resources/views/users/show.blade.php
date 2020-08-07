@extends('layouts.menu')

@section('content')

      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>USUARIOS </h1>
          <h2 class="">Nuevos Usuarios</h2>
        </div>
        <div class="pull-right">
          <ol class="breadcrumb">
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Usuarios</a></li>
            <li class="active">Nuevos Usuarios</li>
          </ol>
        </div>
      </div>

      
      <div class="container">
                    <!--Informacion menu izquierda-->
                    <div class="col-md-3 col-sm-4 col-xs-12 ">    
                                  				
                            <iframe  frameborder="0" width="100%" scrolling="no" height="245" 
							
							
                            src=" ">
                            
							
							</iframe>              
                      </div>
                        <!-- Fin Informacion menu izquierda-->    
                        <div class="col-md-9 ">
                            <div class="ContenedorFormularioCenso">
							
							                <table >
	                             <tbody>
	                                  <tr>
			                           
				 <!--
				                <td style="width:3px;"></td>
		                          <td  title="Censo del Hogar Misak  " >
		                         <table class="active" >
			                     <tbody>
			                    <tr>
				                 <td >
				                   <b  href=""  >ROLES</b>
				                 </td>
			                    </tr>
		                       </tbody>
		
		                       </table>
		                       </td>
			  
		                       <td style="width:3px;"></td>
		                        <td title="Miembros de la familia   Misak " >
		                          <table  class="active">
					              <tbody>
			                      <tr>
				                   <td ><b  href="" >PERMISOS DEL SISTEMA </b></td>
			                      </tr>
		                         </tbody>
		                       </table>
		                      </td>
		-->
                             <td style="width:3px;"></td>
		                               <td  title="Censo vivienda de familia Misak" >
				                       <table class="estatic">
			                           <tbody>
			                            <tr>
				                           <td ><b href="" > USUARIOS INGRESADOS EN  SIPEMP </b></td>
			                             </tr>
		                               </tbody>
		                                </table>
		                          </td>
                                 
                                  
                           <td style="width:3px;"></td>
                          <td  title="Información de la persona que viven dentro de la familia " >
		                       <table   class="active">
			                       <tbody>
			                        <tr>
				                      <td >
				                          <b  onclick="location.href='{{ url('Ingresar_Usuarios') }}'" > INGRESAR  NUEVO USUARIO DEL SIPEMP </b>
				                    </td>
			                        </tr>
		                         </tbody>
		
		                       </table>
		                     </td>
		
                              </tr>
                            </tbody>
                              </table>
   
							
							
							
                              <div  class="color_infor noPrint" style="margin-top: 15px;">  
					                     <span  class="color_infor  noPrint">Usted se encuentra en:&nbsp;&nbsp;Usuarios  &gt; <font color="#666666"> Nuevos Usuarios en SIPEMP </font></span>        
			                     </div>
                                 
                                  <div>
                               
			                           					
                                       <!-- <h1 >Personas </h1>-->
                                 </div><!--FIN titulo_infobasica-->
								   <!-- FORMULARIO-->
                             		   <!-- FORMULARIO-->
                                        
                                   
                                      
 
                                



    
       
            <div class="panel panel-default">
                <div class="panel-heading">Informacion de: {{ $user->name }} </div>

                <div class="panel-body">                                        
                    <p><strong>Nombre</strong>     {{ $user->name }}</p>
                    <p><strong>Apellido</strong>      {{ $user->apellidos }}</p>
                    <p><strong>Documento ID</strong>      {{ $user->cedula }}</p>
                    <p><strong>cargo</strong>      {{ $user->cargo }}</p>
                   
                    <p><strong>Email</strong>      {{ $user->email }}</p>
                    
                    <p><strong>fin_contrato</strong>      {{ $user->fin_contratO }}</p>
                    <P><strong>Inicio Cuenta </strong> {{ $user->created_at }}</p>
                </div>
            </div>
            <a class="boton_personalizado" href="{{ url('Menu-Usuarios') }}">Aceptar</a>
            </div>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
                    <br>	
                 
                
              
                            </div>
           
						   </div><!--FIN ContenedorFormularioCenso-->
				        </div><!--FIN col-md-9-->
	             </div><!--FIN container-->


                 <style> 
        .boton_personalizado{
        text-decoration: none;
          padding: 10px;
         font-weight: 600;
         font-size: 20px;
        color: #ffffff;
        background-color: #1883ba;
        border-radius: 6px;
        border: 2px solid #0016b0;
        margin-inline-start: 298px;
        }
    </style>
                 			 
	
			 


@endsection







