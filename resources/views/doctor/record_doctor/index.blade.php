@extends('doctor.layouts.main')
@section('content')

<div class="content-wrapper">
    <h1 class="ml-3">Календарь записи</h1>


    <form class="row ml-3 mb-5">
        <?php
        $newMonthDaysCount = 0;
        for ($i=0; $i<7; $i++) {
            if ($currentDay + $i > $daysInCurrentMonth) {
                $nextWeek = 1 + $newMonthDaysCount;
                $newMonthDaysCount++;
            } else {
                $nextWeek = $currentDay + $i;
            }
        };

        if ($currentDay + $i > $daysInCurrentMonth) {
            $year = ($month + 1 > 12) ? $year + 1 : $year;
            $month = ($month + 1 > 12) ? 1 : $month + 1;
        }
        ?>

        <div class="col-md-4">
            <h5>Год {{ $year }}</h5>
        </div>
        <div class="col-md-4">
            <h5>Месяц {{ $monthName[$month] }}</h5>
        </div>
        <div class="col-md-4">
            <h5>Число {{ $currentDay . ' - ' . ($nextWeek) }}</h5>
        </div>
    </form>

    <div class="row">
        <a class="col-md-4" href="{{ route('doctor-record_doctor')  }}"><button type="button" class="ml-5 mb-5 btn btn btn-info">Предыдущая неделя</button></a>
        <a class="col-md-4" href="{{ route('doctor-record_doctor')  }}"><button type="button" class="ml-5 mb-5 btn btn btn-info">Текущая неделя</button></a>
        <a class="col-md-4" href="{{ route('doctor-record_doctor', [$nextWeek, $month, $year])  }}"><button type="button" class="ml-5 mb-5 btn btn-info">Следующая неделя</button></a>
    </div>

    <div class="row mb-4">

    <table class="col-md-12 ml-2 pb-10 table table-bordered">
        <thead>
          <tr>
                @foreach ($weekDays as $row)
                    <td style="background-color: #0ee559"> {{ $row['week_day'] }}  <br> {{ $row['day'] }} </td>
                @endforeach
          </tr>
        </thead>
        <tbody
                @for($i=0; $i<10; $i++)
                    <tr>
                        @foreach ($weekDays as $row)
                            <?php if(isset($row['work_hours'][$i]['record'])): ?>
                                <td style="background-color: orange; max-width: 15px;">
                                    <a style="color: black" href="{{ route('doctor-edit-record_doctor', $row['work_hours'][$i]['record']->id) }}">
                                        {{ $workHours[$i]['hour'] }} <br>
                                        {{ $row['work_hours'][$i]['record']->name }}
                                    </a>
                                </td>
                            <?php else: ?>
                                <td style="max-width: 15px">{{ $workHours[$i]['hour'] }} </td>
                            <?php endif; ?>
                        @endforeach
                    </tr>
                @endfor
        </tbody>
    </table>
</div>

<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Modal Heading</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                Modal body..
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
            <button type="button"></button>
        </div>

    </div>
</div>
</div>
@endsection
