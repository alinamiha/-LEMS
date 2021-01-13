@extends('layout')

@section('content')
    <section>
        <h1>Мої заявки на отримання пособія</h1>
        @foreach($allowances as $allowance)
            <div class="my-account-wrap-info">
                <span>@if($allowance -> status == 0)Принята @elseif($allowance -> status == 1)В обработке @elseif($allowance -> status == 2) Отклонена @endif</span>
                <a href="allowance/{{$allowance->id}}">Переглянути</a>
            </div>
        @endforeach
    </section>
@endsection
