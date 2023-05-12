@extends('layouts.admin')

@section('title', 'Добавить врача')
@section('content')
    
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Добавить врача</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="{{route('admin.doctors.index')}}">Назад к списку врачей</a>
      </nav>
      <div class="btn-group mr-2">
      </div>
    </div>
  </div>
  <div>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>                       
        @endforeach
    @endif
    <form method="POST" action="{{route('admin.doctors.store')}}">
        @csrf
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name')}}">
        </div>
        <div class="form-group">
            <label for="surname">Фамилия</label>
            <input type="text" id="surname" name="surname" class="form-control @error('surname') is-invalid @enderror" value="{{ old('surname')}}">
        </div>
      <div class="form-group">
        <label for="speciality_id">Специальность</label>
        <select class="form-control" name="speciality_id" id="speciality_id">
          <option value="0">-- Выбрать --</option>
          @foreach($specialities as $speciality)
          <option @if((int) old('speciality_id') === $speciality->id) selected @endif value="{{ $speciality->id }}">{{ $speciality->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="education_organization_id">Образовательная организация</label>
        <input type="text" id="education_organization_id" name="education_organization_id" class="form-control @error('education_organization_id') is-invalid @enderror" value="{{ old('education_organization_id')}}">
      </div>
      <div class="form-group">
        <label for="working_mode">Расписание приема</label>
        <textarea class="form-control @error('working_mode') is-invalid @enderror" name="working_mode" id="working_mode">{{ old('working_mode')}}</textarea>
      </div>
      <div class="form-group">
        <label for="status">Статус</label>
        <select class="form-control" name="status" id="status">
          @foreach($statuses as $status)
          <option @if(old('status') === $status) selected @endif>{{ $status }}</option>
          @endforeach
        </select>
      </div>
        <br>
        <button type="submit" class="btn btn-success">Сохранить</button>

    </form>
  </div>

  @endsection('content')