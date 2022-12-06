<?php

namespace App\Http\Controllers\Admin\Record;

use Illuminate\Foundation\Auth\User;
use App\Http\Controllers\Controller;
use App\Models\User as ModelsUser;
use Illuminate\Http\Request;

use App\Models\OnlineRecord;

class RecordController extends Controller
{
    public function index()
    {
        $record = OnlineRecord::where('check', 0)->get();
        return view('admin.record.index', compact('record'));
    }

    public function index1()
    {
        $record = OnlineRecord::where('check', 1)->get();
        return view('admin.record_doctor.index', compact('record'));
    }

    public function create()
    {
        return view('admin.record.create');      
    }

    // public function create2()
    // {
    //     $user = User::where('role_id', 2)->get();
    //     return view('admin.record_doctor.create', compact('user'));        
    // }

    public function store(Request $request)
    {    
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required'],
            'number' => ['required', 'string', 'max:100'],
            'date' => ['string'],
            'time' => ['string'],
            'user_id' => ['integer'],
            'check' => ['integer'],
        ]);

        OnlineRecord::create($data);

        return Redirect(route('record'));    

    }

    // public function show($id)
    // {
        
    // }

    public function edit($id)
    {
        $card = OnlineRecord::find($id);
        $user = User::where('role_id', 2)->get();
        return view('admin.record_doctor.edit', compact('card', 'user'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required'],
            'number' => ['required', 'string', 'max:100'],
            'date' => ['string'],
            'time' => ['string'],
            'user_id' => ['integer'],
            'check' => ['integer'],
        ]);

        $card = OnlineRecord::find($id);

        $card->update($data);

        return Redirect(route('record'));            
    }

    public function destroy($id)
    {
		
    }
}
