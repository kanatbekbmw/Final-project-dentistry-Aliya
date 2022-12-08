@extends('admin.layouts.main')
@section('content')

<div class="content-wrapper">
  <table class="table table-striped">

    <div class="card-body m-3">
      <form method="POST" action="{{ route('admin-update-record_doctor', $card->id) }}">
          @csrf

          <div class="row mb-3">
            <label for="name" class="col-md-3 col-form-label text-md-end">ФИО</label>

            <div class="col-md-7">
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $card->name }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
          <label for="description" class="col-md-3 col-form-label text-md-end">Что вас беспокоит?</label>

          <div class="col-md-7">
              <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $card->description }}" required autocomplete="description" autofocus>

              @error('description')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
      </div>

      <div class="row mb-3">
          <label for="number" class="col-md-3 col-form-label text-md-end">Номер телефона</label>

          <div class="col-md-7">
              <input type="text" class="form-control @error('number') is-invalid @enderror" name="number" value="{{ $card->number }}" required autocomplete="number" autofocus>

              @error('number')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
      </div>

          <div class="row mb-3">
              <label for="namee" class="col-md-3 col-form-label text-md-end">Дата приема</label>

              <div class="col-md-2">
                  <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ $card->date }}" required autocomplete="date" autofocus>

                  @error('date')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="row mb-3">
            <label for="doctor" class="col-md-3 col-form-label text-md-end">Время приема</label>

              <div class="col-md-6">
                <select name="time">
                    <option value="09:00">09:00</option>
                    <option value="10:00">10:00</option>
                    <option value="11:00">11:00</option>
                    <option value="12:00">12:00</option>
                    <option value="13:00">13:00</option>
                    <option value="14:00">14:00</option>
                    <option value="15:00">15:00</option>
                    <option value="16:00">16:00</option>
                    <option value="17:00">17:00</option>
                    <option value="18:00">18:00</option>
                </select>
              </div>
          </div>


        <div class="row mb-3">
            <label for="doctor" class="col-md-3 col-form-label text-md-end">Врач</label>

              <div class="col-md-6">
                <select name="user_id">
                    @foreach($user as $row)
                        <option value="{{ $row->id }}" @if($row->id == $card->user_id) {{ 'selected' }} @endif> {{ $row->name }} </option>
                    @endforeach
                </select>
              </div>
          </div>

            <div class="row mb-0">
                <input type="hidden" class="form-control" name="check" value="1">
                 <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Записать
                    </button>
                </div>
            </div>
      </form>
  </div>
</div>

  </table>


</div>

@endsection
