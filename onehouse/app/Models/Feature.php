<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;
    protected $table = 'features';

    protected $fillable = [
        'category_id',
        'tag',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function makers()
    {
        return $this->belongsToMany(Maker::class, 'maker_features', 'feature_id', 'maker_id');
    }


}
