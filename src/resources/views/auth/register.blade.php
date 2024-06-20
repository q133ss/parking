@extends('layouts.app')
@section('title', 'Регистрация')
@section('content')
    <div class="container-fluid ps-md-0">
        <div class="row g-0">
            <div class="col-md-12 col-lg-12">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 col-lg-8 mx-auto">
                                <h3 class="login-heading mb-4">Регистрация</h3>
                                @if ($errors->any())
                                    <ul>
                                        <li class="text-danger">{{ $errors->first() }}</li>
                                    </ul>
                                @endif
                                <!-- Sign In Form -->
                                <form action="{{route('register')}}" method="post">
                                    @csrf
                                    <div class="form-floating mb-3">
                                        <input type="name" value="{{old('name')}}" name="name" class="form-control" id="floatingInput" placeholder="Имя">
                                        <label for="floatingInput">Имя</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="email" value="{{old('email')}}" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                        <label for="floatingInput">Email</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="name" value="{{old('car_number')}}" name="car_number" class="form-control" id="carNumber" placeholder="А111АА11">
                                        <label for="floatingInput">Номер авто</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                                        <label for="floatingPassword">Пароль</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="password" name="password_confirmation" class="form-control" id="floatingPassword" placeholder="Password">
                                        <label for="floatingPassword">Повторите пароль</label>
                                    </div>

                                    <div class="d-grid">
                                        <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" type="submit">Зарегистрироваться</button>
                                        <div class="d-flex justify-content-between">
                                            {{--                                            <a class="small" href="">Забыли пароль?</a>--}}
                                            <a class="small" href="{{route('login')}}">Вход</a>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
