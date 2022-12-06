@extends('admin.layouts.main')
@section('content')

<div class="content-wrapper">
  <table class="col-md-12 ml-2 pb-10 table table-striped">

    <div class="row mb-4">
        <a class="col-md-8" href="{{ route('admin-create-accountings') }}"><button type="button" class="mt-4 mb-4 ml-4 btn btn-secondary">Добавить запись</button></a>

        <div class="col-md-4 mt-4">
            <form action="{{ route('admin-daily_accountings') }}" method="GET">
                <select name="user_id" class="custom-select" style="max-width: 80%">
                    <option value="">Все записи</option>
                    @foreach($user as $row)
                        <option value="{{ $row->id }}" @if(isset($_GET['user_id'])) @if($_GET['user_id'] == $row->id) selected @endif @endif> {{ $row->name }} </option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-lg btn-default">
                    <i class="fa fa-search"></i>
                </button>
            </form>
        </div>
    </div>

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
                <td><a href="{{ route('admin-show-accountings', $row->id) }}">{{ $row->name }}</a></td>
                <td>{{ $row->address }}</td>
                <td>{{ $row->diagnosis }}</td>
                <td>{{ $row->created_at->format('d-m-Y, H: m')}}</td>
                <td>{{ $row->price }}</td>                
                <td><a href="{{ route('admin-edit-accountings', $row->id) }}">Обновить</a></td>
                <td>
                    <form action="{{ route('admin-destroy-accountings', $row->id) }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <button type="submit" class="btn btn-outline-primary">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div>
{{ $card->links() }}
</div>

</div>
@endsection