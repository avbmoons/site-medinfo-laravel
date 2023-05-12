@extends('layouts.admin')

@section('title', 'Добавить тип организации')
@section('content')
    
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Добавить тип организации</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="{{route('admin.organization_types.index')}}">Назад к списку типов</a>
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
    <form method="POST" action="{{route('admin.organization_types.store')}}">
        @csrf
        <div class="form-group">
            <label for="organizationType">Тип организации</label>
            <input type="text" id="organizationType" name="organizationType" class="form-control @error('organizationType') is-invalid @enderror" value="{{ old('organizationType')}}">
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description">{{ old('description')}}</textarea>
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