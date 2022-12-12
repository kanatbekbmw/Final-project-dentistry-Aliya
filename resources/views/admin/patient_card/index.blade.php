@extends('admin.layouts.main')
@section('content')

<div class="content-wrapper">
    <h1 class="ml-3">Карточка пациента</h1>
  <table class="col-md-12 ml-2 table table-bordered table-sm">

    <div class="row">
        <div class="col-md-8 offset-md-2 pt-7">
            <form action="{{ route('admin-patient_card') }}" method="GET" class="mt-2">
                <div class="input-group input-group-lg">
                    <input name="search_patient" @if(isset($_GET['search_patient'])) value="{{ $_GET['search_patient'] }}" @endif type="text" class="form-control form-control-lg" placeholder="Введите ФИО пациента или номер телефона">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-lg btn-default">
                        <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

  <a href="{{ route('admin-create-card') }}"><button type="button" class="mt-4 mb-4 btn btn-secondary">Открыть карточку</button></a>
    <thead>
        <tr>
            <th>ФИО</th>
            <th>Адрес</th>
            <th>Номер телефона</th>
            <th>Дата открытия карточки</th>
            <th>Обновить</th>
            <th>Удалить</th>
        </tr>
    </thead>
    <tbody>
        @foreach($card as $row)
            <tr>
                <td><a href="{{ route('admin-show-card', $row->id) }}">{{ $row->name }}</a></td>
                <td>{{ $row->address }}</td>
                <td>{{ $row->phone }}</td>
                <td>{{ $row->created_at->format('d-m-Y')}}</td>
                <td><a href="{{ route('admin-edit-card', $row->id) }}">Обновить</a></td>
                <td>
                    <form action="{{ route('admin-destroy-card', $row->id) }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <button type="submit" class="btn btn-outline-primary">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


</div>
@endsection
