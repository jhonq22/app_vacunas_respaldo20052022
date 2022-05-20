<?php

namespace App\Http\Controllers;

use App\Cedulados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CeduladosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cedulados =  DB::connection('sibo')->select("SELECT lectura, numcedula, primernombre ,segundonombre, primerapellido, segundoapellido, fechanac
        FROM cedulado
        LIMIT 10");

        echo json_encode($cedulados);
    }
 


    public function show($numcedula, $lectura)
    {
      
            $cedulados = DB::connection('sibo')->select("SELECT DISTINCT  lectura, numcedula, primernombre ,segundonombre, primerapellido, segundoapellido, fechanac
            FROM cedulado
            WHERE numcedula = ? AND  lectura = ?", 
            [$numcedula, $lectura]);
    
            echo json_encode($cedulados); // para pasar en json
        
    
    }

      

  
  
}
