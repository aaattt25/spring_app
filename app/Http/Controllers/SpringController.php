<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSpringRequest;
use App\Http\Requests\UpdateSpringRequest;
use App\Models\Quality;
use App\Models\Prefecture;
use App\Models\Spring;
use Inertia\Inertia;

class SpringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $springs = Spring::select('id', 'name', 'prefecture_id', 'city', 'quality_id', 'simple_description', 'photo')->get();
        $qualities = Quality::select('id', 'name')->get();
        $prefectures = Prefecture::select('id', 'name')->get();
        return Inertia::render('Springs/Index', [
            'springs' => $springs,
            'qualities' => $qualities,
            'prefectures' => $prefectures
        ]);
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
