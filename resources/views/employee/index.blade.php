@extends('layout')

@section('content')
    <section>
        <h1>Роботодавци</h1>
        <div class="wrap-users-info">
            @foreach($employees as $employee)
                <div class="users-info">
                    <ul>
                        <li><b>ПІБ:</b> {{$employee -> name}}</li>
                        <li><b>Посада:</b> {{$employee -> position}}</li>
                        <li><b>Телефон:</b> {{$employee -> phone}}</li>
                        <li><b>Email:</b> {{$employee -> email}}</li>
                    </ul>
                    <a href="/employee/{{$employee->id}}">Детальніше</a>
                </div>
            @endforeach

        </div>
    </section>
@endsection
