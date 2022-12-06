<?php

namespace App\Http\Controllers\Doctor\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index(){
        return view('doctor.main.index');
    }
}