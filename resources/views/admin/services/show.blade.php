@extends('admin.layouts.main')
@section('content')

<div class="content-wrapper">
  <div class="col-md-12" style="text-align: center;">
    
    <div>
        <h3>Название услуги</h3>
        <h4>{{ $row->name }}</h4>
    </div>

    <hr>

    <div>
        <h3>Описание услуги</h3>
        <h4>{{ $row->description }}</h4>
    </div>

    <hr>

    <div>
        <h3>Фото услуги</h3>
        <img src="{{ asset('storage/' . $row->img) }}" style="width: 500px;">
    </div>

  </div> 

</div>
@endsection