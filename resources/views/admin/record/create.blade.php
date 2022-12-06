@extends('admin.layouts.main')
@section('content')

<div class="content-wrapper">
  <table class="table table-striped">

    <div class="card-body m-3">
      <form method="POST" action="{{ route('admin-store-record') }}">
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
            <label for="description" class="col-md-3 col-form-label text-md-end">Что вас беспокоит?</label>

            <div class="col-md-7">
                <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description" autofocus>

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
                <input type="text" class="form-control @error('number') is-invalid @enderror" name="number" value="{{ old('number') }}" required autocomplete="number" autofocus>

                @error('number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

            <div class="row mb-0">
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