<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phase extends Model
{
    use HasFactory;

    protected $table = 'phases';
    protected $fillable = [
        'number',
        'list',
    ];
    public function checkList()
    {
        return $this->hasMany(Checklist::class, 'phase_id');
    }
}
