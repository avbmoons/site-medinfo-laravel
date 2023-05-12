@extends('layouts.admin')

@section('title', 'Добавить аптеку')
@section('content')
    
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Добавить аптеку</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="{{route('admin.pharmacies.index')}}">Назад к списку аптек</a>
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
    <form method="POST" action="{{route('admin.pharmacies.store')}}">
        @csrf
        <div class="form-group">
            <label for="name">Название</label>
            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name')}}">
        </div>
        <div class="form-group">
            <label for="address">Адрес</label>
            <input type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address')}}">
        </div>
        <div class="form-group">
            <label for="phone">Телефон</label>
            <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone')}}">
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email')}}">
        </div>
        <div class="form-group">
            <label for="gps_coordinates">Координаты GPS</label>
            <input type="text" id="gps_coordinates" name="gps_coordinates" class="form-control @error('gps_coordinates') is-invalid @enderror" value="{{ old('gps_coordinates')}}">
        </div>
      <div class="form-group">
        <label for="organization_types_id">Тип организации</label>
        <select class="form-control" name="organization_types_id" id="organization_types_id">
          <option value="0">-- Выбрать --</option>
          @foreach($organization_types as $organization_type)
          <option @if((int) old('organization_types_id') === $organization_type->id) selected @endif value="{{ $organization_type->id }}">{{ $organization_type->organizationType}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="organization_id">Идентификатор организации</label>
        <input type="text" id="organization_id" name="organization_id" class="form-control @error('organization_id') is-invalid @enderror" value="1" readonly>
      </div>
      <div class="form-group">
        <label for="working_modes">Расписание работы</label>
        <textarea class="form-control @error('working_modes') is-invalid @enderror" name="working_modes" id="working_modes">{{ old('working_modes')}}</textarea>
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