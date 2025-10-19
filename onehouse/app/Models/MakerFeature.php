<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Makerfeature extends Model
{
    use HasFactory;
    protected $table = 'maker_features';
    protected $fillable = [
        'marker_id',
        'feature_tag',
    ];

    public function maker()
    {
        return $this->belongsTo(Maker::class);
    }
    public function feature()
    {
        return $this->belongsTo(Feature::class);
    }

}
