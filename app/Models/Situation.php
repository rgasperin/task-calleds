<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Situation extends Model
{
    use HasFactory;

    protected $table='situation';

    protected $fillable = [
        'name',
    ];

    public function relCalled() {
        return $this->hasMany('App\Models\Called', 'id_situation');
    }
}
