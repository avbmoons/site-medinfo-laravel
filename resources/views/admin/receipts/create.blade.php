@extends('layouts.admin')

@section('title', 'Добавить рецепт')
@section('content')
    
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Добавить рецепт</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="{{route('admin.receipts.index')}}">Назад к списку рецептов</a>
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
    <form method="POST" action="{{route('admin.receipts.store')}}">
        @csrf
        <div class="form-group">
            <label for="name">Название</label>
            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name')}}">
        </div>
        <div class="form-group">
            <label for="valid_until_date">Действителен до</label>
            <input type="text" id="valid_until_date" name="valid_until_date" class="form-control @error('valid_until_date') is-invalid @enderror" value="{{ old('valid_until_date')}}">
        </div>
        <div class="form-group">
            <label for="barcode">Штрихкод</label>
            <input type="text" id="barcode" name="barcode" class="form-control @error('barcode') is-invalid @enderror" value="{{ old('barcode')}}">
        </div>

      <div class="form-group">
        <label for="patient_id">Пациент</label>
        <select class="form-control" name="patient_id" id="patient_id">
          <option value="0">-- Выбрать --</option>
          @foreach($patients as $patient)
          <option @if((int) old('patient_id') === $patient->id) selected @endif value="{{ $patient->id }}">{{ $patient->surname}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="doctor_id">Врач</label>
        <select class="form-control" name="doctor_id" id="doctor_id">
          <option value="0">-- Выбрать --</option>
          @foreach($doctors as $doctor)
          <option @if((int) old('doctor_id') === $doctor->id) selected @endif value="{{ $doctor->id }}">{{ $doctor->surname}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="drug_id">Лекарство</label>
        <select class="form-control" name="drug_id" id="drug_id">
          <option value="0">-- Выбрать --</option>
          @foreach($drugs as $drug)
          <option @if((int) old('drug_id') === $drug->id) selected @endif value="{{ $drug->id }}">{{ $drug->name}}</option>
          @endforeach
        </select>
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