<?php

namespace App\Http\Controllers\Doctor\ExaminationPatient;

use App\Http\Controllers\Controller;
use App\Models\User as ModelsUser;
use Illuminate\Http\Request;

use App\Models\ExaminationPatient;

use App\Models\User;
use Ramsey\Uuid\Type\Integer;

class ExaminationPatientController extends Controller
{
    public function index()
    {

    }

    public function create($idCard)
    {
        $user = User::where('role_id', 2)->get();
        return view('doctor.examination_patient.create', compact('idCard', 'user'));
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

        return Redirect(route('show-card', $idCard));
    }

    public function show($id)
    {
        $row = ExaminationPatient::find($id);
        return view('doctor.examination_patient.show', compact('row'));
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
