@extends('layout')

@section('content')
    {{--    @if(Auth::user()->type == "admin")--}}
    {{--        <a href="admin">Admin</a>--}}
    {{--    @endif--}}
    <div class="admin">
        <h1>Пропозиції про роботу</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Unemployed name</th>
                <th>Vacancy title</th>
                <th>Type of working</th>
                <th>Sales</th>
                <th>Status</th>
            </tr>
            @foreach($offers as $offer)
                <tr>
                    <td>{{$offer->offer_id}}</td>
                    <td>{{$offer->unemployed_name}}</td>
                    <td>{{$offer->vacancy_title}}</td>
                    <td>{{$offer->type_of_working}}</td>
                    <td>{{$offer->sales}}$</td>
                    <td>@if($offer->status == 0) Відправлена @elseif($offer->status == 1) Прийнята @elseif($offer->status == 2) Відхилена @endif</td>
                </tr>
            @endforeach
        </table>

        <h1>Користучі, які не мають резюме та заявку</h1>

        <table>
            <tr>
                <th>Unemployed ID</th>
                <th>User ID</th>
                <th>Name</th>
            </tr>
            @foreach($unemployeds as $unemployed)
                <tr>
                    <td>{{$unemployed->unemployed_id}}</td>
                    <td>{{$unemployed->user_id}}</td>
                    <td>{{$unemployed->name}}</td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection
