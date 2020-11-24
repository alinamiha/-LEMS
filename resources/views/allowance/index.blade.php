@extends('layout')

@section('content')
    <section>
        <div class="wrap-users-info">
            @foreach($unemployed as $worker)
                <div class="users-info">
                    <ul>
                        <li><b>ПІБ:</b> {{$worker -> name}}</li>
                        <li><b>Вік:</b> {{$worker -> age}}</li>
                        <li><b>Громадянство:</b> {{$worker -> citizenship}}</li>
                        <li><b>Рівень освіти:</b> {{$worker -> education_degree}}</li>
                        <li><b>Назва навчального закладу:</b> {{$worker -> name_education}}</li>
                        <li><b>Останнє місце роботи:</b> {{$worker -> last_work_place}}</li>
                    </ul>
                    <a href="/allowance/{{$worker->id}}">Детальніше</a>
                </div>
            @endforeach

        </div>
    </section>
@endsection
