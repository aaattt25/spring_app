<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSpringRequest;
use App\Http\Requests\UpdateSpringRequest;
use App\Models\Spring;

class SpringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreSpringRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSpringRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Spring  $spring
     * @return \Illuminate\Http\Response
     */
    public function show(Spring $spring)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Spring  $spring
     * @return \Illuminate\Http\Response
     */
    public function edit(Spring $spring)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSpringRequest  $request
     * @param  \App\Models\Spring  $spring
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSpringRequest $request, Spring $spring)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Spring  $spring
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spring $spring)
    {
        //
    }
}
