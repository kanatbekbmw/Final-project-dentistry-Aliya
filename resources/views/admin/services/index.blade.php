@extends('admin.layouts.main')
@section('content')

<div class="content-wrapper">
  <table class="col-md-12 ml-2 table table-bordered table-sm">
  <a href="{{ route('admin-create-services') }}"><button type="button" class="mt-4 mb-4 btn btn-secondary">Добавить услугу</button></a>
    <thead>
        <tr>
            <th>Название</th>
            <th>Описание</th>
            <th>Обновить</th>
            <th>Удалить</th>
        </tr>
    </thead>
    <tbody>
        @foreach($services as $row)
            <tr>
                <td><a href="{{ route('admin-show-services', $row->id) }}">{{ $row->name }}</a></td>
                <td>{{ $row->description }}</td>
                <td><a href="{{ route('admin-edit-services', $row->id) }}">Обновить</a></td>
                <td>
                    <form action="{{ route('admin-destroy-services', $row->id) }}" method="POST">
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
