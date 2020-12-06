@extends('layout')

@section('content')
    <section>
        <h1>Особистий акаунт</h1>
        <ul>
            <li><a href="">Особисті дані</a></li>
            @if($user->type === "unemployed")
                <li><a href="/record-of-services/create">Мій послужний список</a></li>
                <li><a href="/allowance/create">Оформити заявку на отримання допомоги</a></li>
                <li><a href="/my-allowances">Мої заявки на отримання пособія</a></li>
                <li><a href="/cv/create">Додати резюме</a></li>
                <li><a href="/my-cv">Мої резюме</a></li>
                <li><a href="/job-offer">Відгуки від роботодавців</a></li>
            @elseif($user->type === "employer")
                <li><a href="/vacancy/create">Додати вакансію</a></li>
                <li><a href="/my-vacancies">Мої вакансії</a></li>
{{--                <li><a href="">Відгуки від робітників</a></li>--}}
            @endif
        </ul>
    </section>
    @if(Auth::user()->type == "admin")
        <a href="{{route('admin')}}">Admin</a>
    @endif
@endsection
