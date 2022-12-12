@extends('admin.layouts.main')
@section('content')

    <div class="content-wrapper">
        <table class="col-md-12 ml-2 table table-bordered table-sm">
            <a href="{{ route('admin-create-doctor') }}"><button type="button" class="mt-4 mb-4 btn btn-secondary">Добавить доктора</button></a>
            <thead>
            <tr>
                <th>ФИО</th>
                <th>Стаж</th>
                <th>Специальность</th>
                <th>Образование</th>
                <th>Обновить</th>
                <th>Удалить</th>
            </tr>
            </thead>
            <tbody>
            @foreach($doctor as $row)
                <tr>
                    <td><a href="{{ route('admin-show-doctor', $row->id) }}">{{ $row->name }}</a></td>
                    <td>{{ $row->experience }}</td>
                    <td>{{ $row->speciality }}</td>
                    <td>{{ $row->education }}</td>
                    <td><a href="{{ route('admin-edit-doctor', $row->id) }}">Обновить</a></td>
                    <td>
                        <form action="{{ route('admin-destroy-doctor', $row->id) }}" method="POST">
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
