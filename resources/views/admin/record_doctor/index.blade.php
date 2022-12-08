@extends('admin.layouts.main')
@section('content')

<div class="content-wrapper">
    <div class="row mb-4">
        <a class="col-md-8" href="{{ route('admin-create-record') }}"><button type="button" class="mt-4 mb-4 ml-4 btn btn-secondary">Добавить запись</button></a>

        <div class="col-md-4 mt-4">
            <form action="{{ route('admin-record_doctor') }}" method="GET">
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

    <table class="col-md-12 ml-2 pb-10 table table-striped">
        <thead>
          <tr>
                @foreach ($weekDays as $row)
                    <td> {{ $row['week_day'] }}  <br> {{ $row['day'] }} </td>
                @endforeach
          </tr>
        </thead>
        <tbody
                @for($i=0; $i<10; $i++)
                    <tr>
                        @foreach ($weekDays as $row)
                            <?php if(isset($row['work_hours'][$i]['record'])): ?>
                                <td style="background-color: orange; max-width: 15px;">
                                    <a style="color: black" href="{{ route('admin-edit-record_doctor', $row['work_hours'][$i]['record']->id) }}">
                                        {{ $workHours[$i]['hour'] }} <br>
                                        {{ $row['work_hours'][$i]['record']->name }}
                                    </a>
                                </td>
                            <?php else: ?>
                                <td style="max-width: 15px">{{ $workHours[$i]['hour'] }} <i style="margin-left: 15px" type="button" data-bs-toggle="modal" data-bs-target="#myModal" class="fa fa-plus-square" aria-hidden="true"></i>
                                </td>
                            <?php endif; ?>
                        @endforeach
                    </tr>
                @endfor
        </tbody>
    </table>
</div>

<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Modal Heading</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                Modal body..
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
            <button type="button"></button>
        </div>

    </div>
</div>
</div>
@endsection
