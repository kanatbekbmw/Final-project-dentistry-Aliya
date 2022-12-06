<?php

namespace App\Http\Controllers\Admin\Services;

use App\Models\Services;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Type\Integer;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Services::all(); 
        return view('admin.services.index', compact('services'));   
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {    
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'img' => ['file'],
        ]);

        $data['img'] = Storage::disk('public')->put('/imgServices', $data['img']);

        Services::create($data);

        return Redirect(route('admin-services'));    
    }

    public function show($id)
    {
        $row = Services::find($id);
        return view('admin.services.show', compact('row'));        
    }

    public function edit($id)
    {
        $services = Services::find($id);
        return view('admin.services.edit', compact('services'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'img' => ['file'],
        ]);

        if(isset($data['img'])) {
            $services = Services::find($id);
            $services_path = public_path(). '/storage/' . $services->img;
            unlink($services_path);
            $data['img'] = Storage::disk('public')->put('/imgServices', $data['img']);
        }

        $services = Services::find($id);
        $services->update($data);

        return Redirect(route('admin-services'));    
    }

    public function destroy($id)
    {
        $services = Services::find($id);
        $services_path = public_path(). '/storage/' . $services->img;
        unlink($services_path);

        $services->delete();

        return Redirect(route('admin-services'));    
    }
}
