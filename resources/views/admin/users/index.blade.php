@extends('admin.layouts.main')
@section('content')

<div class="content-wrapper">
  <table class="col-md-10 ml-5 table table-striped table-bordered">

  <a href="{{ route('create-users') }}"><button type="button" class="mt-4 mb-4 btn btn-secondary">Добавить врача</button></a>
    <thead>
        <tr>
            <td>ФИО</td>
            <td>Логин</td>
            <td>Обновить</td>
            <td>Удалить</td>
        </tr>
    </thead>
    <tbody>
        @foreach($user as $row)
            <tr>
                <td>{{ $row->name }}</td>
                <td>{{ $row->email }}</td>
                <td><a href="{{ route('edit-user', $row->id) }}">Обновить</a></td>
                <td>
                    <form action="{{ route('destroy-user', $row->id) }}" method="POST">
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