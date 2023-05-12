@extends('layouts.admin')
@section('title') Админпанель @parent @stop
@section('content')
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Админ. панель сайта</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
              </div>
            </div>
          </div>
          <div class="table-responsive">
           <p>В этом разделе сайта пользователь с правами администратора</p>
            <p>может создавать, редактировать и удалять записи в базе данных </p>
            <p>по тематическим разделам:</p>
            <div>
              <a href="{{route('admin.receipts.index')}}">Рецепты</a>
              <br>
              <a href="{{route('admin.drugs.index')}}">Лекарства</a>
              <br>
              <a href="{{route('admin.pharmacies.index')}}">Аптеки</a>
              <br>
              <a href="{{route('admin.clinics.index')}}">Клиники</a>
              <br>
              <a href="{{route('admin.doctors.index')}}">Врачи</a>
              <br>
              <a href="{{route('admin.patients.index')}}">Пациенты</a>
              <br>
              <a href="{{route('admin.users.index')}}">Пользователи</a>
              <br>
              <p>а также справочники:</p>              
              <a href="{{route('admin.organization_types.index')}}">Типы организаций</a>
              <br>
              <a href="{{route('admin.specialities.index')}}">Специальности врачей</a>
              <br>
              <a href="{{route('admin.diagnoses.index')}}">Справочник заболеваний</a>
            </div>

          </div>
@endsection

