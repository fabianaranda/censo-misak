<?php

namespace App\Http\Controllers;

use App\Exports\ReporteCensoExport;
use App\idiomas;
use App\info_persona;
use App\limitaciones_fisinas;
use App\Personas;
use App\vivienda;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_vivienda, $id_familia)
    {
        $id_familia= base64_decode($id_familia);
        $id_vivienda= base64_decode($id_vivienda);

        $datos = Personas::select('personas.*')
        ->join('hogar_p', 'hogar_p.id', '=', 'personas.hogar_id')
        ->where([['personas.hogar_id', $id_familia], ['hogar_p.vivienda_id', $id_vivienda], ['personas.estado_persona', 1]])->get();

        if(count($datos) > 0){
            $personas_censadas = count(Personas::where([['hogar_id', $id_familia], ['status', 1], ['estado_persona', 1]])->get());

            return view('interfaces.personas',compact('datos', 'personas_censadas'));
        }
        
        abort(404);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $data)
    {
        $mensaje='Hubo un problema inesperado, comuníquese con el administrador.';
        DB::beginTransaction();

        try {
            $validatedData = Validator::make($data->all(), [
                'docomento_pdf' => 'mimes:pdf|max:1024',
                "genero" => "required|min:1|string",
                "empresa_asociativa" => "required|min:6|string",
                "carnet_salud_id" => "required|min:1|numeric|exists:carnet_salud,id",
                "profecion_id" => "required|min:1|numeric|exists:profecion,id",
                "telefono" => "required|min:1|numeric",
                "religion" => "required|min:4|string",
                "enfemerma_recurre" => "required|min:1|string",
                "comunidad_indigena" => "required|min:1|string",
                "idiomas" => "array|nullable",
                "idiomas.*" => "required|numeric|min:1|distinct",
                "habla_namuy_wam" => "required|string",
                "escritura_namuy_wam" => "required|string",
                "habla_español" => "required|string",
                "escribe_español" => "required|string",
                "vestimenta_misak" => "required|string",
                "medico_tradicional" => "required|string",
                "conocimientos_empiricos" => "required|min:1|max:10|numeric",
                "deporte_constante" => "required|min:1|numeric", // este campo en la vista no esta bien espesificado
                "lugares_sagrados" => "required|string|min:2",
                "juegos_tradicionales" => "required|string|min:2",
                "baños_etapas_vida" => "required|string",
               // "mestruacion" => "required|string|min:2",
                "enfermedades_id" => "required|min:1|numeric",
                "medicina_alternativa" => "required|string",
                "consumo_sustancias" => "required|min:1|max:4|numeric",
                "limitaciones_fisinas" => "array|nullable",
                "limitaciones_fisinas.*" => "required|min:1|numeric|distinct",
            ]);

            if ($validatedData->fails()) {
                return response()->json([
                    'errors' => $validatedData->errors(),
                    'status' => false
                ]);
            }

            $info_persona=null;
            if(\App\personas::find($data->persona_id)->status==0){
                $info_persona = new  info_persona();
            }else{
                $info_persona=info_persona::where('persona_id',$data->persona_id)->first();
                \App\info_persona_idiomas::where('info_persona_id', $info_persona->id)->delete();
                \App\info_persona_limitaciones::where('info_persona_id', $info_persona->id)->delete();
            }

            if(isset($data->documento_pdf)){

                if(isset($info_persona->docomento_pdf)){
                    Storage::delete($info_persona->docomento_pdf); //elimiar documento
                }
                $namePDF = $data->file('documento_pdf')->store('public'); // Upload PDF
                $info_persona->docomento_pdf = $namePDF;
            }
            
            $info_persona->religion = $data['religion'];
            $info_persona->persona_id = $data['persona_id'];
            $info_persona->sexo=$data['genero'];
            $info_persona->empresa_asociativa = $data['empresa_asociativa'];
            $info_persona->religion = $data['religion'];
            $info_persona->enfemerma_recurre = $data['enfemerma_recurre'];
            $info_persona->habla_namuy_wam = $data['habla_namuy_wam'];
            $info_persona->escritura_namuy_wam = $data['escritura_namuy_wam'];
            $info_persona->habla_español = $data['habla_español'];
            $info_persona->escribe_español  = $data['escribe_español'];
            $info_persona->vestimenta_misak = $data['vestimenta_misak'];
            $info_persona->medico_tradicional = $data['medico_tradicional'];
            $info_persona->conocimientos_empiricos = $data['conocimientos_empiricos'];
            $info_persona->deporte_constante = $data['deporte_constante'];
            $info_persona->lugares_sagrados = $data['lugares_sagrados'];
            $info_persona->juegos_tradicionales  = $data['juegos_tradicionales'];
            $info_persona->baños_etapas_vida = $data['baños_etapas_vida'];
            $info_persona->mestruacion = $data['mestruacion'];
            $info_persona->medicina_alternativa = $data['medicina_alternativa'];
            $info_persona->consumo_sustancias = $data['consumo_sustancias'];
            $info_persona->comunidad_indigena = $data['comunidad_indigena'];
            $info_persona->telefono = $data['telefono'];
           
            $info_persona->carnet_salud_id = $data['carnet_salud_id'];
            $info_persona->profecion_id = $data['profecion_id'];
            $info_persona->enfermedades_id = $data['enfermedades_id'];            

            if(!$info_persona->save()){
                throw new Exception();
            }
            $persona=\App\personas::find($data['persona_id']);
            $persona->status=1;
            if(!$persona->save()){
                throw new Exception();
            }

            foreach ($data->idiomas as $value) {
                $info_persona_idiomas=new \App\info_persona_idiomas();
                $info_persona_idiomas->info_persona_id=$info_persona->id;
                $info_persona_idiomas->idiomas_id=$value;                
                if(!$info_persona_idiomas->save()){
                    $mensaje='Error al asociar idiomas a la persona.';
                    throw new Exception();
                }
            }
            

            foreach ($data->limitaciones_fisinas as $value) {
                $info_persona_limitaciones=new \App\info_persona_limitaciones();
                $info_persona_limitaciones->info_persona_id=$info_persona->id;
                $info_persona_limitaciones->limitaciones_fisinas_id=$value;
                if(!$info_persona_limitaciones->save()){
                    $mensaje='Error al asociar limitaciones fisicas a la persona.';
                    throw new Exception();
                }
            }
            DB::commit();
            return response()->json([
                'status' => true,
                'id'=>$info_persona->id
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'mensaje'=>$mensaje,
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     *
     * @param  int  $numero_documento
     * @return \Illuminate\Http\Response
     */
    public function show($id_vivienda, $id_familia, $id_persona)
    {

        $id_familia= base64_decode($id_familia);
        $id_vivienda= base64_decode($id_vivienda); 
        $id_persona= base64_decode($id_persona); 

        $datos = Personas::findOrFail($id_persona);

        $profecion = DB::table("profecion")->pluck("nombre","id");

        $idiomas  =  idiomas::get();
        $limitaciones_fisinas  =  limitaciones_fisinas::get();
         
        $carnet_salud = DB::table("carnet_salud")->pluck("nombre","id");
        $enfermedades = DB::table("enfermedades")->pluck("nombre","id");
        $idiomasPersona=new \App\info_persona_idiomas();
        $limitacionesPersona=new \App\info_persona_limitaciones();

        if($datos->status==0){
            return view('interfaces.informmacion_persona', compact('limitacionesPersona','idiomasPersona','datos','profecion','idiomas','limitaciones_fisinas','carnet_salud','enfermedades'));
        }else{  
            $datosPersona=info_persona::where('persona_id',$id_persona)->first();
            $idiomasPersona=\App\info_persona_idiomas::where('info_persona_id',$datosPersona->id)->get('idiomas_id');
            $limitacionesPersona=\App\info_persona_limitaciones::where('info_persona_id',$datosPersona->id)->get('limitaciones_fisinas_id');
            return view('interfaces.informmacion_persona', compact('limitacionesPersona','idiomasPersona','datosPersona','datos','profecion','idiomas','limitaciones_fisinas','carnet_salud','enfermedades'));
        }
    }

    public  function resumen_censo($id_vivienda, $id_familia, $id_persona)
    {

        $id_familia= base64_decode($id_familia);
        $id_vivienda= base64_decode($id_vivienda); 
        $id_persona= base64_decode($id_persona); 

        $datos = Personas::select('personas.status','personas.id','personas.nombres','personas.apellidos',
        'personas.docomento_persona','personas.tipo_identificacion','info_persona.sexo','personas.fecha_nacimiento',
        'personas.estado_civil','info_persona.telefono','personas.nivel_academico','municipio.nombre_municipio',
        'resguardo.nombre_reguardo','zona.nombre_zona', 'vereda.nombre_vereda', 'sector.nombre_sector','resguardo.codigo_resguardo',
        'departamento.nombre_depatamento', 'hogar_p.id as hogar_id')       
        ->join('info_persona', 'info_persona.persona_id', '=', 'personas.id')        
        ->join('hogar_p', 'personas.hogar_id', '=', 'hogar_p.id')
        ->join('vivienda', 'vivienda.id', '=', 'hogar_p.vivienda_id')
        ->join('sector', 'vivienda.codigo_sector', '=', 'sector.codigo_sector')
        ->join('vereda', 'sector.codigo_vereda', '=', 'vereda.codigo_vereda')
       ->join('zona', 'vereda.codigo_zona', '=', 'zona.codigo_zona')
       ->join('resguardo', 'zona.codigo_resguardo', '=', 'resguardo.codigo_resguardo')
       ->join('municipio', 'resguardo.codigo_municipio', '=', 'municipio.codigo_municipio')
       ->join('departamento', 'municipio.codigo_departamento', '=', 'departamento.codigo_departamento')
       ->where([['personas.id', $id_persona], ['hogar_p.id', $id_familia], ['vivienda.id', $id_vivienda]])->get();
       return view('interfaces.resumen_censo', compact('datos'));
    }


    /**
     * Se encarga de verificar si todas las personas de estas familia ya fueron censadas correctamente para poder terminar el proceso del censo.
     *
     * @param  Request $request, ...$rest [0 => id_vivienda, 1 => id_familia]
     * @return \Illuminate\Http\Response
     */
    public function verificarEstadoCenso(Request $request, ...$rest)
    {
        if($request->ajax()){
            try {

                $personasCensadas = Personas::where([['hogar_id', base64_decode($rest[1])], ['status', "0"]])->get(['id'])->toArray();

                if(count($personasCensadas) == 0){
                    return response()->json([
                        "status" => true,
                    ]);
                }

                return response()->json([
                    "status" => false,
                    "mensaje" => "Todavia hay gente que falta por completar el censo."
                ]);

            } catch (\Throwable $th) {
                return response()->json([
                    "status" => false,
                    "mensaje" => "Ocurrio un error al terminar el censo, porfavor comuniquese con el administrador"
                ]);
            }
        }
    }

    public  function certificado_censo($id_vivienda, $id_familia)
    {

        $id_vivienda = base64_decode($id_vivienda);
        $id_familia = base64_decode($id_familia);

        //Consultar integrantes de la familia.
        $miembros_familia = Personas::where('hogar_id', $id_familia)->get([
            'docomento_persona',
            'tipo_identificacion',
            'nombres',
            'apellidos',
            'estado_civil',
            'fecha_nacimiento'
            ]);

        //Consultar informacion de la vivienda.
        $vivienda = vivienda::select(
            'vivienda.id',
            'sector.nombre_sector',
            'vereda.nombre_vereda',
            'zona.nombre_zona',
            'resguardo.nombre_reguardo',
            'municipio.nombre_municipio',
            'departamento.nombre_depatamento'
            )
        ->join('sector', 'vivienda.codigo_sector', '=', 'sector.codigo_sector')
        ->join('vereda', 'sector.codigo_vereda', '=', 'vereda.codigo_vereda')
        ->join('zona', 'vereda.codigo_zona', '=', 'zona.codigo_zona')
        ->join('resguardo', 'zona.codigo_resguardo', '=', 'resguardo.codigo_resguardo')
        ->join('municipio', 'resguardo.codigo_municipio', '=', 'municipio.codigo_municipio')
        ->join('departamento', 'municipio.codigo_departamento', '=', 'departamento.codigo_departamento')
        ->where('vivienda.id', $id_vivienda)->first();

        $fecha = Carbon::now();

       return  view('interfaces.certificado_censo_familiar', compact('vivienda', 'miembros_familia', 'fecha'));
    }


    public function consultar_vivienda_persona(Request $request)
    {
        if($request->ajax()){
            $data = $request->validate([
                'documento' => 'required|numeric|min:1'
            ]);
            
            try {
                $persona = personas::select(
                    'personas.docomento_persona',
                    'personas.nombres',
                    'personas.apellidos',
                    'vivienda.id',
                    'hogar_p.id as id_familia'
                    )
                ->join('hogar_p', 'personas.hogar_id', '=', 'hogar_p.id')
                ->join('vivienda', 'vivienda.id', '=', 'hogar_p.vivienda_id')
                ->where([['personas.docomento_persona', $data['documento']], ['personas.estado_persona', 1]])->first();

                if(isset($persona)){
                    $id_vivienda =base64_encode($persona->id);
                    $id_familia =base64_encode($persona->id_familia);
                    $persona->id = 0;
                    $persona->id_familia = 0;
                    return response()->json([
                        'status' => true,
                        'result'=> $persona,
                        'id_vivienda'=> $id_vivienda,
                        'id_familia'=> $id_familia,
                    ]);
                }

                return response()->json([
                    'status' => false,
                    'mensaje'=> 'Esta persona no existe.',
                ]);

            } catch (\Throwable $th) {
                return response()->json([
                    'status' => false,
                    'mensaje'=> 'Ocurrior un error al realizar la consulta.',
                ]);

            }
 
        }
    }

    public function actualizar_informacion_general_persona(Request $request){
        
        if($request->ajax()){

            $persona = Personas::where([['docomento_persona', $request->documento], ['estado_persona', 1], ['status', 1]])->first();

            if (isset($persona))
                return response()->json([
                    'status' => true,
                    'result' => $persona
                ]);
              else
                return response()->json([
                    'status' => false ,
                    'mensaje' => "No existe ninguna persona con esta identificación."
                ]);

        }
    
   }

   public  function vista_consulta_actualizacion_general()
   {
       return view('actualizaciones_censo.actualizacion');
   }

   public  function vista_actualizacion_datos_personales($id_persona)
   {
        $id_persona=base64_decode($id_persona);
        $profecion = DB::table("profecion")->pluck("nombre","id");

        $idiomas  =  idiomas::get();
        $limitaciones_fisinas  =  limitaciones_fisinas::get();
        $departamentos=\App\departamento::all();
        
        $carnet_salud = DB::table("carnet_salud")->pluck("nombre","id");
        $enfermedades = DB::table("enfermedades")->pluck("nombre","id");

        $datos = Personas::findOrFail($id_persona);
        $datosPersona=info_persona::where('persona_id',$id_persona)->first();
        $idiomasPersona=\App\info_persona_idiomas::where('info_persona_id',$datosPersona->id)->get('idiomas_id');
        $limitacionesPersona=\App\info_persona_limitaciones::where('info_persona_id',$datosPersona->id)->get('limitaciones_fisinas_id');
        $educacionFormal=\App\escuelacolegio::select('departamento_colegio.nombre_depatamento','municipiocolegio.nombre_municipio',
        'colegio.nombre_colegio','sede.nombre_sede','tipoe.tipo','escuelacolegio.estado','escuelacolegio.año_educacion',
        'escuelacolegio.modalidad_colegio')
        ->join('tipoe','tipoe.codigo_tipo','escuelacolegio.codigo_tipo')
        ->join('sede','tipoe.codigo_sede','sede.codigo_sede')
        ->join('colegio','colegio.codigo_colegio','sede.codigo_colegio')
        ->join('municipiocolegio','municipiocolegio.codigo_muni','colegio.codigo_muni')
        ->join('departamento_colegio','departamento_colegio.codigo_departamento','municipiocolegio.codigo_departamento')
        ->where('escuelacolegio.info_persona_id',$datosPersona->id)->get();
        $educacionFormal=count($educacionFormal)==0?new \App\escuelacolegio():$educacionFormal;
        $educacionSuperior=\App\educacion_superior::where('persona_id',$datosPersona->id)->get();
        $educacionSuperior=count($educacionSuperior)==0?new \App\educacion_superior():$educacionSuperior;
        return view('actualizaciones_censo.edit_datos_persona', compact('educacionSuperior','educacionFormal','limitacionesPersona','idiomasPersona','datosPersona','datos','profecion','idiomas','limitaciones_fisinas','carnet_salud','enfermedades', 'departamentos'));
   }



   public function update(Request $request)
   {
       if($request->ajax()){
        //    dd($request->all());
            // Validacion de los datos que llegan al request
            $request->validate([
                'docomento_pdf' => 'mimes:pdf|max:1024',
                "hoga_id" => "required|min:1|numeric",
                "persona_id" => "required|min:1|numeric",
                "nombre" => "required|min:5|string",
                "apellido" => "required|min:5|string",
                "estado_civil" => "required|min:2|string",
                "tipo_identificacion" => "required|min:2|string",
                "documento_persona" => ["required",
                                        "min:1",
                                        "numeric", 
                                        Rule::unique('personas', 'docomento_persona')->where(function ($query) use($request) {
                                            return $query->where('id', "!=", $request->persona_id);
                                        })], //consultar que este numero de documento no exista.
                "fecha_nacimiento" => "required|date",
                "parentesco" => "required|min:2|string",
                "nivel_educativo" => "required|min:1|string",
                "genero" => "required|min:1|string",
                "empresa_asociativa" => "required|min:6|string",
                "carnet_salud_id" => "required|min:1|numeric|exists:carnet_salud,id",
                "profecion_id" => "required|min:1|numeric|exists:profecion,id",
                "telefono" => "required|min:1|numeric",
                "religion" => "required|min:4|string",
                "enfemerma_recurre" => "required|min:1|string",
                "comunidad_indigena" => "required|min:1|string",
                "idiomas" => "array|nullable",
                "idiomas.*" => "required|numeric|min:1|distinct",
                "habla_namuy_wam" => "required|string",
                "escritura_namuy_wam" => "required|string",
                "habla_español" => "required|string",
                "escribe_español" => "required|string",
                "vestimenta_misak" => "required|string",
                "medico_tradicional" => "required|string",
                "conocimientos_empiricos" => "required|min:1|max:10|numeric",
                "deporte_constante" => "required|min:1|numeric", // este campo en la vista no esta bien espesificado
                "lugares_sagrados" => "required|string|min:2",
                "juegos_tradicionales" => "required|string|min:2",
                "baños_etapas_vida" => "required|string",
                //"mestruacion" => "required|string|min:2",
                "enfermedades_id" => "required|min:1|numeric",
                "medicina_alternativa" => "required|string",
                "consumo_sustancias" => "required|min:1|max:4|numeric",
                "limitaciones_fisinas" => "array|nullable",
                "limitaciones_fisinas.*" => "required|min:1|numeric|distinct",
                "departamento" => "nullable",
                "municipio" => "nullable",
                "colegio" => "nullable",
                "sede" => "nullable",
                "tipo_educacion" => "nullable",
                "estado" => "nullable",
                "anio" => "nullable",
                "modalidad" => "nullable",
                "nivel_academico" => "nullable",
            ]);

            $mensaje="Error al guardar los cambios";

            DB::beginTransaction();
            try {
                
                //Validar que la persona exista
                if(!Personas::where([['id', $request->persona_id], ['hogar_id', $request->hoga_id]])->exists()){
                    $mensaje='La persona a la que trata de actualizar los datos no existe.';
                    throw new Exception();
                }
                
                $persona = Personas::where([['id', $request->persona_id], ['hogar_id', $request->hoga_id]])->first();

                $persona->docomento_persona = $request->documento_persona;
                $persona->tipo_identificacion = $request->tipo_identificacion;
                $persona->nombres = $request->nombre;
                $persona->apellidos  = $request->apellido;
                $persona->estado_civil  = $request->estado_civil;            
                $persona->fecha_nacimiento  = $request->fecha_nacimiento;
                $persona->nivel_academico  = $request->nivel_educativo;
                $persona->parentesco  = $request->parentesco;
                $persona->hogar_id = $request->hoga_id;

                if(!$persona->save()){
                    throw new Exception();
                }

                $info_persona=info_persona::where('persona_id',$request->persona_id)->firstOrFail();

                if(isset($request->documento_pdf)){

                    if(isset($info_persona->docomento_pdf)){
                        Storage::delete($info_persona->docomento_pdf); //elimiar documento
                    }
                    $namePDF = $request->file('documento_pdf')->store('public'); // Upload PDF
                    $info_persona->docomento_pdf = $namePDF;
                }
                
                $info_persona->religion = $request['religion'];
                $info_persona->persona_id = $request['persona_id'];
                $info_persona->sexo=$request['genero'];
                $info_persona->empresa_asociativa = $request['empresa_asociativa'];
                $info_persona->religion = $request['religion'];
                $info_persona->enfemerma_recurre = $request['enfemerma_recurre'];
                $info_persona->habla_namuy_wam = $request['habla_namuy_wam'];
                $info_persona->escritura_namuy_wam = $request['escritura_namuy_wam'];
                $info_persona->habla_español = $request['habla_español'];
                $info_persona->escribe_español  = $request['escribe_español'];
                $info_persona->vestimenta_misak = $request['vestimenta_misak'];
                $info_persona->medico_tradicional = $request['medico_tradicional'];
                $info_persona->conocimientos_empiricos = $request['conocimientos_empiricos'];
                $info_persona->deporte_constante = $request['deporte_constante'];
                $info_persona->lugares_sagrados = $request['lugares_sagrados'];
                $info_persona->juegos_tradicionales  = $request['juegos_tradicionales'];
                $info_persona->baños_etapas_vida = $request['baños_etapas_vida'];
                $info_persona->mestruacion = $request['mestruacion'];
                $info_persona->medicina_alternativa = $request['medicina_alternativa'];
                $info_persona->consumo_sustancias = $request['consumo_sustancias'];
                $info_persona->comunidad_indigena = $request['comunidad_indigena'];
                $info_persona->telefono = $request['telefono'];
               
                $info_persona->carnet_salud_id = $request['carnet_salud_id'];
                $info_persona->profecion_id = $request['profecion_id'];
                $info_persona->enfermedades_id = $request['enfermedades_id'];            
    
                if(!$info_persona->save()){
                    throw new Exception();
                }

                \App\info_persona_idiomas::where('info_persona_id', $info_persona->id)->delete();
                \App\info_persona_limitaciones::where('info_persona_id', $info_persona->id)->delete();

                foreach ($request->idiomas as $value) {
                    $info_persona_idiomas=new \App\info_persona_idiomas();
                    $info_persona_idiomas->info_persona_id=$info_persona->id;
                    $info_persona_idiomas->idiomas_id=$value;                
                    if(!$info_persona_idiomas->save()){
                        $mensaje='Error al asociar idiomas a la persona.';
                        throw new Exception();
                    }
                }
                
                foreach ($request->limitaciones_fisinas as $value) {
                    $info_persona_limitaciones=new \App\info_persona_limitaciones();
                    $info_persona_limitaciones->info_persona_id=$info_persona->id;
                    $info_persona_limitaciones->limitaciones_fisinas_id=$value;
                    if(!$info_persona_limitaciones->save()){
                        $mensaje='Error al asociar limitaciones fisicas a la persona.';
                        throw new Exception();
                    }
                }

                //La persona cuenta con estudios basicos
                if(isset($request->tipo_educacion)){ 
                    \App\escuelacolegio::where('info_persona_id', $info_persona->id)->delete();
                    $educacionFormal=new \App\escuelacolegio();
                    $educacionFormal->estado= $request['estado'];
                    $educacionFormal->año_educacion= $request['anio'];
                    $educacionFormal->modalidad_colegio= $request['modalidad'];
                    $educacionFormal->codigo_tipo= $request['tipo_educacion'];
                    $educacionFormal->info_persona_id= $info_persona->id;

                    if(!$educacionFormal->save()){
                        throw new Exception();
                    }
                }
                
                DB::commit();
                return response()->json([
                    'result' => true,
                    'id'=>$info_persona->id
                ]);
            } catch (\Throwable $th) {
                DB::rollBack();
                return response()->json([
                    'mensaje' => $mensaje,
                    'result' => false
                ]);
            }
       }
   }

   public function update_educacion_superior(Request $request)
   {
       if($request->ajax()){
           $mensaje = "Ocurrio un error al tratar de registrar la educación";
            // dd($request->id_info_persona);
            $request->estudioSuperior = json_decode($request->estudioSuperior);

            // Validacion de los campos
            $request->validate([
                'estudioSuperior' => 'required|json|min:1',
                'estudioSuperior.*.tipo_educacion_superior' => 'string|max:3',
                'estudioSuperior.*.nombre_carrera' => 'string|max:50',
                'estudioSuperior.*.estado_actual' => 'string|max:12',
            ]);

            DB::beginTransaction();
            try {

                \App\educacion_superior::where('persona_id', $request->id_info_persona)->delete();

                foreach ($request->estudioSuperior as $carrera) {
                    
                    $educacion_superior = new \App\educacion_superior();
                    $educacion_superior->tipo_educacion_superior = $carrera->tipo_educacion_superior;
                    $educacion_superior->nombre_carrera = $carrera->nombre_carrera;
                    $educacion_superior->estado_actual = $carrera->estado_actual;
                    $educacion_superior->persona_id = $request->id_info_persona;
                    $educacion_superior->save();

                }
                DB::commit();
                return response()->json([
                    'result' => true,
                ]);
            } catch (\Throwable $th) {
                DB::rollBack();
                return response()->json([
                    'mensaje' => $mensaje,
                    'result' => false
                ]);  
            }
       }
   }

   function descargarDocumento($id_persona){
        try {
            $persona=info_persona::where('persona_id',$id_persona)->first();
            $pdf = Storage::get($persona->docomento_pdf); 
            return response()->json(['result' => true, 'pdf'=>base64_encode($pdf)]);
        } catch (\Throwable $th) {
            return response()->json(['result' => false]);
        }
        
    }

    public  function descargar_reporte_censo(Request $request)
    {
        return Excel::download(new ReporteCensoExport, 'reporte_censo.xlsx');
    }


    public  function interfas_cunsulta_persona()
    {
        return view('consultas.informacion_persona');
    }
      
    public function buscar_informacion_general_persona(Request $request){
        
        if($request->ajax()){

            $persona = Personas::where([['docomento_persona', $request->documento], ['estado_persona', 1], ['status', 1]])->first();

            if (isset($persona))
                return response()->json([
                    'status' => true,
                    'result' => $persona
                ]);
              else
                return response()->json([
                    'status' => false ,
                    'mensaje' => "No existe ninguna persona con esta identificación."
                ]);

        }
    
   }
   public  function vista_informacion_total_personales($id_persona)
   {
        $id_persona=base64_decode($id_persona);
        $profecion = DB::table("profecion")->pluck("nombre","id");

        $idiomas  =  idiomas::get();
        $limitaciones_fisinas  =  limitaciones_fisinas::get();
        $departamentos=\App\departamento::all();
        
        $carnet_salud = DB::table("carnet_salud")->pluck("nombre","id");
        $enfermedades = DB::table("enfermedades")->pluck("nombre","id");

        $datos = Personas::findOrFail($id_persona);
        $datosPersona=info_persona::where('persona_id',$id_persona)->first();
        $idiomasPersona=\App\info_persona_idiomas::where('info_persona_id',$datosPersona->id)->get('idiomas_id');
        $limitacionesPersona=\App\info_persona_limitaciones::where('info_persona_id',$datosPersona->id)->get('limitaciones_fisinas_id');
        $educacionFormal=\App\escuelacolegio::select('departamento_colegio.nombre_depatamento','municipiocolegio.nombre_municipio',
        'colegio.nombre_colegio','sede.nombre_sede','tipoe.tipo','escuelacolegio.estado','escuelacolegio.año_educacion',
        'escuelacolegio.modalidad_colegio')
        ->join('tipoe','tipoe.codigo_tipo','escuelacolegio.codigo_tipo')
        ->join('sede','tipoe.codigo_sede','sede.codigo_sede')
        ->join('colegio','colegio.codigo_colegio','sede.codigo_colegio')
        ->join('municipiocolegio','municipiocolegio.codigo_muni','colegio.codigo_muni')
        ->join('departamento_colegio','departamento_colegio.codigo_departamento','municipiocolegio.codigo_departamento')
        ->where('escuelacolegio.info_persona_id',$datosPersona->id)->get();
         
        $vivienda=vivienda::select('resguardo.nombre_reguardo','municipio.nombre_municipio','departamento.nombre_depatamento')
        ->join('sector','sector.codigo_sector','vivienda.codigo_sector')
        ->join('vereda','vereda.codigo_vereda','sector.codigo_vereda')
        ->join('zona','vereda.codigo_zona','zona.codigo_zona')
        ->join('resguardo','resguardo.codigo_resguardo','zona.codigo_resguardo')
        ->join('municipio','resguardo.codigo_municipio','municipio.codigo_municipio')
        ->join('departamento','departamento.codigo_departamento','departamento.codigo_departamento')
        ->where('vivienda.id', $datosPersona->id)->get();

        $educacionFormal=count($educacionFormal)==0?new \App\escuelacolegio():$educacionFormal;
        $educacionSuperior=\App\educacion_superior::where('persona_id',$datosPersona->id)->get();
        $educacionSuperior=count($educacionSuperior)==0?new \App\educacion_superior():$educacionSuperior;
        return view('consultas.informacion_total_persona', compact('educacionSuperior','educacionFormal','limitacionesPersona','idiomasPersona','datosPersona','datos','profecion','idiomas','limitaciones_fisinas','carnet_salud','enfermedades', 'departamentos','vivienda'));
   }
   public  function interfas_cunsulta_hogar()
   {     
       return view('consultas.informacion_hogar');
   }

   public function buscar_informacion_hogar_persona(Request $request){
        
    if($request->ajax()){

        $persona = Personas::where([['docomento_persona', $request->documento], ['estado_persona', 1], ['status', 1]])->first();

        if (isset($persona))
            return response()->json([
                'status' => true,
                'result' => $persona
            ]);
          else
            return response()->json([
                'status' => false ,
                'mensaje' => "No existe un hogar  con esta identificación."
            ]);

    }

}
public  function total_personas_hogar ($id_hogar)
{
 
     $datos = Personas::where('hogar_id',$id_hogar)->get();
      return view('consultas.informacion_total_hogar',compact('datos'));
}
public  function interfas_cunsulta_vivienda()
{     
    return view('consultas.informacion_vivienda');
}

public function buscar_informacion_vivienda_persona(Request $request)
{
    if($request->ajax()){
        $data = $request->validate([
            'documento' => 'required|numeric|min:1'
        ]);
        
        try {
            $persona = personas::select(
                'personas.docomento_persona',
                'personas.nombres',
                'personas.tipo_identificacion',
                'personas.apellidos',
                'personas.parentesco',
                'vivienda.id',
                'hogar_p.vivienda_id',
                'hogar_p.id as id_familia'
                )
            ->join('hogar_p', 'personas.hogar_id', '=', 'hogar_p.id')
            ->join('vivienda', 'vivienda.id', '=', 'hogar_p.vivienda_id')
            ->where([['personas.docomento_persona', $data['documento']], ['personas.estado_persona', 1]])->first();

            if(isset($persona)){
                $id_vivienda =base64_encode($persona->id);
                $id_familia =base64_encode($persona->id_familia);
                $persona->id = 0;
                $persona->id_familia = 0;
                return response()->json([
                    'status' => true,
                    'result'=> $persona,
                    'id_vivienda'=> $id_vivienda,
                    'id_familia'=> $id_familia,
                ]);
            }

            return response()->json([
                'status' => false,
                'mensaje'=> 'Esta persona no existe.',
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'mensaje'=> 'Ocurrior un error al realizar la consulta.',
            ]);

        }

    }
}

public  function total_personas_vivienda ($id_vivienda)
{
 
     $datos = DB:: table('vivienda')       
     
     ->join('sector', 'vivienda.codigo_sector', '=', 'sector.codigo_sector')
     ->join('vereda', 'sector.codigo_vereda', '=', 'vereda.codigo_vereda')
    ->join('zona', 'vereda.codigo_zona', '=', 'zona.codigo_zona')
    ->join('resguardo', 'zona.codigo_resguardo', '=', 'resguardo.codigo_resguardo')
    ->join('municipio', 'resguardo.codigo_municipio', '=', 'municipio.codigo_municipio')
    ->join('departamento', 'municipio.codigo_departamento', '=', 'departamento.codigo_departamento')
    // ->where ('personas.docomento_persona')->get ();
     ->where('vivienda.id',$id_vivienda)->get();
     
    // vivienda::where('id',$id_vivienda)->get();
      return view('consultas.informacion_total_vivienda',compact('datos'));
}

}
