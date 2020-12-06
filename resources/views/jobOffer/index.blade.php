@extends('layout')

@section('content')
    <section>
        <div class="wrap-users-info">
            @foreach($offers as $offer)
                <div class="users-info">
                    <ul>
                        <li><b>Назва вакансії:</b>{{$offer->title}}</li>
                        <li><b>Категорія:</b>{{$offer->type_of_working}}</li>
                        <li><b>Посада:</b>{{$offer->post}}</li>
                        <li><b>Заробітна плата:</b>{{$offer->sales}}</li>
                        <a class="btn btn-primary" href="/vacancy/{{$offer->id}}">Детальніше</a>
                        <a class="btn btn-success" href="/vacancy/{{$offer->id}}">Погодитись</a>
                        <a class="btn btn-danger" href="/vacancy/{{$offer->id}}">Відмовитись</a>
                    </ul>
                </div>
            @endforeach
        </div>
    </section>
@endsection


