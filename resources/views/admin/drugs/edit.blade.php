@extends('layouts.admin')

@section('title', 'Редактировать лекарство')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Редактировать лекарство</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="{{route('admin.drugs.index')}}">Назад к списку лекарств</a>
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
    <form method="POST" action="{{route('admin.drugs.update', ['drug' => $drug])}}">
      @method('put')
        @csrf
        <div class="form-group">
            <label for="name">Название</label>
            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $drug->name}}">
        </div>
        <div class="form-group">
            <label for="description_url">Ссылка на описание</label>
            <input type="text" id="description_url" name="description_url" class="form-control @error('description_url') is-invalid @enderror" value="{{ $drug->description_url}}">
        </div>

        <div class="form-group">
            <label for="pharmacies_id">Аптеки</label>
            <input type="text" id="pharmacies_id" name="pharmacies_id" class="form-control @error('pharmacies_id') is-invalid @enderror" value="{{ $drug->pharmacies_id}}" readonly>
        </div>
      </div>

        <div class="form-group">
          <label for="status">Статус</label>
          <select class="form-control" name="status" id="status">
            @foreach($statuses as $status)
            <option @if($drug->status === $status) selected @endif>{{ $status }}</option>
            @endforeach
          </select>
        </div>
        <br>
        <button type="submit" class="btn btn-success">Сохранить</button>

    </form>
  </div>

@endsection('content')

