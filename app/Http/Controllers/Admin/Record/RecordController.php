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

    public function record_calendar()
    {
        $days = [];
        $weekDays = [];
        $weekDate = [];
        $month = date('m');
        $year = date('y');
        $currentDay = idate('d');
        $daysInCurrentMonth =  cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $workHours = [
            ['hour' => '9:00'],
            ['hour' => '10:00'],
            ['hour' => '11:00'],
            ['hour' => '12:00'],
            ['hour' => '13:00'],
            ['hour' => '14:00'],
            ['hour' => '15:00'],
            ['hour' => '16:00'],
            ['hour' => '17:00'],
            ['hour' => '18:00']
        ];

;
        $newMonthDaysCount = 0;
        for ($i=0; $i<7; $i++) {
            $weekDays[$i]['day'] = $currentDay + $i;
            $weekDays[$i]['work_hours'] = $workHours;
            $weekDays[$i]['week_day'] = date("l", mktime(12, 0, 0, $month, $currentDay+$i, $year));
            $weekDays[$i]['week_date'] = date("Y-m-d", mktime(12, 0, 0, $month, $currentDay+$i, $year));

            if ($i == 0) {
                $weekDays[$i]['day'] = $currentDay;
            }

            if ($weekDays[$i]['day'] > $daysInCurrentMonth) {
                $weekDays[$i]['day'] = 1 + $newMonthDaysCount;
                $newMonthDaysCount++;
            }
        }


        $records = OnlineRecord::where('check', 1)->get();

        foreach ($records as $row) {
            $recordDate = $row->date;
            $recordTime = $row->time;
            $keyDate = array_search($recordDate, array_column($weekDays, 'week_date'));
            $keyTime = array_search($recordTime, array_column($weekDays[$keyDate]['work_hours'], 'hour'));

            if ($keyDate && $keyTime) {
              $weekDays[$keyDate]['work_hours'][$keyTime]['record'] = $row;
            }
        }

        $user = User::where('role_id', 2)->get();
        return view('admin.record_doctor.index', compact('records', 'user', 'weekDays', 'weekDate', 'workHours', 'month'));
    }

    public function create()
    {
        return view('admin.record.create');
    }

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
        OnlineRecord::find($id)->delete();

        return Redirect(route('record'));
    }
}
