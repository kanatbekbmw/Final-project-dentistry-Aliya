@extends('admin.layouts.main')
@section('content')

<div class="content-wrapper">

    <a href="{{ route('admin-create-examination', ['idCard' => $row->id]) }}"><button type="button" class="mt-4 mb-4 ml-4 btn btn-secondary">Добавить новый осмотр</button></a>
    <div class="container mt-3">
        <h2>Личная карточка пациента</h2>
        <table class="table table-bordered table-sm">
          <thead>
            <tr>
              <th>ФИО</th>
              <th>Дата рождения</th>
              <th>Адрес</th>
              <th>Номер телефона</th>
              <th>Дата открытия карточки</th>
              <th>Лечащий врач</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{ $row->name }}</td>
              <td>{{ date('d-m-Y', strtotime($row->date_of_birth)) }}</td>
              <td>{{ $row->address }}</td>
              <td>{{ $row->phone }}</td>
              <td>{{ $row->created_at->format('d-m-Y') }}</td>
              <td>{{ $row->user->name }}</td>
            </tr>
          </tbody>
        </table>

        <div style="text-align: center" class="mt-5">
            <h3>Осмотр пациента</h3>
        </div>

        @foreach($row->examination as $examination)
        <table class="table table-bordered table-sm">
          <thead>
            <tr>
              <th>Диагноз</th>
              <th>Жалобы</th>
              <th>Время осмотра</th>
              <th>Произвел осмотр</th>
              <th>Обновить</th>
              <th>Удалить</th>
            </tr>
          </thead>
          <h5 style="text-align: center" class="mt-3 mb-3">{{ $examination->created_at->format('d-m-Y') }}</h5>
          <tbody>
            <tr>
              <td><a href="{{ route('admin-show-examination', $examination->id) }}">{{ $examination->diagnosis }}</a></td>
              <td>{{ $examination->complaints }}</td>
              <td>{{ $examination->created_at->format('H: m') }}</td>
              <td>{{ $examination->user->name }}</td>
              <td><a href="{{ route('admin-edit-examination', $examination->id) }}">Обновить</a></td>
              <td>
                  <form action="{{ route('admin-destroy-examination', $examination->id) }}" method="POST">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                      <button type="submit" class="btn btn-outline-primary">Удалить</button>
                  </form>
              </td>
            </tr>

          </tbody>
        </table>
        @endforeach


    </div>


</div>
@endsection
