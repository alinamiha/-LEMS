@extends('layout')

@section('content')
    <section>
            <h1>Резюме користувача {{$user}}</h1>
        <div class="wrap-users-info">
            @foreach($cvs as $cv)
                <div class="users-info">
                    <ul>
                        <li><b>ПІБ:</b> {{$cv -> user_id}}</li>
                        <li><b>Вік:</b> {{$cv -> cv_name}}</li>
                    </ul>
                </div>
            @endforeach
        </div>
    </section>
@endsection
