@extends('doctor.layouts.main')
@section('content')

<div class="content-wrapper">
  <table class="table table-striped">

    <div class="card-body">
      <form method="POST" action="{{ route('store-examination', $idCard) }}">
          @csrf

          <div class="row mb-3">
              <label for="diagnosis" class="col-md-3 col-form-label text-md-end">Диагноз</label>

              <div class="col-md-7">
                  <input type="text" class="form-control @error('diagnosis') is-invalid @enderror" name="diagnosis" value="{{ old('diagnosis') }}" required autocomplete="diagnosis" autofocus>

                  @error('diagnosis')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="row mb-3">
            <label for="complaints" class="col-md-3 col-form-label text-md-end">Жалобы</label>

            <div class="col-md-7">
                <input type="text" class="form-control @error('complaints') is-invalid @enderror" name="complaints" value="{{ old('complaints') }}" required autocomplete="complaints" autofocus>

                @error('complaints')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

          <div class="row mb-3">
            <label for="transferred_and_concomitant_diseases" class="col-md-3 col-form-label text-md-end">Перенесенные и сопутствующие заболевания</label>

            <div class="col-md-7">
                <input type="text" class="form-control @error('transferred_and_concomitant_diseases') is-invalid @enderror" name="transferred_and_concomitant_diseases" value="{{ old('transferred_and_concomitant_diseases') }}" required autocomplete="transferred_and_concomitant_diseases" autofocus>

                @error('transferred_and_concomitant_diseases')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="the_development_of_a_real_disease" class="col-md-3 col-form-label text-md-end">Развитие настоящего заболевания</label>

            <div class="col-md-7">
                <input type="text" class="form-control @error('the_development_of_a_real_disease') is-invalid @enderror" name="the_development_of_a_real_disease" value="{{ old('the_development_of_a_real_disease') }}" required autocomplete="the_development_of_a_real_disease" autofocus>

                @error('the_development_of_a_real_disease')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="external_inspection" class="col-md-3 col-form-label text-md-end">Внешний осмотр</label>

            <div class="col-md-7">
                <input type="text" class="form-control @error('external_inspection') is-invalid @enderror" name="external_inspection" value="{{ old('external_inspection') }}" required autocomplete="external_inspection" autofocus>

                @error('external_inspection')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="bite" class="col-md-3 col-form-label text-md-end">Прикус</label>

            <div class="col-md-7">
                <input type="text" class="form-control @error('bite') is-invalid @enderror" name="bite" value="{{ old('bite') }}" required autocomplete="bite" autofocus>

                @error('bite')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="condition_of_the_oral_mucosa" class="col-md-3 col-form-label text-md-end">Состояние слизистой оболочки полости рта, десен, альвеолярных отростков и неба</label>

            <div class="col-md-7">
                <input type="text" class="form-control @error('condition_of_the_oral_mucosa') is-invalid @enderror" name="condition_of_the_oral_mucosa" value="{{ old('condition_of_the_oral_mucosa') }}" required autocomplete="condition_of_the_oral_mucosa" autofocus>

                @error('condition_of_the_oral_mucosa')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="x_ray_data" class="col-md-3 col-form-label text-md-end">Рентгеновские данные</label>

            <div class="col-md-7">
                <input type="text" class="form-control @error('x_ray_data') is-invalid @enderror" name="x_ray_data" value="{{ old('x_ray_data') }}" required autocomplete="x_ray_data" autofocus>

                @error('x_ray_data')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="treatment" class="col-md-3 col-form-label text-md-end">Лечение</label>

            <div class="col-md-7">
                <input type="text" class="form-control @error('treatment') is-invalid @enderror" name="treatment" value="{{ old('treatment') }}" required autocomplete="treatment" autofocus>

                @error('treatment')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="doctor" class="col-md-3 col-form-label text-md-end">Произвел осмотр</label>

              <div class="col-md-6">
                <select name="user_id">
                    @foreach($user as $row)
                        <option value="{{ $row->id }}"> {{ $row->name }} </option>
                    @endforeach
                    
                </select>
              </div>
          </div>
            

        <div class="col-md-7">
            <input type="hidden" name="patient_card_id" value="{{ $idCard }}" >

        </div>

          <div class="row mb-0">
              <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                      Добавить осмотр
                  </button>
              </div>
          </div>
      </form>
  </div>
</div>
    
  </table>


</div>

@endsection