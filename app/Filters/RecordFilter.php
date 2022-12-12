<?php

namespace App\Filters;

class RecordFilter extends QueryFilter{
    public function user_id($id = 15){
        return $this->builder->when($id, function($query) use($id){
            $query->where('user_id', $id);
        });
    }
}
