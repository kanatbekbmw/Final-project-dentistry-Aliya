@extends('admin.layouts.main')
@section('content')

<div class="content-wrapper">

    <table class="table table-striped">

        <div class="card-body mt-3">
            <form method="POST" action="{{ route('admin-update-doctor', $doctor->id) }}" enctype="multipart/form-data">
                @csrf

                <div class="card-body ml-5" style="width: 60%">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ФИО</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $doctor->name }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Стаж работы</label>
                        <input class="form-control @error('experience') is-invalid @enderror" name="experience" value="{{ $doctor->experience }}" required autocomplete="experience" autofocus>


                            @error('experience')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Специальность</label>
                        <input class="form-control @error('speciality') is-invalid @enderror" name="speciality" value="{{ $doctor->speciality }}" required autocomplete="speciality" autofocus>


                        @error('speciality')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Образование</label>
                        <input class="form-control @error('education') is-invalid @enderror" name="education" value="{{ $doctor->education }}" required autocomplete="education" autofocus>{{ $doctor->education }}


                        @error('education')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Фото</label>
                        <div>
                            <img src="{{ asset('storage/' . $doctor->img) }}" style="width: 500px;">
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
