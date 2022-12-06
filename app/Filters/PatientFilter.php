<?php

namespace App\Filters;

class PatientFilter extends QueryFilter{

    public function search_patient($search_string = ''){
        return $this->builder->where('name', 'LIKE', '%'.$search_string.'%')
        ->orWhere('phone', 'LIKE', '%'.$search_string.'%');
    }
}