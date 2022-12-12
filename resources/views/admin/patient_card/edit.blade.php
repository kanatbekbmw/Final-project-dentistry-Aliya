@extends('admin.layouts.main')
@section('content')

<div class="content-wrapper">
    <h1 class="ml-3">Редактирование данных в карточке пациента</h1>
  <table class="table table-striped">

    <div class="card-body mt-3">
      <form method="POST" action="{{ route('admin-update-card', $card->id) }}">
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

          <div class="col-md-7">
              <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $card->address }}" required autocomplete="address" autofocus>

              @error('address')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
      </div>

      <div class="row mb-3">
          <label for="profession" class="col-md-3 col-form-label text-md-end">Профессия</label>

          <div class="col-md-7">
              <input type="text" class="form-control @error('profession') is-invalid @enderror" name="profession" value="{{ $card->profession }}" required autocomplete="profession" autofocus>

              @error('profession')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
      </div>

      <div class="row mb-3">
          <label for="phone" class="col-md-3 col-form-label text-md-end">Номер телефона</label>

          <div class="col-md-2">
              <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $card->phone }}" required autocomplete="phone" autofocus>

              @error('phone')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
      </div>

      <div class="row mb-3">
          <label for="gender" class="col-md-3 col-form-label text-md-end">Пол(м./ж.)</label>

          <div class="col-md-2">
              <input type="text" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ $card->gender }}" required autocomplete="gender" autofocus>

              @error('gender')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
      </div>


      <div class="row mb-3">
          <label for="doctor" class="col-md-3 col-form-label text-md-end">Лечащий врач</label>

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
