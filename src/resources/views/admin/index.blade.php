@extends('layouts.app')
@section('title', 'Личный кабинет администратора')
@section('content')
    <div class="row d-flex justify-content-center mt-5">
        <div class="card user-card col-md-12 col-lg-10 shadow-sm border-0">
            <div class="card-header bg-primary text-white text-center">
                <h5>Личный кабинет администратора</h5>
            </div>
            <h6>Фильтры</h6>
            <form action="" method="GET">
                <div class="d-flex w-100 justify-content-between">
                    <label for="datepicker">
                        По дате регистрации
                        <input type="text" name="date" id="datepicker" class="form-control">
                    </label>

                    <label>
                        По номеру авто
                        <input type="text" name="car_number" class="form-control">
                    </label>

                    <label>
                        Поиск
                        <input type="text" name="search" class="form-control">
                    </label>
                    <button type="submit" class="btn btn-success">Фильтр</button>
                </div>
            </form>
            <div class="card-body">
                <h6>Список пользователей</h6>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Имя</th>
                        <th scope="col">Email</th>
                        <th scope="col">Подписка активна</th>
                        <th scope="col">Номер авто</th>
                        <th scope="col">Дата последнего платежа</th>
                        <th scope="col">Дата регистрации</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->is_active ? 'Да' : 'Нет'}}</td>
                        <td>{{$user->car_number}}</td>
                        <td>{{$user->created_at->format('d-m-Y H:i')}}</td>
                        <td>{{$user->created_at->format('d-m-Y H:i')}}</td>
                        <td>{{$user->created_at}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        $('#datepicker').datepicker({
            dateFormat: 'dd-mm-yy', // Задайте формат даты
            changeMonth: true,
            changeYear: true,
            showButtonPanel: false,
            monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь',
                'Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
            monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн',
                'Июл','Авг','Сен','Окт','Ноя','Дек'],
            dayNames: ['Воскресенье','Понедельник','Вторник','Среда','Четверг','Пятница','Суббота'],
            dayNamesShort: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
            dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: '',
            currentText: "",
            closeText: "Выбрать",
            onSelect: function(dateText) {
                var selectedDate = $(this).datepicker('getDate');
                console.log("Selected date:", selectedDate);
                // Здесь можно выполнить дополнительные действия при выборе даты
            }
        });
    </script>
@endsection
