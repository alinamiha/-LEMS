@extends('layout')

@section('content')
    <section>
        <div class="wrap-users-info users-info-details">
            <h1>Дані про {{$unemployed -> name}}</h1>
            <div class="wrap-span">
                <span><b>Створено:</b> {{$unemployed -> created_at}}</span>
                <span><b>Оновлено:</b> {{$unemployed -> updated_at}}</span>
            </div>

            <ul>
                <li><b>ПІБ:</b> {{$unemployed -> name}}</li>
                <li><b>Вік:</b> {{$unemployed -> age}}</li>
                <li><b>Громадянство:</b> {{$unemployed -> citizenship}}</li>
                <li><b>Рівень освіти:</b> {{$unemployed -> education_degree}}</li>
                <li><b>Назва навчального закладу:</b> {{$unemployed -> name_education}}</li>
                <li><b>Останнє місце роботи:</b> {{$unemployed -> last_work_place}}</li>
                <li><b>Email:</b> {{$unemployed -> email}}</li>
                <li><b>Телефон:</b> {{$unemployed -> phone}}</li>
                <li><b>Cv:</b> {{$unemployed_CV -> cv_name}}</li>
            </ul>
            @if($unemployed_CV !== null)
            <div class="users-info">
                <h2>Резюме</h2>
                <ul>
                    <li><b>Назва:</b> {{$unemployed_CV -> cv_name}}</li>
                    <li><b>Опис:</b> {{$unemployed_CV -> description}}</li>
                    <li><b>Тип діяльності:</b> {{$unemployed_CV -> type_of_working}}</li>
                    <li><b>Посада:</b> {{$unemployed_CV -> post}}</li>
                </ul>
            </div>
            @endif
        </div>
    </section>
@endsection

