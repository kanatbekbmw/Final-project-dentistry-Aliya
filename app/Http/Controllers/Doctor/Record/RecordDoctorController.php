<?php

namespace App\Http\Controllers\Doctor\Record;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;
use App\Http\Controllers\Controller;
use App\Models\User as ModelsUser;
use Illuminate\Http\Request;

use App\Models\OnlineRecord;

class RecordDoctorController extends Controller
{
    public $hours = [
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

    public $monthNames =  [
        1 => 'Январь',
        2 => 'Февраль',
        3 => 'Март',
        4 => 'Апрель',
        5 => 'Май',
        6 => 'Июнь',
        7 => 'Июль',
        8 => 'Август',
        9 => 'Сентябрь',
        10 => 'Октябрь',
        11 => 'Ноябрь',
        12 => 'Декабрь',
    ];

    public $dayNames = [
        'Monday' => 'Понедельник',
        'Tuesday' => 'Вторник',
        'Wednesday' => 'Среда',
        'Thursday' => 'Четверг',
        'Friday' => 'Пятница',
        'Saturday' => 'Суббота',
        'Sunday' => 'Воскресенье',
    ];



    public function index()
    {

    }

    public function record_calendar($day = null, $month = null, $year = null)
    {
        //$days = $this->dayNames;
        $weekDays = [];
        $weekDate = [];
        $monthName = $this->monthNames;
        $month = $month ? $month :date('m');
        $year = $year ? $year : date('Y');
        $currentDay = $day ? $day : idate('d');
        $daysInCurrentMonth =  cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $workHours = $this->hours;


        $newMonthDaysCount = 0;
        for ($i=0; $i<7; $i++) {
            $weekDays[$i]['month'] = $monthName[$month];
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
        $records = OnlineRecord::where('user_id', Auth::user()->id)->get();

        foreach ($records as $row) {
            $recordDate = $row->date;
            $recordTime = $row->time;

            $keyDate = array_search($recordDate, array_column($weekDays, 'week_date'));
            $keyTime = array_search($recordTime, array_column($weekDays[$keyDate]['work_hours'], 'hour'));

            if ($keyDate !== false && $keyTime !== false) {
                $weekDays[$keyDate]['work_hours'][$keyTime]['record'] = $row;
            }
        }


        return view('doctor.record_doctor.index',
            compact('records',
                'weekDays',
                'weekDate',
                'workHours',
                'month',
                'daysInCurrentMonth',
                'currentDay',
                'month',
                'year',
                'monthName'
            ));
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
        $workHours = $this->hours;

        $card = OnlineRecord::find($id);

        $todayCards = OnlineRecord::where('date', $card->date)->get();
        $i=0;
        foreach ($workHours as $hour) {
            foreach ($todayCards as $otherCard) {
                if ($otherCard->time == $hour['hour']) {
                    $workHours[$i]['busy'] = true;
                }
            }
            $i++;
        }


        $card = OnlineRecord::find($id);

        $todayCards = OnlineRecord::where('date', $card->date)->get();
        $user = User::where('role_id', 2)->get();
        return view('doctor.record_doctor.edit', compact('card', 'user', 'workHours', 'todayCards'));
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
