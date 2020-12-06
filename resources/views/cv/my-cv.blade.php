@extends('layout')

@section('content')
    <section>
        <h1>Мої резюме</h1>
        @foreach($CVs as $cv)
            <div class="my-account-wrap-info">
                <span>{{$cv -> title}}</span>
                <a href="cv/{{$cv->id}}">Переглянути</a>
            </div>
        @endforeach
    </section>
@endsection
