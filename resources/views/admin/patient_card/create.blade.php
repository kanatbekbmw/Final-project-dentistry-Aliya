@extends('admin.layouts.main')
@section('content')

<div class="content-wrapper">
  <table class="table table-striped">

    <div class="card-body">
      <form method="POST" action="{{ route('admin-store-card') }}">
          @csrf

          <div class="row mb-3">
              <label for="name" class="col-md-3 col-form-label text-md-end">ФИО</label>

              <div class="col-md-7">
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" required autocomplete="date_of_birth" autofocus>

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
                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

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
                <input type="text" class="form-control @error('profession') is-invalid @enderror" name="profession" value="{{ old('profession') }}" required autocomplete="profession" autofocus>

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
                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

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
                <input type="text" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}" required autocomplete="gender" autofocus>

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
                        <option value="{{ $row->id }}"> {{ $row->name }} </option>
                    @endforeach
                    
                </select>
              </div>
          </div>

          <div class="row mb-0">
              <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                      Открыть карточку
                  </button>
              </div>
          </div>
      </form>
  </div>
</div>
    
  </table>


</div>

@endsection