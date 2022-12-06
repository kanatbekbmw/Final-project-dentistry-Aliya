@extends('admin.layouts.main')
@section('content')

<div class="content-wrapper">
    <a class="col-md-8" href="{{ route('admin-create-record') }}"><button type="button" class="mt-4 mb-4 ml-4 btn btn-secondary">Добавить запись</button></a>

    <table class="col-md-12 ml-2 pb-10 table table-striped">
        <thead>
          <tr>
            <th>ФИО</th>
            <th>Описание</th>
            <th>Номер телефона</th>
            <th>Записать на прием</th>
            <td>Обновить</td>
            <td>Удалить</td>
          </tr>
        </thead>
        <tbody>
            @foreach($record as $row)
                <tr>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->description }}</td>
                    <td>{{ $row->number }}</td>
                    <td><a href="{{ route('admin-edit-record_doctor', $row->id) }}">Записать к врачу</a></td>
                    <td><a href="{{-- route('admin-edit-accountings', $row->id) --}}">Обновить</a></td>
                    <td>
                        <form action="{{-- route('admin-destroy-accountings', $row->id) --}}" method="POST">
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