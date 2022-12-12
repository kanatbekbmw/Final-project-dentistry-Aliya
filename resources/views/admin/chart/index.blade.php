@extends('admin.layouts.main')
@section('content')

    <div class="content-wrapper">
        <h1 class="ml-3">График работы клиники</h1>
        <table class="col-md-12 ml-2 mt-3 pb-10 table table-striped" style="width: 50%">
            <a class="col-md-6" href="{{ route('admin-create-chart') }}"><button type="button" class="mt-4 mb-4 ml-4 btn btn-secondary">Добавить день и время</button></a>

            <tr>
                <td>День</td>
                <td>Время</td>
                <td>Обновить</td>
                <td>Удалить</td>
            </tr>
            </thead>
            <tbody>
            @foreach($chart as $row)
                <tr>
                    <td>{{ $row->day }}</td>
                    <td>{{ $row->time }}</td>

                    <td><a href="{{ route('admin-edit-chart', $row->id) }}">Обновить</a></td>
                    <td>
                        <form action="{{ route('admin-destroy-chart', $row->id) }}" method="POST">
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
