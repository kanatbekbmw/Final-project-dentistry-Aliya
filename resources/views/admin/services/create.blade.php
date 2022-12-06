@extends('admin.layouts.main')
@section('content')

<div class="content-wrapper">
  <table class="table table-striped">

    <div class="card-body mt-3">
      <form method="POST" action="{{ route('admin-store-services') }}" enctype="multipart/form-data">
          @csrf

          <div class="row mb-3">
              <label for="name" class="col-md-3 col-form-label text-md-end">Название</label>

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
            <label for="description" class="col-md-3 col-form-label text-md-end">Описание</label>

            <div class="col-md-7">
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus></textarea>
                
                @error('description')
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