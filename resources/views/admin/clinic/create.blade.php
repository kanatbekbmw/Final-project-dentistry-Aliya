@extends('admin.layouts.main')
@section('content')

    <div class="content-wrapper">
        <table class="table table-striped">

            <div class="card-body mt-3">
                <form method="POST" action="{{ route('admin-store-clinic') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <label for="name" class="col-md-3 col-form-label text-md-end">Название клиники</label>

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
                        <label for="description" class="col-md-3 col-form-label text-md-end">Описание клиники</label>

                        <div class="col-md-7">
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus></textarea>

                            @error('description')
                            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="number" class="col-md-3 col-form-label text-md-end">Номер клиники</label>

                        <div class="col-md-2">
                            <input type="text" class="form-control @error('number') is-invalid @enderror" name="number" value="{{ old('number') }}" required autocomplete="number" autofocus>

                            @error('number')
                            <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="whatsapp" class="col-md-3 col-form-label text-md-end">Ссылка на WhatsApp клиники</label>

                        <div class="col-md-7">
                            <input type="text" class="form-control @error('whatsapp') is-invalid @enderror" name="whatsapp" value="{{ old('whatsapp') }}" required autocomplete="whatsapp" autofocus>

                            @error('whatsapp')
                            <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="address" class="col-md-3 col-form-label text-md-end">Адрес клиники</label>

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
                        <label for="twogis" class="col-md-3 col-form-label text-md-end">Ссылка на 2gis клиники</label>

                        <div class="col-md-7">
                            <input type="text" class="form-control @error('twogis') is-invalid @enderror" name="twogis" value="{{ old('twogis') }}" required autocomplete="twogis" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row md-3">
                        <label for="img" class="col-md-3 col-form-label text-md-end">Фото клиники</label>

                        <div class="col-md-7">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="img">
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
    </div>

    </table>


    </div>

@endsection
