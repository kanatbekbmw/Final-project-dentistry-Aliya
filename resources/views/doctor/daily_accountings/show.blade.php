@extends('doctor.layouts.main')
@section('content')

<div class="content-wrapper">
    <div class="col-md-10" style="text-align: center;">
    
        <div>
            <h4>ФИО</h4>
            <h4>{{ $row->name }}</h4>
        </div>

        <hr>

        <div>
            <h3>Дата рождения</h3>
            <h4>{{ date('d-m-Y', strtotime($row->date_of_birth)) }}</h4>
        </div>

        <hr>

        <div>
            <h3>Адрес</h3>
            <h4>{{ $row->address }}</h4>
        </div>

        <hr>

        <div>
            <h3>Диагноз</h3>
            <h4>{{ $row->diagnosis }}</h4>
        </div>

        <hr>

        <div>
            <h3>Фактически выполненный объем работы</h3>
            <h4>{{ $row->completed_work }}</h4>
        </div>

        <hr>
        
        <div>
            <h3>Дата и время приема</h3>
            <h4>{{ $row->created_at->format('d-m-Y, H: m') }}</h4>
        </div>

        <hr>

        <div>
            <h3>Санированные</h3>
            <h4>{{ $row->sanitized }}</h4>
        </div>

        <hr>

        <div>
            <h3>В т.ч санированные в плановом порядке</h3>
            <h4>{{ $row->including_sanitized_as_planned }}</h4>
        </div>

        <hr>

        <div>
            <h3>Условных единиц трудоемкасти</h3>
            <h4>{{ $row->conventional_units_of_labor_intensity }}</h4>
        </div>          

        <hr>

        <div>
            <h3>Цена</h3>
            <h4>{{ $row->price }}</h4>
        </div>          
    </div>


</div>
@endsection