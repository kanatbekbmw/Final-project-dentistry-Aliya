@extends('admin.layouts.main')
@section('content')

<div class="content-wrapper">
    
    <table class="table table-striped">

        <div class="card-body mt-3">
            <form method="POST" action="{{ route('admin-update-services', $services->id) }}" enctype="multipart/form-data">
                @csrf

                <div class="card-body ml-5" style="width: 60%">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Название</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value=" {{ $services->name }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Описание услуги</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description" autofocus>{{ $services->description }}</textarea>

                        
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Фото</label>
                        <div>
                            <img src="{{ asset('storage/' . $services->img) }}" style="width: 250px;">
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