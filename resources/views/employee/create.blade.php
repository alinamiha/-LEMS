@extends('layout')

@section('content')

    <section>
        @guest
            <div class="entered-block">
                <h1>Для реєстрації на отримання виплат по безробіттю, ви повинні увійти у приватний
                    кабінет, або зареєструватись на сайті!</h1>
                <div class="entered-block-link">
                    <a href="{{ route('login') }}" class="btn-dark-blue text-sm text-gray-700 underline">Увійти</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn-dark-blue text-sm text-gray-700 underline">Зареєструватись</a>
                    @endif
                </div>
            </div>



        @else
            @if($employees > 0)
                <div class="entered-block">
                    <h1>Ви вже оформили заявку на отримання посібника! Ваша заявка обробляється!</h1>
                    <div class="entered-block-link">
                        <a href="/employee" class="btn-dark-blue">Переглянути усіх роботодавців</a>
                        <a href="/allowance" class="btn-dark-blue">Переглянути усіх безробіних</a>
                    </div>
                </div>
            @else
                <form method="POST" action="/employee" class="form-search needs-validation">
                    @csrf
                    <div class="form-column">

                        <div class="mb-3">
                            <label for="name">ПІБ</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                            <div class="invalid-feedback">
                                Введіть ПІБ!
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="position">Посада</label>
                            <input type="text" class="form-control" id="position" name="position" required>
                            <div class="invalid-feedback">
                                Введіть дату!
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="phone">Телефон</label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                            <div class="invalid-feedback">
                                Вкажіть ваше громадянствот!
                            </div>
                        </div>
                        <button class="btn btn-primary mb-3" type="submit">Зареєструватись</button>
                    </div>
                </form>
                <img class="section-img" src="/img/government.jpg" alt="government">
            @endif
        @endguest
    </section>
@endsection
