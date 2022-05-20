<?php

namespace App\Http\Controllers;

use App\TipoVacunas;
use Illuminate\Http\Request;

class TipoVacunasController extends Controller

{
    
    public function index()
    {
        $vacunados =TipoVacunas::get();
        echo json_encode($vacunados);
    }

 
  
    public function store(Request $request)
    {
        $vacunado = new TipoVacunas();
        $vacunado->nombre_vacuna = $request->input('nombre_vacuna');
        $vacunado->estatus = $request->input('estatus');



        $vacunado->save(); // para guardar en json

        echo json_encode($vacunado); // para pasar en json
    }

 
    public function show($tipo_vacuna_id)
    {
        $vacunados =TipoVacunas::find($tipo_vacuna_id);
        echo json_encode($vacunados);
    }
      

   
    public function update(Request $request, $tipo_vacuna_id)
    {
        $vacunado =TipoVacunas::find($tipo_vacuna_id);
        $vacunado->nombre_vacuna = $request->input('nombre_vacuna');
        $vacunado->estatus = $request->input('estatus');
       
      
        $vacunado->save(); // para guardar en json

        echo json_encode($vacunado); // para pasar en json
    }

 
  

   
    public function destroy($tipo_vacuna_id)
    {
        $vacunado =TipoVacunas::find($tipo_vacuna_id);
        $vacunado->delete();
    }

}
