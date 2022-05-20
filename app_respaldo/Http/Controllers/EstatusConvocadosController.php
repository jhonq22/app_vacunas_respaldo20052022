<?php

namespace App\Http\Controllers;

use App\EstatusConvocados;
use Illuminate\Http\Request;

class EstatusConvocadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacunados =EstatusConvocados::get();
        echo json_encode($vacunados);
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
     * @param  \App\EstatusConvocados  $estatusConvocados
     * @return \Illuminate\Http\Response
     */
    public function show(EstatusConvocados $estatusConvocados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EstatusConvocados  $estatusConvocados
     * @return \Illuminate\Http\Response
     */
    public function edit(EstatusConvocados $estatusConvocados)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EstatusConvocados  $estatusConvocados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EstatusConvocados $estatusConvocados)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EstatusConvocados  $estatusConvocados
     * @return \Illuminate\Http\Response
     */
    public function destroy(EstatusConvocados $estatusConvocados)
    {
        //
    }
}
