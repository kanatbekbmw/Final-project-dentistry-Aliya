<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PatientCard extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function examination(){
        return $this->hasMany('App\Models\ExaminationPatient', 'patient_card_id', 'id');
    }
    
    use HasFactory;

    public function scopeFilter(Builder $builder, QueryFilter $filter){
        return $filter->apply($builder);
    }
}
