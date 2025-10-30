<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandLog extends Model
{
    use HasFactory;
    protected $table = 'landlogs';
    protected $fillable = [
        'profile_id',
        'address',
        'landarea',
        'far',
        'bcr',
        'floor',
        'builable_area',
        'pricePerTsubo',

    ];
    public $timestamps = true;
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

}

