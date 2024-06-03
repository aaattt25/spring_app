<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSpringRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:50'],
            'kana' => ['required', 'regex:/\A[ァ-ヴー]+\z/u','max:50'],
            'tel' => ['required', 'max:20', 'regex:/^[0-9-]+$/'],
            'url' => ['nullable', 'url'],
            'postcode' => ['required', 'max:7'],
            'prefecture_id' => ['required'],
            'city' => ['required'],
            'address' => ['required','max:100'],
            'quality_id' => ['required'],
            'simple_description' => ['required','max:255'],
            'detail_description' => ['required','max:1000'],
            'has_restaurant' => ['required'],
            'can_drop_by' => ['required'],
            'is_inn' => ['required'],
            'fee' => ['max:500'],
            'is_flowing_from_source' => ['required'],
            'has_bedrock_bath' => ['required'],
            'has_sauna' => ['required'],
            'has_parking' => ['required'],
            'business_hours' => ['required','max:255'],
            'holiday' => ['required','max:255'],
            'efficacy' => ['required','max:500'],
            'has_water_drawing_place' => ['required'],
            'water_drawing_fee' => ['max:255'],
        ];
    }
}
