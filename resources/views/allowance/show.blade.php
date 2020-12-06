@extends('layout')

@section('content')
    <section>
        <div class="users-info-details">
            <h1>Заявка автора {{Auth::user() -> name}}</h1>
            <div class="wrap-span">
                <span><b>Створено:</b> {{$unemployed -> created_at}}</span>
                <span><b>Оновлено:</b> {{$unemployed -> updated_at}}</span>
            </div>

            <ul>
                <li><b>Заявка №:</b> {{$unemployed->id}}</li>
                <li><b>ПІБ:</b> {{Auth::user() -> name}}</li>
                <li><b>Вік:</b> {{calculate_age($unemployed -> birthday)}}</li>
                <li><b>Громадянство:</b> {{$unemployed -> citizenship}}</li>
                <li><b>Рівень освіти:</b> {{$unemployed -> education_degree}}</li>
                <li><b>Назва навчального закладу:</b> {{$unemployed -> name_education}}</li>
                <li><b>Останнє місце роботи:</b> {{$unemployed -> last_work_place}}</li>
                <li><b>Email:</b> {{Auth::user() -> email}}</li>
                <li><b>Телефон:</b> {{Auth::user() -> phone}}</li>
                {{--                <li><b>Cv:</b> {{$unemployed_CV -> cv_name}}</li>--}}
            </ul>
{{--            @if($unemployed_CV !== null)--}}
{{--                @foreach($unemployed_CV as $cv)--}}
{{--                    <div class="users-info">--}}
{{--                        <h2>Резюме</h2>--}}
{{--                        <ul>--}}
{{--                            <li><b>Назва:</b> {{$cv -> cv_name}}</li>--}}
{{--                            <li><b>Опис:</b> {{$cv -> description}}</li>--}}
{{--                            <li><b>Тип діяльності:</b> {{$cv -> type_of_working}}</li>--}}
{{--                            <li><b>Посада:</b> {{$cv -> post}}</li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            @endif--}}
        </div>
    </section>
@endsection
<?php
function calculate_age($birthday)
{
    $birthday_timestamp = strtotime($birthday);
    $age = date('Y') - date('Y', $birthday_timestamp);
    if (date('md', $birthday_timestamp) > date('md')) {
        $age--;
    }
    return $age;
}

?>

