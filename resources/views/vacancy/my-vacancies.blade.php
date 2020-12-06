@extends('layout')

@section('content')
    <section>
        <h1>Мої вакансії</h1>
        @foreach($vacancies as $vacancy)
            <div class="my-account-wrap-info">
                <span>{{$vacancy -> title}}</span>
                <a href="vacancy/{{$vacancy->id}}">Переглянути</a>
            </div>
        @endforeach
    </section>
@endsection
