@extends('layouts.admin')

@section('title', 'Админка заболеваний')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Справочник заболеваний</h1>
    <div class="col-4 d-flex justify-content-end align-items-center">
      <a class="btn btn-sm btn-outline-secondary" href="{{route('admin.diagnoses.create')}}">Добавить запись</a>
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
          <th>Описание</th>
          <th>Дата добавления</th>
          <th>Дата изменения</th>
          <th>Действия</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($diagnosisList as $diagnosis)
        <tr>
          <td>{{ $diagnosis->id }}</td>
          <td>{{ $diagnosis->name }}</td>  
          <td>{{ $diagnosis->description }}</td>
          <td>{{ $diagnosis->created_at }}</td>
          <td>{{ $diagnosis->updated_at }}</td>
          <td><a href="{{route('admin.diagnoses.edit', $diagnosis->id)}}">Изм.</a> &nbsp; <a href="javascript:;" class="delete" rel="{{ $diagnosis->id }}" style=" color: red;">Уд.</a></td>          
        </tr>            
        @empty
        <tr>
          <td colspan="7">Записей нет</td>
        </tr>            
        @endforelse
      </tbody>

    </table>

    {{ $diagnosisList->links() }}

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
                    send(`/admin/diagnoses/${id}`).then(() => {
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

