@extends('layout')

@section('content')
    <section>
            <h1>Резюме користувача {{$user}}</h1>
        <div class="wrap-users-info">
            @foreach($vacancies as $vacancy)
                <div class="users-info">
                    <ul>
                        <li><b>ПІБ:</b> {{$vacancy -> user_id}}</li>
                        <li><b>Вік:</b> {{$vacancy -> title}}</li>
                    </ul>
                </div>
            @endforeach
        </div>
    </section>
@endsection
