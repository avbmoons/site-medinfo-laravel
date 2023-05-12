@extends('layouts.admin')

@section('title', 'Админка сообщений')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Сообщения</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
      </div>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>#ID</th>
          <th>Кому</th>       
          <th>От кого</th>
          <th>Сообщение</th>
          <th>Дата добавления</th>
          <th>Дата изменения</th>
          <th>Статус</th>
          <th>Действия</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($messagesList as $message)
        <tr>
          <td>{{ $message->id }}</td>
          <td>{{ $message->recipient_id }}</td>
          <td>{{ $message->sender_id }}</td>         
          <td>{{ $message->message }}</td>
          <td>{{ $message->created_at }}</td>
          <td>{{ $message->updated_at }}</td>
          <td></td>
        </tr>            
        @empty
        <tr>
          <td colspan="7">Записей нет</td>
        </tr>            
        @endforelse
      </tbody>

    </table>

  </div>

@endsection



