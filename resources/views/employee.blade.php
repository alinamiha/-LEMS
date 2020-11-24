@extends('layout')

@section('content')

    @guest
        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
        @endif
    @else
        <section>
            <div class="wrap-article">

                <article>
                    <h2>
                        Зареєструватись як роботодавець!
                    </h2>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                        industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                        scrambled it to make a type specimen book.
                    </p>
                    <button class="btn btn-dark-blue mb-3" type="submit"><a href="/employee/create">Зареєструватись</a></button>
                </article>

                <article>
                    <h2>
                        Додати вакансию!
                    </h2>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                        industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                        scrambled it to make a type specimen book.
                    </p>
                    <button class="btn btn-dark-blue mb-3" type="submit"><a href="/vacancy/create">Додати</a></button>
                </article>
            </div>


            <img class="section-img" src="/img/government.jpg" alt="government">
        </section>
    @endguest
@endsection
