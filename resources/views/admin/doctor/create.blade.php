@extends('admin.layouts.main')
@section('content')

<div class="content-wrapper">
  <table class="table table-striped">

    <div class="card-body mt-3">
      <form method="POST" action="{{ route('admin-store-doctor') }}" enctype="multipart/form-data">
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
            <label for="experience" class="col-md-3 col-form-label text-md-end">Стаж работы</label>

            <div class="col-md-2">
                <input class="form-control @error('experience') is-invalid @enderror" name="experience" value="{{ old('experience') }}" required autocomplete="experience" autofocus>

                @error('experience')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

          <div class="row mb-3">
              <label for="speciality" class="col-md-3 col-form-label text-md-end">Специальность</label>

              <div class="col-md-7">
                  <input class="form-control @error('speciality') is-invalid @enderror" name="speciality" value="{{ old('speciality') }}" required autocomplete="speciality" autofocus>

                  @error('speciality')
                  <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
          </div>

          <div class="row mb-3">
              <label for="education" class="col-md-3 col-form-label text-md-end">Образование</label>

              <div class="col-md-7">
                  <input class="form-control @error('education') is-invalid @enderror" name="education" value="{{ old('education') }}" required autocomplete="education" autofocus>

                  @error('education')
                  <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
          </div>

        <div class="form-group row md-3">
            <label for="address" class="col-md-3 col-form-label text-md-end">Фото</label>

            <div class="col-md-7">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="img" required>
                    <label class="custom-file-label">Выбрать Фото</label>
                </div>
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
  </table>


</div>

@endsection
