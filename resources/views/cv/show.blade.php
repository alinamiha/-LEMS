@extends('layout')

@section('content')
    <section>
        <div class="wrap-users-info users-info-details">
            <h1>{{$unemployed_CV->name}}, {{calculate_age($unemployed_CV->birthday)}} років</h1>
            <ul>
                <li>Категорія {{$unemployed_CV -> type_of_working}}</li>
                <li>Посада {{$unemployed_CV -> post}}</li>
                <li>Місто проживання {{$unemployed_CV -> city}}</li>
                <li>Назва {{$unemployed_CV -> cv_name}}</li>
                <li>Опис {{$unemployed_CV -> description}}</li>
                <li>Електрона пошта {{$unemployed_CV -> email}}</li>
            </ul>
        </div>
        {{--{{dd($user->isEmployer())}}--}}

        @if($user->isEmployer() && $user->id !== $unemployed_CV->user_id)
            <div class="wrap-vacancy-list">
                <button class="vacancy-list-toggle-btn btn btn-primary">Вибрати вакансію</button>
                <form method="POST" action="/job-offer/{{$unemployed_CV->id}}/store"
                      class="form-search needs-validation">
                    @csrf
                    <div class="form-column">
                        <input type="hidden" name="unemployed_id" value="{{$unemployed_CV->unemployed_id}}">
                        <div class="vacancy-list">
                            @foreach($user->employer->vacancies as $vacancy)
                                <span class="vacancy-list-item">
                                        <label
                                            for="title-{{$vacancy->id}}">{{$vacancy->title}} {{$unemployed->hasJobOffer($vacancy->id) ? "  (Вакансія була вже відправлена цьому користувачу!)":''}}</label>
                                        <input type="checkbox" class="form-control" id="title-{{$vacancy->id}}"
                                               name="vacancy_ids[]" value="{{$vacancy->id}}">
                                </span>
                            @endforeach
                            <button class="btn btn-primary mb-3" type="submit">Відправити</button>
                        </div>
                    </div>
                </form>
            </div>

        @endif
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
