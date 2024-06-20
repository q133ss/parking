@extends('layouts.app')
@section('title', 'Вход')
@section('content')
    <div class="container-fluid ps-md-0">
        <div class="row g-0">
            <div class="col-md-12 col-lg-12">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 col-lg-8 mx-auto">
                                <h3 class="login-heading mb-4">Вход</h3>
                                @if ($errors->any())
                                    <ul>
                                        <li class="text-danger">{{ $errors->first() }}</li>
                                    </ul>
                                @endif
                                <!-- Sign In Form -->
                                <form action="{{route('login')}}" method="post">
                                    @csrf
                                    <div class="form-floating mb-3">
                                        <input type="email" value="{{old('email')}}" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                        <label for="floatingInput">Email</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                                        <label for="floatingPassword">Пароль</label>
                                    </div>

                                    <div class="form-check mb-3">
                                        <input class="form-check-input" name="remember" @if(old('remember') == '1') checked @endif type="checkbox" value="1" id="rememberPasswordCheck">
                                        <label class="form-check-label" for="rememberPasswordCheck">
                                            Запомнить меня
                                        </label>
                                    </div>

                                    <div class="d-grid">
                                        <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" type="submit">Войти</button>
                                        <div class="d-flex justify-content-between">
{{--                                            <a class="small" href="">Забыли пароль?</a>--}}
                                            <a class="small" href="{{route('register')}}">Регистрация</a>
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
