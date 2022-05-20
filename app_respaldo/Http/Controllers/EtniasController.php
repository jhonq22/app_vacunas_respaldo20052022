<?php

namespace App\Http\Controllers;

use App\Etnias;
use Illuminate\Http\Request;

class EtniasController extends Controller
{
    public function index()
    {
        $etnias =Etnias::get();
        echo json_encode($etnias);
    }

 
  
    public function store(Request $request)
    {
        $etnia = new Etnias();
        $etnia->etnia = $request->input('etnia');
        $etnia->codigo_etnia = $request->input('codigo_etnia');



        $etnia->save(); // para guardar en json

        echo json_encode($etnia); // para pasar en json
    }

 
    public function show($etnia_id)
    {
        $etnias =Etnias::find($etnia_id);
        echo json_encode($etnias);
    }
      

   
    public function update(Request $request, $etnia_id)
    {
        $etnia =Etnias::find($etnia_id);
        $etnia->etnia = $request->input('etnia');
        $etnia->codigo_etnia = $request->input('codigo_etnia');
       
      
        $etnia->save(); // para guardar en json

        echo json_encode($etnia); // para pasar en json
    }

  

   
    public function destroy($etnia_id)
    {
        $etnia =Etnias::find($etnia_id);
        $etnia->delete();
    }
}
