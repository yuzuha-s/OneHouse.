<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    use HasFactory;

    protected $table = 'checklists';

    protected $fillable = [
        'profile_id',
        'phase_id',
        'checked',
    ];
    protected $casts = [
        'checked' => 'boolean',
    ];

    public $timestamps = true;

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
    public function phase()
    {
        return $this->belongsTo(Phase::class, 'phase_id');
    }
}
