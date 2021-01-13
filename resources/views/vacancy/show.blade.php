@extends('layout')

@section('content')
    <section>
        <h1>Автор вакансії: {{$vacancy->user_name}}</h1>
        <div class="users-info">
            <ul>
                <li><b>Назва:</b> {{$vacancy -> title}}</li>
                <li><b>Категорія:</b> {{$vacancy -> type_of_working}}</li>
                <li><b>Посада:</b> {{$vacancy -> post}}</li>
                <li><b>Форма роботи:</b> {{$vacancy -> form_of_work}}</li>
                <li><b>Назва компанії:</b> {{$vacancy -> company_name}}</li>
                <li><b>Адреса:</b> {{$vacancy -> address}}</li>
                <li><b>Описання:</b> {{$vacancy -> description}}</li>
                <li><b>Заробітна плата:</b> {{$vacancy -> sales}}</li>
                <li><b>Електронна пошта:</b> {{$vacancy -> user_email}}</li>
            </ul>
        </div>

    </section>
@endsection
