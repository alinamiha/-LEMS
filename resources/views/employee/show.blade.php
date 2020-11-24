@extends('layout')

@section('content')

    <div class="wrap">
        <div class="name">
            <p>
                Name:
            </p>
            <span>{{$employee -> name}}</span>
            <span>{{$employee -> position}}</span>
            <span>{{$employee -> phone}}</span>
            <span>{{$employee -> email}}</span>
        </div>
    </div>
@endsection
