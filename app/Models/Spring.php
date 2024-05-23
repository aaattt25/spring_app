<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spring extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'kana',
        'tel',
        'url',
        'postcode',
        'region_id',
        'prefecture_id',
        'city',
        'address',
        'quality_id',
        'photo',
        'simple_description',
        'detail_description',
        'has_restaurant',
        'has_restaurant',
        'can_drop_by',
        'is_inn',
        'fee',
        'is_flowing_from_source',
        'has_bedrock_bath',
        'has_sauna',
        'has_parking',
        'business_hours',
        'holiday',
        'efficacy',
        'has_water_drawing_place',
        'water_drawing_fee'
    ];

    public function quality()
    {
        return $this->belongsTo(Quality::class);
    }

    public function prefecture()
    {
        return $this->belongsTo(Prefecture::class);
    }
}
