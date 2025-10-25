<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maker extends Model
{
    use HasFactory;
    protected $table = 'makers';
    protected $fillable = [
        'profile_id',
        'name',
        'sales',
        'option',
        'star',
    ];
    public $timestamps = true;

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class, 'maker_features', 'maker_id', 'feature_id')
            ->withTimestamps();
    }
    // イベントフック
    public static function booted() {
        static::deleted(function ($maker) {
            $maker->features()->detach();
        });
    }
}
