<?php

namespace App\Filters;

class DailyFilter extends QueryFilter{
    public function user_id($id = null){
        return $this->builder->when($id, function($query) use($id){
            $query->where('user_id', $id);
        });
    }
}