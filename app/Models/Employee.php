<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'position_id',
        'division_id',
        'name',
    ];

    public function position(){
        return $this->belongsTo(Position::class);
    }

    public function division(){
        return $this->belongsTo(Division::class);
    }
}
