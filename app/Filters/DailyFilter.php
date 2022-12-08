<?php

namespace App\Filters;

use Illuminate\Support\Carbon;

class DailyFilter extends QueryFilter{
    public function user_id($id = null){
        return $this->builder->when($id, function($query) use($id){
            $query->where('user_id', $id);
        });
    }


    public function time($time){
        $times = Carbon::now();
        $month =  $times->month;
        
        if($time == 'all'){
            return $this->builder;
        }else if($time == 'day'){
            return $this->builder->whereDate('created_at', Carbon::today());
        }else if($time == 'week'){
            return $this->builder->whereWeek('created_at', Carbon::toweek());
        }else if($time == 'month'){
            return $this->builder->whereMonth('created_at', $month);
        }
    }
}