<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Called extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='calleds';

    protected $dates = ['created_at','updated_at','deleted_at'];

    protected $fillable = [
        'title',
        'description',
        'situation_term',
        'id_categories',
        'id_situation',
        'call_resolved',
        'created_at',
        'updated_at',
        'deleted_at',       
    ];

    public function relCategories() {
        return $this->hasOne('App\Models\Categories', 'id', 'id_categories');
    }

    public function relSituation() {
        return $this->hasOne('App\Models\Situation', 'id', 'id_situation');
    }
}
