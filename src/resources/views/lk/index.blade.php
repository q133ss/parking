@extends('layouts.app')
@section('title', 'Личный кабинет')
@section('content')
    <div class="row d-flex justify-content-center mt-5">
        <div class="card user-card col-md-6 col-lg-4 shadow-sm border-0">
            <div class="card-header bg-primary text-white text-center">
                <h5>Личный кабинет</h5>
            </div>
            <div class="card-body">
                <h6 class="fw-bold mt-4 mb-3">Ваше имя: {{ Auth()->user()->name }}</h6>
                <h6 class="fw-bold mt-4 mb-3">Номер авто: {{Auth()->user()->car_number}}</h6>
                <hr>
                <p class="text-muted">Стоимость вашей подписки составляет <span class="fw-bold">999₽</span>. Статус: <span class="text-success">активна</span></p>
                <p class="text-muted mt-2">Следующее списание произойдет <span class="fw-bold">20.07.2024</span></p>
                <hr>
                <div class="d-flex justify-content-between mt-4">
                    <a class="btn btn-danger" href="#">Отменить подписку</a>
                    <a class="btn btn-secondary" href="/">На главную</a>
                </div>
                @if(Auth()->user()->isAdmin())
                <hr>
                <a class="btn btn-info w-100" href="{{route('admin.index')}}">Панель администратора</a>
                @endif
            </div>
        </div>
    </div>

@endsection
