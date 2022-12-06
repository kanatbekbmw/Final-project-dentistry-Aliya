@extends('admin.layouts.main')
@section('content')

<div class="content-wrapper">
  <table class="table table-striped">

    <div class="card-body mt-3">
      <form method="POST" action="{{ route('admin-update-accountings', $card->id) }}">
          @csrf

          <div class="row mb-3">
              <label for="name" class="col-md-3 col-form-label text-md-end">ФИО</label>

              <div class="col-md-6">
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $card->name }}" required autocomplete="name" autofocus>

                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="row mb-3">
            <label for="date_of_birth" class="col-md-3 col-form-label text-md-end">Год рождения</label>

            <div class="col-md-2">
                <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ $card->date_of_birth }}" required autocomplete="date_of_birth" autofocus>

                @error('date_of_birth')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="address" class="col-md-3 col-form-label text-md-end">Адрес</label>

            <div class="col-md-6">
                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $card->address }}" required autocomplete="address" autofocus>

                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="diagnosis" class="col-md-3 col-form-label text-md-end">Диагноз</label>

            <div class="col-md-6">
                <input type="text" class="form-control @error('diagnosis') is-invalid @enderror" name="diagnosis" value="{{ $card->diagnosis }}" required autocomplete="diagnosis" autofocus>

                @error('diagnosis')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="completed_work" class="col-md-3 col-form-label text-md-end">Фактически выполненный объем работы</label>

            <div class="col-md-6">
                <input type="text" class="form-control @error('completed_work') is-invalid @enderror" name="completed_work" value="{{ $card->completed_work }}" required autocomplete="completed_work" autofocus>

                @error('completed_work')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="sanitized" class="col-md-3 col-form-label text-md-end">Санированные</label>

            <div class="col-md-6">
                <input type="text" class="form-control @error('sanitized') is-invalid @enderror" name="sanitized" value="{{ $card->diagnosis }}" required autocomplete="sanitized" autofocus>

                @error('sanitized')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="including_sanitized_as_planned" class="col-md-3 col-form-label text-md-end">В т.ч санированные в плановом порядке</label>

            <div class="col-md-6">
                <input type="text" class="form-control @error('including_sanitized_as_planned') is-invalid @enderror" name="including_sanitized_as_planned" value="{{ $card->including_sanitized_as_planned }}" required autocomplete="including_sanitized_as_planned" autofocus>

                @error('including_sanitized_as_planned')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="conventional_units_of_labor_intensity" class="col-md-3 col-form-label text-md-end">Условных единиц трудоемкости (УЕТ)</label>

            <div class="col-md-6">
                <input type="text" class="form-control @error('conventional_units_of_labor_intensity') is-invalid @enderror" name="conventional_units_of_labor_intensity" value="{{ $card->conventional_units_of_labor_intensity }}" required autocomplete="conventional_units_of_labor_intensity" autofocus>

                @error('conventional_units_of_labor_intensity')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="price" class="col-md-3 col-form-label text-md-end">Цена</label>

            <div class="col-md-2">
                <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $card->price }}" required autocomplete="price" autofocus>

                @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="doctor" class="col-md-3 col-form-label text-md-end">Произвел осмотр</label>

              <div class="col-md-6">
                <select name="user_id">
                    @foreach($user as $row)
                        <option value="{{ $row->id }}" @if($row->id == $card->user_id) {{ 'selected' }} @endif> {{ $row->name }} </option>
                    @endforeach
                    
                </select>
              </div>
        </div>


          <div class="row mb-0">
              <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                      Обновить
                  </button>
              </div>
          </div>
      </form>
  </div>
</div>
    
  </table>


</div>

@endsection