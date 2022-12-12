<?php

namespace App\Http\Controllers\Admin\Clinic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Clinic;
use Ramsey\Uuid\Type\Integer;

class ClinicController extends Controller
{

    public function index()
    {
        $clinic = Clinic::first();
        return view('admin.clinic.index', compact('clinic'));
    }

    public function create()
    {
        return view('admin.clinic.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'number' => ['required', 'string'],
            'whatsapp' => ['required', 'string'],
            'address' => ['required', 'string'],
            'twogis' => ['required', 'string'],
            'img' => ['file'],
        ]);

        $data['img'] = Storage::disk('public')->put('/imgClinic', $data['img']);

        Clinic::create($data);

        return Redirect(route('admin-clinic'));
    }

    public function edit($id)
    {
        $clinic = Clinic::find($id);

        return view('admin.clinic.edit', compact('clinic'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'number' => ['required', 'string'],
            'whatsapp' => ['required', 'string'],
            'address' => ['required', 'string'],
            'twogis' => ['required', 'string'],
            'img' => ['file'],
        ]);

        if(isset($data['img'])) {
            $clinic = Clinic::find($id);
            $clinic_path = public_path(). '/storage/' . $clinic->img;
            unlink($clinic_path);
            $data['img'] = Storage::disk('public')->put('/imgClinic', $data['img']);
        }

        $clinic = Clinic::find($id);
        $clinic->update($data);

        return Redirect(route('admin-clinic'));
    }

}

