@extends('layout')

@section('content')
    <section>
        <div class="wrap-users-info">
            @foreach($CVs as $cv)
                <div class="users-info">
                    <h2>{{$cv -> name}}</h2>
                    <h4>{{calculate_age($cv -> birthday)}} років</h4>
                    <ul>
                        <li><b>Категорія:</b> {{$cv -> type_of_working}}</li>
                        <li><b>Посада:</b> {{$cv -> post}}</li>
                        <a href="/cv/{{$cv->id}}">Переглянути повністю</a>
                    </ul>
                </div>
            @endforeach
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
