@extends('doctor.layouts.main')
@section('content')

<div class="content-wrapper">
  <table class="col-md-12 ml-2 table table-striped">

  <a href="{{ route('create-accountings') }}"><button type="button" class="mt-4 mb-4 btn btn-secondary">Добавить запись</button></a>
    <thead>
        <tr>
            <td>ФИО</td>
            <td>Адрес</td>
            <td>Диагноз</td>
            <td>Дата и время приема</td>
            <td>Цена</td>
            <td>Обновить</td>
            <td>Удалить</td>
        </tr>
    </thead>
    <tbody>
        @foreach($card as $row)
            <tr>
                <td><a href="{{ route('show-accountings', $row->id) }}">{{ $row->name }}</a></td>
                <td>{{ $row->address }}</td>
                <td>{{ $row->diagnosis }}</td>
                <td>{{ $row->created_at->format('d-m-Y, H: m')}}</td>
                <td>{{ $row->price }}</td>                
                <td><a href="{{ route('edit-accountings', $row->id) }}">Обновить</a></td>
                <td>
                    <form action="{{ route('destroy-accountings', $row->id) }}" method="POST">
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