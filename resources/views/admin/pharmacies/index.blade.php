@extends('layouts.admin')

@section('title', 'Админка аптек')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Аптеки</h1>
    <div class="col-4 d-flex justify-content-end align-items-center">
      <a class="btn btn-sm btn-outline-secondary" href="{{route('admin.pharmacies.create')}}">Добавить аптеку</a>
    </div>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>#ID</th>
          <th>Название</th>
          <th>Адрес</th>       
          <th>Телефон</th>
          <th>E-mail</th>
          <th>Дата добавления</th>
          <th>Дата изменения</th>
          <th>Статус</th>
          <th>Действия</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($pharmaciesList as $pharmacy)
        <tr>
          <td>{{ $pharmacy->id }}</td>
          <td>{{ $pharmacy->name }}</td>
          <td>{{ $pharmacy->address }}</td>  
          <td>{{ $pharmacy->phone }}</td>
          <td>{{ $pharmacy->email }}</td>
          <td>{{ $pharmacy->created_at }}</td>
          <td>{{ $pharmacy->updated_at }}</td>
          <td>{{ $pharmacy->status }}</td>
          <td><a href="{{route('admin.pharmacies.edit', $pharmacy->id)}}">Изм.</a> &nbsp; <a href="javascript:;" class="delete" rel="{{ $pharmacy->id }}" style=" color: red;">Уд.</a></td>
        </tr>            
        @empty
        <tr>
          <td colspan="7">Записей нет</td>
        </tr>            
        @endforelse
      </tbody>

    </table>

    {{ $pharmaciesList->links() }}

  </div>

@endsection

@push('js')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            let elements = document.querySelectorAll(".delete");
            elements.forEach(function(e, k) {
                e.addEventListener("click", function() {
                const id = this.getAttribute('rel');
                if(confirm(`Подтверждаете удаление записи с #ID = ${id}`)) {
                    send(`/admin/pharmacies/${id}`).then(() => {
                        location.reload();
                    });
                } else {
                    alert("Удаление отменено");
                }
            });
            });
        });

        async function send(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });

            let result = await response.json();
            return result.ok;
        }
    </script>
@endpush

