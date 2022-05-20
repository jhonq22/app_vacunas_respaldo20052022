<?php

namespace App\Http\Controllers;

use App\Parroquias;
use Illuminate\Http\Request;

class ParroquiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parroquias =Parroquias::get();
        echo json_encode($parroquias);
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
     * @param  \App\Parroquias  $parroquias
     * @return \Illuminate\Http\Response
     */
    public function show(Parroquias $parroquias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Parroquias  $parroquias
     * @return \Illuminate\Http\Response
     */
    public function edit(Parroquias $parroquias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parroquias  $parroquias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parroquias $parroquias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Parroquias  $parroquias
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parroquias $parroquias)
    {
        //
    }
}
