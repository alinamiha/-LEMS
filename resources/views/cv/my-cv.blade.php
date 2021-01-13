@extends('layout')

@section('content')
    <section>
        <h1>Мої резюме</h1>
        @foreach($CVs as $cv)
            <form method="POST" action="/cv/{{$cv->id}}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit"><span>Видалили</span></button>
            </form>
            <div class="wrap">
                <div class="my-account-wrap-info">
                    <span>{{$cv -> title}}</span>
                    <a href="cv/{{$cv->id}}">Переглянути</a>
                </div>

            </div>
        @endforeach
    </section>
@endsection
