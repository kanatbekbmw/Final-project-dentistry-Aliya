<?php

namespace App\Http\Controllers\Admin\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Doctor;

use Ramsey\Uuid\Type\Integer;

class DoctorInfoController extends Controller
{
    public function index()
    {
        $doctor = Doctor::all();
        return view('admin.doctor.index', compact( 'doctor'));
    }

    public function create()
    {
        return view('admin.doctor.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'img' => ['file', 'required'],
            'experience' => ['required', 'integer'],
            'speciality' => ['required', 'string', 'max:255'],
            'education' => ['required', 'string', 'max:255'],
        ]);

        $data['img'] = Storage::disk('public')->put('/imgDoctor', $data['img']);

        Doctor::create($data);

        return Redirect(route('admin-doctor'));
    }

    public function show($id)
    {
        $row = Doctor::find($id);
        return view('admin.doctor.show', compact('row'));
    }

    public function edit($id)
    {
        $doctor = Doctor::find($id);
        return view('admin.doctor.edit', compact('doctor'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'img' => ['file'],
            'experience' => ['required', 'integer'],
            'speciality' => ['required', 'string', 'max:255'],
            'education' => ['required', 'string', 'max:255'],
        ]);

        if(isset($data['img'])) {
            $imgDoctor = Doctor::find($id);
            $doctor_path = public_path(). '/storage/' . $imgDoctor->img;
            unlink($doctor_path);
            $data['img'] = Storage::disk('public')->put('/imgDoctor', $data['img']);
        }

        $doctor = Doctor::find($id);
        $doctor->update($data);

        return Redirect(route('admin-doctor'));
    }

    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        $doctor_path = public_path(). '/storage/' . $doctor->img;
        unlink($doctor_path);

        $doctor->delete();

        return Redirect(route('admin-doctor'));
    }
}
