@extends('layout')

@section('content')
    <section>
        <div class="wrap-users-info">
            <h1>За останній тиждень ви отримали {{$users_offer}} пропозиції про роботу</h1>
            @foreach($offers as $offer)
                <div class="users-info @if($offer->status == 2) hidden @endif ">
                    <ul>
                        <li><b>Назва вакансії:</b>{{$offer->title}}</li>
{{--                        <li><b>Номер предложения:</b>{{$offer->job_offer_id}}</li>--}}
                        <li><b>Категорія:</b>{{$offer->type_of_working}}</li>
                        <li><b>Посада:</b>{{$offer->post}}</li>
                        <li><b>Заробітна плата:</b>{{$offer->sales}}</li>
                        <a class="btn btn-primary" href="/vacancy/{{$offer->id}}">Детальніше</a>
                        <form action="/offers/{{$offer->job_offer_id}}/access" method="POST">
                            @csrf
                            @method('PUT')
                            <button style="width: 100%;" type="submit" class="btn btn-success">Погодитись</button>
                        </form>
                        <form action="/offers/{{$offer->job_offer_id}}/denied" method="POST">
                            @csrf
                            @method('PUT')
                            <button style="width: 100%;" type="submit" class="btn btn-danger">Відмовитись</button>
                        </form>
                    </ul>
                </div>
            @endforeach
        </div>
    </section>
@endsection


