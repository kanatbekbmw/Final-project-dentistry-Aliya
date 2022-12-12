@extends('doctor.layouts.main')
@section('content')

<div class="content-wrapper">
    <h2 class="mt-3 ml-3 mb-3">Осмотор пациента</h2>

    <div class="container mt-7">

        <div>
            <h4>Дата и время осмотра</h4>
            <h5>{{ $row->created_at->format('d-m-Y, H: m')}}</h5>
        </div>

        <hr>

        <div>
            <h4>Диагноз</h4>
            <h5>{{ $row->diagnosis }}</h5>
        </div>

        <hr>

        <div>
            <h4>Жалобы</h4>
            <h5>{{ $row->complaints }}</h5>
        </div>

        <hr>

        <div>
            <h4>Перенесенные и сопутствующие заболевания</h4>
            <h5>{{ $row->transferred_and_concomitant_diseases }}</h5>
        </div>

        <hr>

        <div>
            <h4>Развитие настоящей болезни</h4>
            <h5>{{ $row->the_development_of_a_real_disease }}</h5>
        </div>

        <hr>

        <div>
            <h4>Внешний осмотр</h4>
            <h5>{{ $row->external_inspection }}</h5>
        </div>

        <hr>

        <div>
            <h4>Прикус</h4>
            <h5>{{ $row->bite }}</h5>
        </div>

        <hr>

        <div>
            <h4>Состояние слизистой оболочки полости рта, десен, альвеолярных отростков и неба</h4>
            <h5>{{ $row->condition_of_the_oral_mucosa }}</h5>
        </div>

        <hr>

        <div>
            <h4>Данные Рентгеновских лабораторных исследований</h4>
            <h5>{{ $row->x_ray_data }}</h5>
        </div>

        <hr>

        <div>
            <h4>Лечение</h4>
            <h5>{{ $row->treatment }}</h5>
        </div>

        <hr>

    </div>
</div>
@endsection
