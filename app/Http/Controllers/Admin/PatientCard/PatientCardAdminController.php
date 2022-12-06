<?php

namespace App\Http\Controllers\Admin\PatientCard;

use App\Filters\PatientFilter;
use App\Http\Controllers\Controller;
use App\Models\User as ModelsUser;
use Illuminate\Http\Request;

use App\Models\PatientCard;
use App\Models\ExaminationPatient;
use App\Models\User;
use Ramsey\Uuid\Type\Integer;

class PatientCardAdminController extends Controller
{
    public function index(PatientFilter $request)
    {
        $card = PatientCard::filter($request)->get(); 
        return view('admin.patient_card.index', compact('card'));   
    }

    public function create()
    {
        $user = User::where('role_id', 2)->get();
        return view('admin.patient_card.create', compact('user'));
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

        return Redirect(route('admin-patient_card'));    
    }

    public function show($id)
    {
        $row = PatientCard::find($id);
        return view('admin.patient_card.show', compact('row'));        
    }

    public function edit($id)
    {
        $card = PatientCard::find($id);
        $user = User::where('role_id', 2)->get();
        return view('admin.patient_card.edit', compact('card', 'user'));
    }

    public function update(Request $request, $id)
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

        $card = PatientCard::find($id);

        $card->update($data);

        return Redirect(route('admin-patient_card'));       
    }

    public function destroy($id)
    {
        $examination = ExaminationPatient::where('patient_card_id', $id)->get();

        foreach($examination as $row){
            $row->delete();
        }

        PatientCard::find($id)->delete();
        
        return Redirect(route('admin-patient_card'));     
    }
}
