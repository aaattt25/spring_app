<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSpringRequest;
use App\Http\Requests\UpdateSpringRequest;
use App\Models\Quality;
use App\Models\Prefecture;
use App\Models\Region;
use App\Models\Spring;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;

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
        $prefectures = Prefecture::select('id', 'name')->get();
        $qualities = Quality::select('id', 'name')->get();
        // $regions = Region::select('id', 'name')->get();

        return Inertia::render('Springs/Create', [
            'prefectures' => $prefectures,
            'qualities' => $qualities,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSpringRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSpringRequest $request)
    {
        $file = request()->file('photo');
        $file_name = request()->file('photo')->getClientOriginalName();  // ファイル名とれた
        Storage::putFileAs('public/', $file, $file_name);

        Spring::create([
            'name' =>$request->name,
            'kana' =>$request->kana,
            'tel' =>$request->tel,
            'url' =>$request->url,
            'postcode' =>$request->postcode,
            // 'region_id' =>1,
            'prefecture_id' =>$request->prefecture_id,
            'city' =>$request->city,
            'address' =>$request->address,
            'quality_id' =>$request->quality_id,
            'photo' =>$file_name,
            'simple_description' =>$request->simple_description,
            'detail_description' =>$request->detail_description,
            'has_restaurant' =>$request->has_restaurant,
            'can_drop_by' =>$request->can_drop_by,
            'is_inn' =>$request->is_inn,
            'fee' =>$request->fee,
            'is_flowing_from_source' =>$request->is_flowing_from_source,
            'has_bedrock_bath' =>$request->has_bedrock_bath,
            'has_sauna' =>$request->has_sauna,
            'has_parking' =>$request->has_parking,
            'business_hours' =>$request->business_hours,
            'holiday' =>$request->holiday,
            'efficacy' =>$request->efficacy,
            'has_water_drawing_place' =>$request->has_water_drawing_place,
            'water_drawing_fee' =>$request->water_drawing_fee,
        ]);

        return to_route('springs.index')
            ->with([
                'message' => '登録しました。'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Spring  $spring
     * @return \Illuminate\Http\Response
     */
    public function show(Spring $spring)
    {
        // dd($spring);
        $quality_name = $spring->quality->name;
        return Inertia::render('Springs/Show', [
            'spring' => $spring,
            'quality_name' => $quality_name,
            'photo_url' => asset('/storage/' . $spring->photo)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Spring  $spring
     * @return \Illuminate\Http\Response
     */
    public function edit(Spring $spring)
    {
        return Inertia::render('Springs/Edit', [
            'spring' => $spring
        ]);
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
        dd($request->all());
        $file_name = request()->file('photo')->getClientOriginalName();  // ファイル名とれた
        Storage::putFileAs('public/', $file, $file_name);
        $spring->name = $request->name;
        $spring->save();

        return to_route('springs.index')->with([
            'message' => '更新しました。'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Spring  $spring
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spring $spring)
    {
        $spring->delete();

        return to_route('springs.index')
        ->with([
            'message' => '削除しました。',
        ]);
    }
}
