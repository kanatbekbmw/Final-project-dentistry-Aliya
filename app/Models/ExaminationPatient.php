<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExaminationPatient extends Model
{
    protected $guarded = []; 
    
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function card(){
        return $this->belongsTo('App\Models\PatientCard', 'patient_card_id', 'id');
    }


    use HasFactory;
}
