@extends('admin.layouts.main')
@section('content')

<div class="content-wrapper">
    <h1 class="ml-3">Календарь записи</h1>
    <div class="row mb-4">
        <a class="col-md-8" href="{{ route('admin-create-record') }}"><button type="button" class="mt-4 mb-4 ml-4 btn btn-secondary">Добавить запись</button></a>

        <div class="col-md-4 mt-4">
            <form action="{{ route('admin-record_doctor') }}" method="GET">
                <select name="user_id" class="custom-select" style="max-width: 80%">
                    @foreach($user as $row)
                        <option value="{{ $row->id }}" @if(isset($_GET['user_id'])) @if($_GET['user_id'] == $row->id) selected @endif @endif> {{ $row->name }} </option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-lg btn-default">
                    <i class="fa fa-search"></i>
                </button>
            </form>
        </div>
    </div>

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
        <a class="col-md-4" href="{{ route('admin-record_doctor')  }}"><button type="button" class="ml-5 mb-5 btn btn btn-info">Предыдущая неделя</button></a>
        <a class="col-md-4" href="{{ route('admin-record_doctor')  }}"><button type="button" class="ml-5 mb-5 btn btn btn-info">Текущая неделя</button></a>
        <a class="col-md-4" href="{{ route('admin-record_doctor', [$nextWeek, $month, $year])  }}"><button type="button" class="ml-5 mb-5 btn btn-info">Следующая неделя</button></a>
    </div>

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
                                    <a style="color: black" href="{{ route('admin-edit-record_doctor', $row['work_hours'][$i]['record']->id) }}">
                                        {{ $workHours[$i]['hour'] }} <br>
                                        {{ $row['work_hours'][$i]['record']->name }}
                                    </a>
                                </td>
                            <?php else: ?>
                                <td style="max-width: 15px">{{ $workHours[$i]['hour'] }}
                                    <i style="margin-left: 15px"
                                       type="button"
                                       class="fa fa-plus"
                                       aria-hidden="true"
                                       data-bs-toggle="modal"
                                       data-bs-target="#staticBackdrop"
                                       data-time="{{ $row['work_hours'][$i]['hour'] }}"
                                       data-day="{{ $currentDay }}"
                                       data-month="{{ $month }}"
                                       data-year="{{ $year }}"
                                       data-date="{{ $row['week_date'] }}"
                                    ></i>
                                </td>
                            <?php endif; ?>
                        @endforeach
                    </tr>
                @endfor
        </tbody>
    </table>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" class="plus-form" action="{{ route('admin-store-record') }}">
            <div class="modal-body">
                    @csrf

                    <div class="row mb-3">
                        <label for="name" class="col-md-3 col-form-label text-md-end">ФИО</label>

                        <div class="col-md-7">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"  required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="description" class="col-md-3 col-form-label text-md-end">Что вас беспокоит?</label>

                        <div class="col-md-7">
                            <input type="text" class="form-control @error('description') is-invalid @enderror" name="description"  required autocomplete="description" autofocus>

                            @error('description')
                            <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="number" class="col-md-3 col-form-label text-md-end">Номер телефона</label>

                        <div class="col-md-7">
                            <input type="text" class="form-control @error('number') is-invalid @enderror" name="number" required autocomplete="number" autofocus>

                            @error('number')
                            <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                            @enderror
                        </div>

                    <input type="hidden" name="check" value="1">
                    <input class='year-input' type="hidden" name="year">
                    <input class='day-input' type="hidden" name="day">
                    <input class='month-input' type="hidden" name="month">
                    <input class='date-input' type="hidden" name="date">
                    <input class='time-input' type="hidden" name="time">
                    <div class="row mb-3">
                        <label for="doctor" class="col-md-3 col-form-label text-md-end">Врач</label>

                        <div class="col-md-6">
                            <select name="user_id">
                                @foreach($user as $row)
                                    <option value="{{ $row->id }}" > {{ $row->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="doctor" class="col-md-3 col-form-label text-md-end">Дата и время</label>

                        <div class="col-md-6 col-form-label  form-date">
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Записать</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    $('.fa-plus').click(function () {
        var time = $(this).attr('data-time');
        var day = $(this).attr('data-day');
        var month = $(this).attr('data-month');
        var year = $(this).attr('data-year');
        var date = $(this).attr('data-date');

        $('.date-input').val(date);
        $('.time-input').val(time);
        $('.day-input').val(day);
        $('.year-input').val(year);
        $('.month-input').val(month);

        $('.form-date').html(month + ' ' + day + '; Время: ' + time);
    })

{{--    $('.plus-form').submit(function (e) {--}}
{{--        e.preventDefault();--}}
{{--        var form = $(this);--}}
{{--        var date = --}}
{{--        $.ajax({--}}
{{--            type: 'POST',--}}
{{--            url: '/admin/record/ajaxStore',--}}
{{--            data: form.serialize(),--}}
{{--            success: function(id)--}}
{{--            {--}}
{{--                $('.current-plus').prepend('<a style="background-color: orange" href="/admin/record_doctor/edit/'+id+'"></a>');--}}
{{--                <a style="color: black" href="/admin/record_doctor/edit/">--}}
{{--                    {{ $workHours[$i]['hour'] }} <br>--}}
{{--                    {{ $row['work_hours'][$i]['record']->name }}--}}
{{--                </a>--}}

{{--            }--}}
{{--        })--}}
{{--    })--}}
</script>
    <style>
        .fa-plus {
            margin-left: 15px;
            border-radius: 100%;
            background-color: gray;
            padding: 4px;
            float: right;
            display: none;
        }

        td:hover  .fa-plus {
            display: block;

            -webkit-animation: fadeInFromNone 0.5s ease-out;
            -moz-animation: fadeInFromNone 0.5s ease-out;
            -o-animation: fadeInFromNone 0.5s ease-out;
            animation: fadeInFromNone 0.5s ease-out;
        }

        td {
            height: 60px;
        }

        @-webkit-keyframes fadeInFromNone {
            0% {
                display: none;
                opacity: 0;
            }

            1% {
                display: block;
                opacity: 0;
            }

            100% {
                display: block;
                opacity: 1;
            }
        }

        @-moz-keyframes fadeInFromNone {
            0% {
                display: none;
                opacity: 0;
            }

            1% {
                display: block;
                opacity: 0;
            }

            100% {
                display: block;
                opacity: 1;
            }
        }

        @-o-keyframes fadeInFromNone {
            0% {
                display: none;
                opacity: 0;
            }

            1% {
                display: block;
                opacity: 0;
            }

            100% {
                display: block;
                opacity: 1;
            }
        }

        @keyframes fadeInFromNone {
            0% {
                display: none;
                opacity: 0;
            }

            1% {
                display: block;
                opacity: 0;
            }

            100% {
                display: block;
                opacity: 1;
            }
        }
    </style>
@endsection
