<?php

namespace App\Http\Controllers\Admin\Chart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\Chart;
use Ramsey\Uuid\Type\Integer;

class ChartController extends Controller
{
    public $day = [
        ['day' => 'Понедельник'],
        ['day' => 'Вторник'],
        ['day' => 'Среда'],
        ['day' => 'Четверг'],
        ['day' => 'Пятница'],
        ['day' => 'Суббота'],
        ['day' => 'Воскресенье'],
    ];
    public function index()
    {
        $chart = Chart::all();
        return view('admin.chart.index', compact('chart'));
    }

    public function create()
    {
        $days = $this->day;
        return view('admin.chart.create', compact('days'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'day' => ['required'],
            'time' => ['required'],
        ]);

        Chart::create($data);

        return Redirect(route('admin-chart'));
    }

    public function edit($id)
    {
        $days = $this->day;
        $chart = Chart::find($id);

        return view('admin.chart.edit', compact('chart', 'days'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'day' => ['required'],
            'time' => ['required'],
        ]);

        $chart = Chart::find($id);

        $chart->update($data);

        return Redirect(route('admin-chart'));
    }

    public function destroy($id)
    {
        Chart::find($id)->delete();

        return Redirect(route('admin-chart'));
    }
}
