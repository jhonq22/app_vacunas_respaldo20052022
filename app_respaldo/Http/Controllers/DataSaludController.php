<?php

namespace App\Http\Controllers;

use App\DataSalud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DataSaludController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $salud = DB::select("SELECT e.estado, c.centro_salud,
(SELECT COUNT(cedula) FROM vacunados as v1 WHERE v1.centro_salud_id = c.id) AS registrado_vacunados,
(SELECT COUNT(A.cedula) FROM vacunados as A
INNER JOIN personal_salud as B
ON (A.cedula = B.cedula)
WHERE A.centro_salud_id = c.id
) AS registrado_data_salud
FROM vacunados as v
JOIN users as u ON v.user_id = u.id
JOIN estados as e ON u.estado_id = e.id
JOIN centro_salud as c ON v.centro_salud_id = c.id
GROUP BY e.estado, c.centro_salud");

        echo json_encode($salud);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DataSalud  $dataSalud
     * @return \Illuminate\Http\Response
     */
    public function show(DataSalud $dataSalud)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DataSalud  $dataSalud
     * @return \Illuminate\Http\Response
     */
    public function edit(DataSalud $dataSalud)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DataSalud  $dataSalud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataSalud $dataSalud)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DataSalud  $dataSalud
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataSalud $dataSalud)
    {
        //
    }
}
