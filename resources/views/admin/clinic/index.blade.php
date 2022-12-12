@extends('admin.layouts.main')
@section('content')

    <div class="content-wrapper">

        <a href="{{ route('admin-edit-clinic', $clinic->id) }}"><button type="button" class="mt-4 mb-4 btn btn-secondary">Обновить данные клиники</button></a>
        <div class="col-md-12" style="text-align: center;">

            <div>
                <h2>Название клиники</h2>
                <h3>{{ $clinic->name }}</h3>
            </div>

            <hr>

            <div>
                <h2>Описание клиники</h2>
                <h3>{{ $clinic->description }}</h3>
            </div>

            <hr>

            <div>
                <h2>Номер клиники</h2>
                <h3>{{ $clinic->number }}</h3>
            </div>

            <hr>

            <div>
                <h2>Адресс клиники</h2>
                <h3><a href="{{ $clinic->twogis }}">{{ $clinic->address }}</a></h3>
            </div>

            <hr>

            <div>
                <h2>Фото клиники</h2>
                <h3><img src="{{ asset('storage/' . $clinic->img) }}" style="width: 500px;"></h3>
            </div>


        </div>


    </div>
@endsection
