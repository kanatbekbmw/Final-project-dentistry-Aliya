<?php

namespace App\Http\Controllers\Doctor\DailyAccountings;

use App\Http\Controllers\Controller;
use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Filters\DailyFilter;

use App\Models\DailyAccountings;
use Ramsey\Uuid\Type\Integer;

class DailyAccountingsController extends Controller
{
    public function index(DailyFilter $request)
    {
        $card = DailyAccountings::where('user_id', Auth::user()->id)->filter($request)->paginate(1);
        return view('doctor.daily_accountings.index', compact('card'));
    }

    public function create()
    {
        return view('doctor.daily_accountings.create');
    }

    public function store(Request $request)
    {    
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'date_of_birth' => ['required'],
            'address' => ['required', 'string', 'max:100'],
            'diagnosis' => ['required', 'string', 'max:255'],
            'completed_work' => ['required', 'string', 'max:255'],
            'sanitized' => ['required', 'string', 'max:100'],
            'including_sanitized_as_planned' => ['required', 'string', 'max:100'],
            'conventional_units_of_labor_intensity' => ['required', 'string', 'max:100'],
            'price' => ['integer'],
            'user_id' => ['required', 'integer'],
        ]);

        DailyAccountings::create($data);

        return Redirect(route('daily_accountings'));    
    }

    public function show($id)
    {
        $row = DailyAccountings::find($id);
        return view('doctor.daily_accountings.show', compact('row'));        
    }

    public function edit($id)
    {
        $card = DailyAccountings::find($id);
        return view('doctor.daily_accountings.edit', compact('card'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'date_of_birth' => ['required'],
            'address' => ['required', 'string', 'max:100'],
            'diagnosis' => ['required', 'string', 'max:255'],
            'completed_work' => ['required', 'string', 'max:255'],
            'sanitized' => ['required', 'string', 'max:100'],
            'including_sanitized_as_planned' => ['required', 'string', 'max:100'],
            'conventional_units_of_labor_intensity' => ['required', 'string', 'max:100'],
            'price' => ['integer'],
        ]);

        $card = DailyAccountings::find($id);

        $card->update($data);

        return Redirect(route('daily_accountings'));
    }

    public function destroy($id)
    {
        DailyAccountings::find($id)->delete();
        
        return Redirect(route('daily_accountings'));
    }
}
