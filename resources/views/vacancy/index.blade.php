@extends('layout')

@section('content')
    <section>
{{--            <h1>Резюме користувача {{$user}}</h1>--}}
        <div class="wrap-users-info">
            @foreach($vacancies as $vacancy)
                <div class="users-info">
                    <ul>
                        <li><b>Назва:</b> {{$vacancy -> title}}</li>
                        <li><b>Категорія:</b> {{$vacancy -> type_of_working}}</li>
                        <li><b>Посада:</b> {{$vacancy -> post}}</li>
                        <li><b>Заробітна плата:</b> {{$vacancy -> sales}}</li>

                        <li><b>Автор::</b>{{$vacancy->user_name}}</li>
                        <li><a href="/vacancy/{{$vacancy -> id}}">Детальніше</a> </li>
{{--                        <li><b>Назва:</b> {{$vacancy -> title}}</li>--}}
{{--                        <li><b>Категорія:</b> {{$vacancy -> type_of_working}}</li>--}}
{{--                        <li><b>Посада:</b> {{$vacancy -> post}}</li>--}}
{{--                        <li><b>Форма роботи:</b> {{$vacancy -> form_of_work}}</li>--}}
{{--                        <li><b>Назва компанії:</b> {{$vacancy -> company_name}}</li>--}}
{{--                        <li><b>Адреса:</b> {{$vacancy -> address}}</li>--}}
{{--                        <li><b>Описання:</b> {{$vacancy -> description}}</li>--}}
{{--                        <li><b>Зарплата:</b> {{$vacancy -> sales}}</li>--}}

{{--                        <li><b>Link:</b><a href="/vacancy/{{$vacancy -> id}}">Link</a> </li>--}}
                    </ul>
                </div>
            @endforeach
        </div>
    </section>
@endsection
