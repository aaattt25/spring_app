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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SpringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $springs = Spring::select('id', 'name', 'kana','prefecture_id', 'city', 'quality_id','is_flowing_from_source', 'simple_description', 'photo')->get();
        $user_role = Auth::user()->role;
        $qualities = Quality::select('id', 'name')->get();
        $prefectures = Prefecture::select('id', 'name')->get();
        return Inertia::render('Springs/Index', [
            'springs' => $springs,
            'user_role' => $user_role,
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
        $user_role = Auth::user()->role;
        $prefecture = Prefecture::find($spring->prefecture_id);
        $quality_name = $spring->quality->name;
        return Inertia::render('Springs/Show', [
            'spring' => $spring,
            'prefecture_name' => $prefecture->name,
            'quality_name' => $quality_name,
            'photo_url' => asset('/storage/' . $spring->photo),
            'user_role' => $user_role
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
        $prefectures = Prefecture::select('id', 'name')->get();
        $qualities = Quality::select('id', 'name')->get();

        return Inertia::render('Springs/Edit', [
            'spring' => $spring,
            'prefectures' => $prefectures,
            'qualities' => $qualities,
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
        $spring->name = $request->name;
        $spring->kana = $request->kana;
        $spring->tel = $request->tel;
        $spring->url = $request->url;
        $spring->postcode = $request->postcode;
        $spring->prefecture_id = $request->prefecture_id;
        $spring->city = $request->city;
        $spring->address= $request->address;
        $spring->quality_id = $request->quality_id;
        $spring->simple_description = $request->simple_description;
        $spring->detail_description = $request->detail_description;
        $spring->has_restaurant = $request->has_restaurant;
        $spring->can_drop_by = $request->can_drop_by;
        $spring->is_inn = $request->is_inn;
        $spring->fee = $request->fee;
        $spring->is_flowing_from_source = $request->is_flowing_from_source;
        $spring->has_bedrock_bath = $request->has_bedrock_bath;
        $spring->has_sauna = $request->has_sauna;
        $spring->has_parking = $request->has_parking;
        $spring->business_hours = $request->business_hours;
        $spring->holiday = $request->holiday;
        $spring->efficacy = $request->efficacy;
        $spring->has_water_drawing_place = $request->has_water_drawing_place;
        $spring->water_drawing_fee = $request->water_drawing_fee;

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
        // Storage::delete($spring->photo);
        Storage::delete('public/' . $spring->photo);
        $spring->delete();

        return to_route('springs.index')
        ->with([
            'message' => '削除しました。',
        ]);
    }

    public function changeImage($id)
    {
        $spring = Spring::findOrFail($id);

        Storage::delete('public/' . $spring->photo);

        $file = request()->file('photo');
        $file_name = request()->file('photo')->getClientOriginalName();
        Storage::putFileAs('public/', $file, $file_name);

        $spring->photo = $file_name;
        $spring->save();

        return to_route('springs.show', ['spring' => $spring->id])
        ->with([
            'message' => '画像を変更しました。',
        ]);
    }

    public function deleteImage(Spring $spring)
    {
        // dd($spring);
        Storage::delete('public/' . $spring->photo);

        $spring->photo = null;
        $spring->save();


        return to_route('springs.show', ['spring' => $spring->id])
        ->with([
            'message' => '画像を削除しました。',
        ]);
    }
}
