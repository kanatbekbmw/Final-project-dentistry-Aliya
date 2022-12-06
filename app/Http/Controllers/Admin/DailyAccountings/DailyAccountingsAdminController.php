<?php

namespace App\Http\Controllers\Admin\DailyAccountings;

use App\Http\Controllers\Controller;
use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use App\Filters\DailyFilter;

use App\Models\DailyAccountings;
use Ramsey\Uuid\Type\Integer;

class DailyAccountingsAdminController extends Controller
{
    public function index(DailyFilter $request)
    {
        $card = DailyAccountings::filter($request)->paginate(10);
        $user = User::where('role_id', 2)->get();
        return view('admin.daily_accountings.index', compact('card', 'user'));
    }

    public function create()
    {
        $user = User::where('role_id', 2)->get();
        return view('admin.daily_accountings.create', compact('user'));
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

        return Redirect(route('admin-daily_accountings'));    
    }

    public function show($id)
    {
        $row = DailyAccountings::find($id);
        return view('admin.daily_accountings.show', compact('row'));        
    }

    public function edit($id)
    {
        $card = DailyAccountings::find($id);
        $user = User::where('role_id', 2)->get();
        return view('admin.daily_accountings.edit', compact('card', 'user'));
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
            'user_id' => ['required', 'integer'],
        ]);

        $card = DailyAccountings::find($id);

        $card->update($data);

        return Redirect(route('admin-daily_accountings'));
    }

    public function destroy($id)
    {
        DailyAccountings::find($id)->delete();
        
        return Redirect(route('admin-daily_accountings'));
    }
}
