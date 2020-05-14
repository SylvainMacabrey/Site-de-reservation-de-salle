<?php

namespace App\Http\Controllers;

use App\Lieu;
use Illuminate\Http\Request;

class LieuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Lieu::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Lieu::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lieu  $lieu
     * @return \Illuminate\Http\Response
     */
    public function show(Lieu $lieu)
    {
        return $lieu;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lieu  $lieu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lieu $lieu)
    {
        $lieu->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lieu  $lieu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lieu $lieu)
    {
        $lieu->delete();
    }
}
