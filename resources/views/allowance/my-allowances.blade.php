@extends('layout')

@section('content')
    <section>
        <h1>Мої заявки на отримання пособія</h1>
        @foreach($allowances as $allowance)
            <div class="my-account-wrap-info">
                <span>{{$allowance -> citizenship}}</span>
                <a href="allowance/{{$allowance->id}}">Переглянути</a>
            </div>
        @endforeach
    </section>
@endsection
