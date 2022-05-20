<?php

namespace App\Http\Controllers;

use App\GrupoEspeciales;
use Illuminate\Http\Request;

class GrupoEspecialesController extends Controller
{
    public function index()
    {
        $grupos =GrupoEspeciales::get();
        echo json_encode($grupos);
    }

 
  
    public function store(Request $request)
    {
        $grupo = new GrupoEspeciales();
        $grupo->grupo_especial = $request->input('grupo_especial');
        $grupo->codigo_grupo_especial = $request->input('codigo_grupo_especial');



        $grupo->save(); // para guardar en json

        echo json_encode($grupo); // para pasar en json
    }

 
    public function show($grupo_id)
    {
        $grupos =GrupoEspeciales::find($grupo_id);
        echo json_encode($grupos);
    }
      

   
    public function update(Request $request, $grupo_id)
    {
        $grupo =GrupoEspeciales::find($grupo_id);
        $grupo->grupo_especial = $request->input('grupo_especial');
        $grupo->codigo_grupo_especial = $request->input('codigo_grupo_especial');
       
      
        $grupo->save(); // para guardar en json

        echo json_encode($grupo); // para pasar en json
    }

  

   
    public function destroy($grupo_id)
    {
        $grupo =GrupoEspeciales::find($grupo_id);
        $grupo->delete();
    }
}
