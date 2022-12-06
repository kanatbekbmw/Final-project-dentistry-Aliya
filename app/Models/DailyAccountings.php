<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyAccountings extends Model
{
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
   
    protected $guarded = [];  

    use HasFactory;

    public function scopeFilter(Builder $builder, QueryFilter $filter){
        return $filter->apply($builder);
    }
}
