<?php

namespace App\Http\Controllers;

use App\PuebloIndigenas;
use Illuminate\Http\Request;

class PuebloIndigenasController extends Controller
{
    public function index()
    {
        $indigenas =PuebloIndigenas::get();
        echo json_encode($indigenas);
    }

 
  
    public function store(Request $request)
    {
        $indigena = new PuebloIndigenas();
        $indigena->pueblo_indigena = $request->input('pueblo_indigena');
        $indigena->codigo_indigena = $request->input('codigo_indigena');



        $indigena->save(); // para guardar en json

        echo json_encode($indigena); // para pasar en json
    }

 
    public function show($indigena_id)
    {
        $indigenas =PuebloIndigenas::find($indigena_id);
        echo json_encode($indigenas);
    }
      

   
    public function update(Request $request, $indigena_id)
    {
        $indigena =PuebloIndigenas::find($indigena_id);
        $indigena->pueblo_indigena = $request->input('pueblo_indigena');
        $indigena->codigo_indigena = $request->input('codigo_indigena');
       
      
        $indigena->save(); // para guardar en json

        echo json_encode($indigena); // para pasar en json
    }

  

   
    public function destroy($indigena_id)
    {
        $indigena =PuebloIndigenas::find($indigena_id);
        $indigena->delete();
    }
}
