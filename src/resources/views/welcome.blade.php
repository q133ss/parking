@extends('layouts.app')
@section('title', 'Главная')
@section('content')
    <div class="text-center">
        @if(Auth()->check())
            <a href="{{route('lk.index')}}" class="btn btn-link">Личный кабинет</a>
        @else
        <a href="{{route('register')}}" class="btn btn-link">Регистрация</a>
        <a href="{{route('login')}}" class="btn btn-link">Вход</a>
        @endif
        <br>
        <h2>Тут будет лендинг</h2>
    </div>
@endsection
