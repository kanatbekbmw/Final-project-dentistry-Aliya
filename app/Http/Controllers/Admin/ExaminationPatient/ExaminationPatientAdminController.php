<?php

namespace App\Http\Controllers\Admin\ExaminationPatient;

use App\Http\Controllers\Controller;
use App\Models\User as ModelsUser;
use Illuminate\Http\Request;

use App\Models\ExaminationPatient;

use App\Models\User;
use Ramsey\Uuid\Type\Integer;

class ExaminationPatientAdminController extends Controller
{
    public function index()
    {
       
    }

    public function create($idCard)
    {
        $user = User::where('role_id', 2)->get();
        return view('admin.examination_patient.create', compact('idCard', 'user'));
    }

    public function store(Request $request, $idCard)
    {    
        $data = $request->validate([
            'diagnosis' => ['required', 'string'],
            'complaints' => ['required', 'string'],
            'transferred_and_concomitant_diseases' => ['string'],
            'the_development_of_a_real_disease' => ['string'],
            'external_inspection' => ['string'],
            'bite' => ['string'],
            'condition_of_the_oral_mucosa' => ['string'],
            'x_ray_data' => ['string'],
            'treatment' => ['string'],
            'user_id' => ['required', 'integer'],
            'patient_card_id' => ['required', 'integer'],
        ]);

        ExaminationPatient::create($data);

        return Redirect(route('admin-show-card', $idCard));  
    }

    public function show($id)
    {
        $row = ExaminationPatient::find($id);
        return view('admin.examination_patient.show', compact('row'));           
    }

    public function edit($id)
    {
        $examination = ExaminationPatient::find($id);
        $user = User::where('role_id', 2)->get();
        return view('admin.examination_patient.edit', compact('examination', 'user'));
    }

    public function update(Request $request, $id, ExaminationPatient $examination)
    {
        $data = $request->validate([
            'diagnosis' => ['required', 'string'],
            'complaints' => ['required', 'string'],
            'transferred_and_concomitant_diseases' => ['string'],
            'the_development_of_a_real_disease' => ['string'],
            'external_inspection' => ['string'],
            'bite' => ['string'],
            'condition_of_the_oral_mucosa' => ['string'],
            'x_ray_data' => ['string'],
            'treatment' => ['string'],
            'user_id' => ['required', 'integer'],
        ]);
       

        $examination = ExaminationPatient::find($id);

        $examination->update($data);

        return Redirect(route('admin-show-card', $examination->patient_card_id));  
    }

    public function destroy($id, ExaminationPatient $examination)
    {
        $examination = ExaminationPatient::find($id);
        $examination->delete();
        
        return Redirect(route('admin-show-card', $examination->patient_card_id));     
    }
}
