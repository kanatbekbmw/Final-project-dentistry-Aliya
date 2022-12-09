<?php

namespace App\Http\Controllers\Admin\Doctor;

use App\Http\Controllers\Controller;
use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use App\Models\Doctors;

use Ramsey\Uuid\Type\Integer;

class DoctorInfoController extends Controller
{
    public function index()
    {
        $doctor = Doctors::all();
        return view('admin.doctor.index', compact( 'doctor'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {

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
