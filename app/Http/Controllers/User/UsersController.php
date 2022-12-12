<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User as ModelsUser;
use Illuminate\Http\Request;

use App\Models\Clinic;
use App\Models\Doctor;
use App\Models\Services;
use App\Models\Chart;

class UsersController extends Controller
{
    public function index()
    {
        $clinic = Clinic::first();
        $doctor = Doctor::all();
        $services = Services::all();
        return view('user.index', compact('clinic', 'doctor', 'services'));
    }

    public function doctors()
    {
        $clinic = Clinic::first();
        $doctor = Doctor::all();
        return view('user.doctors', compact('clinic', 'doctor'));
    }

    public function clinic()
    {
        $clinic = Clinic::first();
        $doctor = Doctor::all();
        return view('user.clinic', compact('clinic', 'doctor'));
    }

    public function doctor($id)
    {
        $clinic = Clinic::first();
        $doctor = Doctor::find($id);
        return view('user.doctor', compact('clinic', 'doctor'));
    }

    public function services()
    {
        $clinic = Clinic::first();
        $services = Services::all();
        return view('user.services', compact('clinic', 'services'));
    }

    public function servic($id)
    {
        $clinic = Clinic::first();
        $servic = Services::find($id);
        return view('user.servic', compact('clinic', 'servic'));
    }

    public function contacts()
    {
        $clinic = Clinic::first();
        $chart = Chart::all();

        return view('user.contacts', compact('clinic', 'chart'));
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}

