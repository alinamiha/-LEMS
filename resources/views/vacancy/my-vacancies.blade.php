@extends('layout')

@section('content')
    <section>
        <h1>Мої вакансії</h1>
        @foreach($vacancies as $vacancy)
            <div class="info-block" style="float: right;display:flex; flex-direction: column;background: red; color: #fff;padding: 10px;">
                <span>Ця вакансія була підтверджена {{$vacancy->offerSuccess}} рази</span>
                <span>Ця вакансія була відхилина {{$vacancy->offersDenied}} рази</span>
                <span>Дата створення {{$vacancy->created_at}}</span>
                <span>Дата створення {{$vacancy->maxVal}}</span>
            </div>
            <div class="my-account-wrap-info">
                <span>{{$vacancy -> title}}</span>
                <a href="vacancy/{{$vacancy->id}}">Переглянути</a>
            </div>
            <div class="my-account-wrap-info">
                <a href="/info/{{$vacancy->id}}/print">Скачать</a>
            </div>
        @endforeach
    </section>
@endsection
