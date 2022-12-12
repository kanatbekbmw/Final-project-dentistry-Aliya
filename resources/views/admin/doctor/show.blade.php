@extends('admin.layouts.main')
@section('content')

<div class="content-wrapper">
  <div class="col-md-12" style="text-align: center;">

    <div>
        <h3>ФИО</h3>
        <h4>{{ $row->name }}</h4>
    </div>

    <hr>

    <div>
        <h3>Стаж работы</h3>
        <h4>{{ $row->experience }}</h4>
    </div>

      <hr>

      <div>
          <h3>Специальность</h3>
          <h4>{{ $row->speciality }}</h4>
      </div>

      <hr>

      <div>
          <h3>Образование</h3>
          <h4>{{ $row->education }}</h4>
      </div>

      <hr>

    <div>
        <h3>Фото врача</h3>
        <img src="{{ asset('storage/' . $row->img) }}" style="width: 500px;">
    </div>

  </div>

</div>
@endsection
