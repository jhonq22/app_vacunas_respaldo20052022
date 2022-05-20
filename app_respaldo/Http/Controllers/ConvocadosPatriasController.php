<?php

namespace App\Http\Controllers;

use App\ConvocadosPatrias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\InventarioImport;




class ConvocadosPatriasController extends Controller
{
   

    public function import() 

    {
      $data = Excel::import(new InventarioImport,request()->file('file'));

    echo json_encode($data);
       

    }


     public function cedulaVacunadosRegistradoPatria($cedula, $centro_salud_id)
    {
        $inventarios = DB::select("SELECT * 
        FROM convocados_patria
        WHERE convocados_patria.cedula = ? AND convocados_patria.centro_salud_id = ?
        LIMIT 1", [$cedula, $centro_salud_id]);

        echo json_encode($inventarios); // para pasar en json
    }








    public function index()
    {
        $vacunas = DB::select("
        SELECT convocados_patria.id,  tipo_identificacion, cedula, nombres, fecha_nacimiento, edad, telefono, convocados_patria.direccion, estado, centro_salud, grupo_especial, nombre_estatus, 
        users.name AS nombre_vacunador, convocados_patria.created_at
        FROM convocados_patria
        LEFT JOIN estados ON estado_id = estados.id
        LEFT JOIN centro_salud ON centro_salud_id = centro_salud.id
        LEFT JOIN grupo_especiales ON grupo_especial_id = grupo_especiales.id
        LEFT JOIN estatus_convocados ON estatu_convocado_id = estatus_convocados.id
        LEFT JOIN users On convocados_patria.user_id = users.id
                    ");

        echo json_encode($vacunas); // para pasar en json
    }


    public function store(Request $request)
    {
        $vacunado = new ConvocadosPatrias();
        $vacunado->tipo_identificacion = $request->input('tipo_identificacion');
        $vacunado->cedula = $request->input('cedula');
        $vacunado->nombres = $request->input('nombres');
        $vacunado->fecha_nacimiento = $request->input('fecha_nacimiento');
        $vacunado->edad = $request->input('edad');
        $vacunado->telefono = $request->input('telefono');
        $vacunado->direccion = $request->input('direccion');
        $vacunado->estado_id = $request->input('estado_id');
        $vacunado->centro_salud_id = $request->input('centro_salud_id');
        $vacunado->grupo_especial_id = $request->input('grupo_especial_id');
        $vacunado->estatu_convocado_id = $request->input('estatu_convocado_id');
        $vacunado->user_id = $request->input('user_id');

        $vacunado->save(); // para guardar en json
        echo json_encode($vacunado); // para pasar en json
    }

 
    public function show($vacuna_id)
    {
        $vacunados =ConvocadosPatrias::find($vacuna_id);
        echo json_encode($vacunados);
    }
      


    public function update(Request $request, $vacuna_id)
    {
        $vacunado =ConvocadosPatrias::find($vacuna_id);
        /* $vacunado->tipo_identificacion = $request->input('tipo_identificacion');
        $vacunado->cedula = $request->input('cedula');
        $vacunado->nombres = $request->input('nombres');
        $vacunado->fecha_nacimiento = $request->input('fecha_nacimiento');
        $vacunado->edad = $request->input('edad');
        $vacunado->telefono = $request->input('telefono');
        $vacunado->direccion = $request->input('direccion');
        $vacunado->estado_id = $request->input('estado_id');
        $vacunado->centro_salud_id = $request->input('centro_salud_id');
        $vacunado->grupo_especial_id = $request->input('grupo_especial_id');*/
        $vacunado->estatu_convocado_id = $request->input('estatu_convocado_id');
        // $vacunado->user_id = $request->input('user_id');

       
      
        $vacunado->save(); // para guardar en json

        echo json_encode($vacunado); // para pasar en json
    }









}


    

