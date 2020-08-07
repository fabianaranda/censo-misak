<?php

namespace App\Http\Controllers;

use App\comidas_propias;
use App\economia_familia;
use App\hogar;
use App\Hogar_Comida;
use App\Hogar_Economia;
use App\Hogar_plantaCondimentaria;
use App\Hogar_plantasAromatica;
use App\Hogar_plantasEspirituales;
use App\Hogar_plantasMedicinales;
use App\Hogar_plantasNutricional;
use App\Personas;
use App\plancondiaroma;
use App\plantaAromaticas;
use App\plantaEspirituales;
use App\plantaMedicinal;
use App\plantaNutricional;
use App\vivienda;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class FamiliaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_vivienda)
    {        
        $info['id_vivienda'] = vivienda::findOrFail(base64_decode($id_vivienda));
        $info['economia']  = economia_familia::get();
        $info['comida']  = comidas_propias::get();
        $info['plancondiaroma']  =  plancondiaroma::get();
        $info['plantaAromaticas']  =  plantaAromaticas::get();
        $info['plantaMedicinal']  =  plantaMedicinal::get(); 
        $info['plantaNutricional']  =  plantaNutricional::get();
        $info['plantaEspirituales'] =  plantaEspirituales::get();
        $hogar=new hogar();
        $economias= new Hogar_Economia();
        $comidas= new Hogar_Comida();
        $condimentarias= new Hogar_plantaCondimentaria();
        $aromaticas= new Hogar_plantasAromatica();
        $medicinales= new Hogar_plantasMedicinales();
        $nutricionales= new Hogar_plantasNutricional();
        $espirituales= new Hogar_plantasEspirituales();
        return view('interfaces.familia', $info, compact('hogar','economias','comidas','condimentarias','aromaticas','medicinales','nutricionales','espirituales'));
    
    }

    public function indexById($id_vivienda, $id_hogar){
        $info['id_vivienda'] = vivienda::findOrFail(base64_decode($id_vivienda));
        $info['economia']  = economia_familia::get();
        $info['comida']  = comidas_propias::get();
        $info['plancondiaroma']  =  plancondiaroma::get();
        $info['plantaAromaticas']  =  plantaAromaticas::get();
        $info['plantaMedicinal']  =  plantaMedicinal::get(); 
        $info['plantaNutricional']  =  plantaNutricional::get();
        $info['plantaEspirituales'] =  plantaEspirituales::get();

        $id_hogar = base64_decode($id_hogar);

        $hogar= hogar::find($id_hogar);
        $economias= Hogar_Economia::where('hogar_id',$id_hogar)->get('economia_familia_id');
        $comidas= Hogar_Comida::where('hogar_id',$id_hogar)->get('comidas_propias_id');
        $condimentarias= Hogar_plantaCondimentaria::where('hogar_id',$id_hogar)->get('id_codimentarias');
        $aromaticas= Hogar_plantasAromatica::where('hogar_id',$id_hogar)->get('id_aromaticas');
        $medicinales= Hogar_plantasMedicinales::where('hogar_id',$id_hogar)->get('id_medicinales');
        $nutricionales= Hogar_plantasNutricional::where('hogar_id',$id_hogar)->get('id_nutricionales');
        $espirituales= Hogar_plantasEspirituales::where('hogar_id',$id_hogar)->get('id_espirituales');

        return view('interfaces.familia', $info, compact('hogar','economias','comidas','condimentarias','aromaticas','medicinales','nutricionales','espirituales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id_vivienda)
    {
        if($request->ajax()){

            DB::beginTransaction();
            try {

                $validatedData = Validator::make($request->all(),[
                    "id_hogar" => "required",
                    "tipo_propiedad" => "required|min:1|max:2|numeric",
                    "vivienda_id" => "required|min:1|numeric",
                    "numero_dormitorio" => "required|min:1|numeric",
                    "dormitorio_usado" => "required|min:1|numeric",
                    "donde_preparan_alimento" => "required|min:1|max:4|numeric",
                    "num_personas_estudiando" => "required|min:0|numeric",
                    "forta_educacion_propia" => "required|min:1|numeric",
                    "gustar_edu_propia" => "required|min:1|numeric",
                    "calidad_ie_guambia" => "required|min:1|max:4|numeric",
                    "debilidades_ie_guambia" => "required|min:1|max:5|numeric",
                    "hijos_estudiando_guambia" => "required|min:0|max:1|numeric",
                    "no_estudia_guambia" => 'nullable', // este dato es necesario cuando se deligencia hijos_estudiando_guambia y es >= 1
                    "deserción_guambia" => 'nullable', // este dato es necesario cuando se deligencia hijos_estudiando_guambia y es >= 1
                    "tiempo_comida_propia" => "required|min:1|max:5|numeric",
                    "alimenta_producto_propio" => "required|min:0|max:1|numeric",
                    "aliemnta_semillas_propio" => "required|min:0|max:1|numeric",
                    "aliemnta_cultivos_propios" => "required|min:0|max:1|numeric",
                    "rituales_armonizacion" => "required|min:0|max:1|numeric",
                    "tiempo_rituales" => "nullable|min:1|max:3|numeric",
                    "plancondiaroma" => "array|min:1",
                    "plancondiaroma.*" => "numeric|distinct|min:1",
                    "economia" => "array|nullable",
                    "economia.*" => "numeric|distinct|min:1",
                    "comidas" => "array|nullable",
                    "comidas.*" => "numeric|distinct|min:1",
                    "plantaAromaticas" => "array|nullable",
                    "plantaAromaticas.*" => "numeric|distinct|min:1",
                    "plantaMedicinal" => "array|nullable",
                    "plantaMedicinal.*" => "numeric|distinct|min:1",
                    "plantaNutricional" => "array|nullable",
                    "plantaNutricional.*" => "numeric|distinct|min:1",
                    "plantaEspirituales" => "array|nullable",
                    "plantaEspirituales.*" => "numeric|distinct|min:1",
                ]);

                if ($validatedData->fails()) {
                    return response()->json([
                        'errors' => $validatedData->errors(),
                        'validate' => false
                    ]);
                }

                $validatedData = $request->all();

                $familia=null;
                if($validatedData['id_hogar']!=0){
                    $familia = hogar::find($validatedData['id_hogar']);
                }else{
                    $familia = new hogar();
                }  
                
                $familia->tipo_propietario = $validatedData['tipo_propiedad'];
                // $familia->total_personas_hogar = $validatedData['tipo_propiedad'];
                $familia->numero_dormitorio = $validatedData['numero_dormitorio'];
                $familia->dormitorio_usado = $validatedData['dormitorio_usado'];
                $familia->donde_preparan_alimento = $validatedData['donde_preparan_alimento'];
                $familia->num_personas_estudiando = $validatedData['num_personas_estudiando'];
                $familia->forta_educacion_propia = $validatedData['forta_educacion_propia'];
                $familia->gustar_edu_propia = $validatedData['gustar_edu_propia'];
                $familia->calidad_ie_guambia = $validatedData['calidad_ie_guambia'];
                $familia->debilidades_ie_guambia = $validatedData['debilidades_ie_guambia'];
                $familia->hijos_estudiando_guambia = $validatedData['hijos_estudiando_guambia'];
                if($validatedData['hijos_estudiando_guambia'] == 0){
                    $familia->no_estudia_guambia = $validatedData['no_estudia_guambia'];
                    $familia->deserción_guambia = $validatedData['deserción_guambia'];
                }else{
                    $familia->no_estudia_guambia = null;
                    $familia->deserción_guambia = null;
                }
                $familia->tiempo_comida_propia = $validatedData['tiempo_comida_propia'];
                $familia->alimenta_producto_propio = $validatedData['alimenta_producto_propio'];
                $familia->aliemnta_semillas_propio = $validatedData['aliemnta_semillas_propio'];
                $familia->aliemnta_cultivos_propios = $validatedData['aliemnta_cultivos_propios'];
                $familia->rituales_armonizacion = $validatedData['rituales_armonizacion'];
                $familia->tiempo_rituales = $validatedData['tiempo_rituales'];
                $familia->vivienda_id = base64_decode($id_vivienda);
                $familia->save();

                // Plantas Aromaticas
                if(array_key_exists('plantaAromaticas', $request->all())){
                    if(count($validatedData['plantaAromaticas']) >= 1){
                        Hogar_plantasAromatica::where('hogar_id', $familia->id)->delete();
                        foreach ($validatedData['plantaAromaticas'] as $plantaAromatica_id) {
                            $hogar_plantasAromatica = new Hogar_plantasAromatica();
                            $hogar_plantasAromatica->hogar_id = $familia->id;
                            $hogar_plantasAromatica->id_aromaticas = $plantaAromatica_id;
                            $hogar_plantasAromatica->save();
                        }
                    }
                }

                // Plantas Condimentarias
                if(array_key_exists('plancondiaroma', $request->all())){
                    if(count($validatedData['plancondiaroma']) >= 1){
                        Hogar_plantaCondimentaria::where('hogar_id', $familia->id)->delete();
                        foreach ($validatedData['plancondiaroma'] as $plantaCondimentaria_id) {
                            $hogar_plantasAromatica = new Hogar_plantaCondimentaria();
                            $hogar_plantasAromatica->hogar_id = $familia->id;
                            $hogar_plantasAromatica->id_codimentarias = $plantaCondimentaria_id;
                            $hogar_plantasAromatica->save();
                        }
                    }
                }

                // Economia Familia
                if(array_key_exists('economia', $request->all())){
                    if(count($validatedData['economia']) >= 1){
                        Hogar_Economia::where('hogar_id', $familia->id)->delete();
                        foreach ($validatedData['economia'] as $economia_id) {
                            $hogar_plantasAromatica = new Hogar_Economia();
                            $hogar_plantasAromatica->hogar_id = $familia->id;
                            $hogar_plantasAromatica->economia_familia_id = $economia_id;
                            $hogar_plantasAromatica->save();
                        }
                    }
                }

                // Comidas
                if(array_key_exists('comidas', $request->all())){
                    if(count($validatedData['comidas']) >= 1){
                        Hogar_Comida::where('hogar_id', $familia->id)->delete();
                        foreach ($validatedData['comidas'] as $comida_id) {
                            $hogar_plantasAromatica = new Hogar_Comida();
                            $hogar_plantasAromatica->hogar_id = $familia->id;
                            $hogar_plantasAromatica->comidas_propias_id = $comida_id;
                            $hogar_plantasAromatica->save();
                        }
                    }
                }

                // Plantas Medicinales
                if(array_key_exists('plantaMedicinal', $request->all())){
                    if(count($validatedData['plantaMedicinal']) >= 1){
                        Hogar_plantasMedicinales::where('hogar_id', $familia->id)->delete();
                        foreach ($validatedData['plantaMedicinal'] as $plantaMedicinal_id) {
                            $hogar_plantasAromatica = new Hogar_plantasMedicinales();
                            $hogar_plantasAromatica->hogar_id = $familia->id;
                            $hogar_plantasAromatica->id_medicinales = $plantaMedicinal_id;
                            $hogar_plantasAromatica->save();
                        }
                    }
                }

                // Plantas Medicinales
                if(array_key_exists('plantaNutricional', $request->all())){
                    if(count($validatedData['plantaNutricional']) >= 1){
                        Hogar_plantasNutricional::where('hogar_id', $familia->id)->delete();
                        foreach ($validatedData['plantaNutricional'] as $plantaNutricional_id) {
                            $hogar_plantasAromatica = new Hogar_plantasNutricional();
                            $hogar_plantasAromatica->hogar_id = $familia->id;
                            $hogar_plantasAromatica->id_nutricionales = $plantaNutricional_id;
                            $hogar_plantasAromatica->save();
                        }
                    }
                }

                // Plantas Espirituales
                if(array_key_exists('plantaEspirituales', $request->all())){
                    if(count($validatedData['plantaEspirituales']) >= 1){
                        Hogar_plantasEspirituales::where('hogar_id', $familia->id)->delete();
                        foreach ($validatedData['plantaEspirituales'] as $plantaEspirituales_id) {
                            $hogar_plantasAromatica = new Hogar_plantasEspirituales();
                            $hogar_plantasAromatica->hogar_id = $familia->id;
                            $hogar_plantasAromatica->id_espirituales = $plantaEspirituales_id;
                            $hogar_plantasAromatica->save();
                        }
                    }
                }
               
                $id = $familia->id;
                DB::commit();
                return response()->json(['validate'=>true, 'id' => base64_encode($id)]);
                
            } catch (\Throwable $th) {
                dd($th);
                DB::rollBack();
                return response()->json(['validate'=>false]);
            }

        }
    }

    public function miembros_familia($id_vivienda, $id_familia)
    {
        
        try {
        
            $id_vivienda = base64_decode($id_vivienda);
            $id_familia = base64_decode($id_familia);

            $data = hogar::where([['id', $id_familia], ['vivienda_id', $id_vivienda]])->firstOrFail();

            // Consultar miembros familia de la familia
            $miembros_familia = Personas::where([['hogar_id', $id_familia], ['estado_persona', 1], ['status', 0]])->get(['id',
                                                                    'tipo_identificacion',
                                                                    'docomento_persona', 
                                                                    'nombres', 
                                                                    'apellidos', 
                                                                    'estado_civil',
                                                                    'fecha_nacimiento',
                                                                    'nivel_academico',
                                                                    'parentesco']);

            return view('interfaces.Ingresar_personas',compact('id_familia', 'miembros_familia'));
        } catch (\Throwable $th) {
            return ['validate' => false,'msj' => 'El codigo del hogar no exixte'];
        }
    }

    public function create_grupo_familiar(Request $request, $id_vivienda, $id_familia)
    {   
        $validator = Validator::make($request->all(), [
            'personas.*.0' => 'required',
            'personas.*.1' => 'required',
            'personas.*.2' => 'required',
            'personas.*.3' => 'required',
            'personas.*.4' => 'required|numeric',
            'personas.*.5' => 'required',
            'personas.*.6' => 'required',
            'personas.*.7' => 'required',
            'personas.*.8' => 'required',
            'personas' => 'required|array|min:1',
        ]);
        // dd($request);
        if($validator->fails()){
            return response()->json([
                'mensaje' => 'Es posible que le falten datos a algunas personas, vuelve a intentar.',
                'result' => false
            ]);
        }

        $id_familia= base64_decode($id_familia);
        $id_vivienda= base64_decode($id_vivienda); 

        if($id_familia == null){
            return response()->json([
                'mensaje' => 'El código del hogar es obligatorio.',
                'result' => false
            ]);
        }else if(!\App\hogar::where([['id', $id_familia], ['vivienda_id', $id_vivienda]])->exists()){
            return response()->json([
                'mensaje' => 'No existe un hogar con ese código.',
                'result' => false
            ]);
        }
        $mensaje='Hubo un problema inesperado, comuníquese con el administrador.';
        DB::beginTransaction();
        try {
            $personas = $request->personas;

            //Eliminar unicamente las personas
            Personas::where([['hogar_id', $id_familia], ['status', 0]])->delete();

            foreach ($personas as $item) 
            { 
                //Actualziar el ID de la familia a las personas que hacen parte de ella hoy.
                $persona = Personas::where('docomento_persona', $item[4])->first();

                if($persona != null){
                    //La persona existe
                    if($persona->hogar_id != $id_familia){
                    
                        // Actualizar solo el ID de la nueva familia
                        $persona->hogar_id = $id_familia;
                        if(!$persona->save()){
                            throw new Exception();
                        }
                    }
                }else{

                    //Registrar la nueva persona o actualizar la informacin si ya existe

                    //Validar que la persona exista
                    if(Personas::where([['docomento_persona', $item[4]], ['hogar_id', '!=', $id_familia]])->exists()){
                        $mensaje='La persona con el documento '.$item[4].' ya está registrado en el sistema.';
                        throw new Exception();
                    }
                    
                    $persona = Personas::where([['docomento_persona', $item[4]], ['hogar_id', $id_familia]])->first();

                    if(!isset($persona)){
                        //Crear Nueva Perosona
                        $persona = new Personas;
                        $persona->status=0;
                    }

                }

                $persona->n_integrantes  = $item[8];
                $persona->docomento_persona = $item[4];
                $persona->tipo_identificacion = $item[3];
                $persona->nombres = $item[0];
                $persona->apellidos  = $item[1];
                $persona->estado_civil  = $item[2];            
                $persona->fecha_nacimiento  = $item[5];
                $persona->nivel_academico  = $item[7];
                $persona->parentesco  = $item[6];
                $persona->hogar_id = $id_familia;
                
            
                if(!$persona->save()){
                    throw new Exception();
                }

            }
            DB::commit();
            return response()->json([
                'result' => true,
                'hogar_id'=>base64_encode($id_familia)
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'mensaje' => $mensaje,
                'result' => false
            ]);
        }
    }


    public function validarExistenciaPersona(Request $request, $vivienda, $familia)
    {
        if($request->ajax()){
            //Valida que el documento exista en otro nucleos familiares exeptuando en el que estoy.
            if(Personas::where([['docomento_persona', $request->documento], ['hogar_id', '!=', $familia]])->exists()){
                $mensaje='La persona con el documento '.$request->documento.' ya está registrado en el sistema, si continua con el proceso esta persona pasara a pertenecer a este nucleo familiar';
                return response()->json([
                    'status' => false,
                    'mensaje' => $mensaje
                ]);
            }else{
                return response()->json([
                    'status' => true
                ]);
            }
        }

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
