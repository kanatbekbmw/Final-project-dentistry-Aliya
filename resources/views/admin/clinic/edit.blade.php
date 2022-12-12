@extends('admin.layouts.main')
@section('content')

    <div class="content-wrapper">

        <table class="table table-striped">

            <div class="card-body mt-3">
                <form method="POST" action="{{ route('admin-update-clinic', $clinic->id) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body ml-5" style="width: 60%">

                        <div class="form-group">
                            <label for="name">Название клиники</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value=" {{ $clinic->name }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Описание клиники</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description" autofocus>{{ $clinic->description }}</textarea>


                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="number">Номер клиники</label>
                            <input type="text" class="form-control @error('number') is-invalid @enderror" name="number" value="{{ $clinic->number }}" required autocomplete="number" autofocus>

                            @error('number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="whatsapp">Ссылка на WhatsApp клиники</label>
                            <input type="text" class="form-control @error('whatsapp') is-invalid @enderror" name="whatsapp" value="{{ $clinic->whatsapp }}" required autocomplete="whatsapp" autofocus>

                            @error('whatsapp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="address">Адрес клиники</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value=" {{ $clinic->address }}" required autocomplete="address" autofocus>

                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="twogis">Ссылка на 2gis клиники</label>
                            <input type="text" class="form-control @error('twogis') is-invalid @enderror" name="twogis" value=" {{ $clinic->twogis }}" required autocomplete="twogis" autofocus>

                            @error('twogis')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Фото</label>
                            <div>
                                <img src="{{ asset('storage/' . $clinic->img) }}" style="width: 250px;">
                            </div>
                            <div class="input-group">
                                <div class="custom-file mt-2">
                                    <input type="file" class="custom-file-input" name="img">
                                    <label class="custom-file-label">Выбрать Фото</label>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4 mt-3">
                                    <button type="submit" class="btn btn-primary">
                                        Обновить
                                    </button>
                                </div>
                            </div>
                        </div>
                </form>
            </div>

        </table>
    </div>

@endsection
