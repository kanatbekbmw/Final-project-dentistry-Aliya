<?php

namespace App\Http\Controllers\Doctor\PatientCard;

use App\Filters\PatientFilter;
use App\Http\Controllers\Controller;
use App\Models\User as ModelsUser;
use Illuminate\Http\Request;

use App\Models\PatientCard;

use App\Models\User;
use Ramsey\Uuid\Type\Integer;

class PatientCardController extends Controller
{
    public function index(PatientFilter $request)
    {
        $card = PatientCard::filter($request)->get(); 
        return view('doctor.patient_card.index', compact('card'));   
    }

    public function create()
    {
        $user = User::where('role_id', 2)->get();
        return view('doctor.patient_card.create', compact('user'));
    }

    public function store(Request $request)
    {    
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'date_of_birth' => ['required'],
            'address' => ['required', 'string', 'max:100'],
            'profession' => ['required', 'string', 'max:255'],
            'phone' => ['required','string'],
            'gender' => ['required', 'string', 'max:100'],
            'user_id' => ['required', 'integer'],
        ]);

        PatientCard::create($data);

        return Redirect(route('patient_card'));    
    }

    public function show($id)
    {
        $row = PatientCard::find($id);
        return view('doctor.patient_card.show', compact('row'));        
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
