@extends('admin.layouts.main')
@section('content')

<div class="content-wrapper">
  <table class="table table-striped">

    <div class="card-body">
      <form method="POST" action="{{ route("update-users", $user->id) }}">
          @csrf

          <div class="row mb-3">
              <label for="name" class="col-md-4 col-form-label text-md-end">ФИО</label>

            <div class="col-md-6">
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="row mb-3">
              <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>

              <div class="col-md-6">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>
          <div class="row mb-0">
              <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                      Зарегистрировать
                  </button>
              </div>
          </div>
      </form>
  </div>
</div>
    
  </table>


</div>

@endsection