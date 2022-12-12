@extends('admin.layouts.main')
@section('content')

    <div class="content-wrapper">
        <h1 class="ml-3">Добавление рабочего дня клиники</h1>
        <table class="table table-striped">

            <div class="card-body mt-3">
                <form method="POST" action="{{ route('admin-update-chart', $chart->id) }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="day" class="col-md-3 col-form-label text-md-end">День недели</label>

                        <div class="col-md-2">
                            <select name="day" class="custom-select">
                                @foreach($days as $row)
                                    <option value="{{ $row['day'] }}"  @if( $row['day'] == $chart->day ) {{ 'selected' }} @endif> {{ $row['day'] }} </option>
                                @endforeach
                            </select>
                            </select>

                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="time" class="col-md-3 col-form-label text-md-end">Время работы</label>

                        <div class="col-md-2">
                            <input type="text" class="form-control @error('time') is-invalid @enderror" name="time" value="{{ $chart->time }}" required autocomplete="time" autofocus>

                            @error('time')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Добавить
                            </button>
                        </div>
                    </div>
                </form>
            </div>
    </div>

    </table>


    </div>

@endsection
