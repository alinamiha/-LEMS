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
            {{--            @if($hasAllowance && $hasAllowance->status == 1)--}}
            @if($hasAllowance)
{{--                @foreach($hasAllowance as $allowance)--}}

{{--                    <p>{{$hasAllowance->status}}</p>--}}
{{--                @endforeach--}}
                <div class="entered-block">
                    <h1>Ви вже оформили заявку на отримання посібника! Ваша заявка обробляється!</h1>
                    <div class="entered-block-link">
                        <a href="/vacancy" class="btn-dark-blue">Переглянути усі вакансії</a>
                        <a href="/cv" class="btn-dark-blue">Переглянути усі резюме</a>
                    </div>
                </div>
            @else
                <form method="POST" action="/allowance" class="form-search needs-validation">
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
                            <label for="birthday">Дата народження</label>
                            <input type="date" class="form-control" id="birthday" name="birthday" required>
                            <div class="invalid-feedback">
                                Введіть дату!
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="citizenship">Громадянство</label>
                            <input type="text" class="form-control" id="citizenship" name="citizenship" required>
                            <div class="invalid-feedback">
                                Вкажіть ваше громадянствот!
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="wrap-form-input">
                                <div class="form-input">
                                    <label for="validationCustom01">Назва документу</label>
                                    <select id="document" name="document_name"
                                            class="form-control @error('type') is-invalid @enderror" required>
                                        <option value="Паспорт">Паспорт</option>
                                        <option value="Посвідчення водія">Посвідчення водія</option>
                                        <option value="Посвідчення безробітнього">Посвідчення безробітнього</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Вкажіть назву документу!
                                    </div>
                                </div>
                                <div class="form-input-row">
                                    <div class="form-input">
                                        <label for="number">Серія/номер</label>
                                        <input type="text" class="form-control" id="number" name="number">
                                        <div class="invalid-feedback">
                                            Вкажіть серію, або номер документу!
                                        </div>
                                    </div>
                                    <div class="form-input">
                                        <label for="date_of_issue">Дата видачі</label>
                                        <input type="date" class="form-control" id="date_of_issue"
                                               name="date_of_issue">
                                        <div class="invalid-feedback">
                                            Вкажіть дату видачі документу!
                                        </div>
                                    </div>
                                </div>
                                <div class="form-input-row">
                                    <div class="form-input">
                                        <label for="issued_by">Ким видан</label>
                                        <input type="text" class="form-control" id="issued_by"
                                               name="issued_by">
                                        <div class="invalid-feedback">
                                            Вкажіть ким виданий документ!
                                        </div>
                                    </div>
                                    <div class="form-input">
                                        <label for="TIN_number">Номер ІНН</label>
                                        <input type="text" class="form-control" id="TIN_number"
                                               name="TIN_number">
                                        <div class="invalid-feedback">
                                            Вкажіть номер ІНН!
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="registration_address">Адреса реєстрації місця проживання</label>
                            <input type="text" class="form-control" id="registration_address"
                                   name="registration_address"
                            >
                            <div class="invalid-feedback">
                                Вкажіть адресу реєстрації місця проживання!
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="factual_address">Адреса фактичного місця проживання</label>
                            <input type="text" class="form-control" id="factual_address" name="factual_address">
                            <div class="invalid-feedback">
                                Вкажіть адреса фактичного місця проживання!
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="education_degree">Рівень освіти</label>
                            <select id="education_degree" name="education_degree"
                                    class="form-control @error('type') is-invalid @enderror" required>
                                <option value="Середній">Середнє</option>
                                <option value="Вищий">Вище</option>
                                <option value="Незакінчений вищий">Незакінчене вище</option>
                                <option value="Без освіт">Без освіти</option>
                            </select>

                            <div class="invalid-feedback">
                                Вкажіть ваш рівень освіти!
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="name_education">Найменування закладу освіти</label>
                            <input type="text" class="form-control" id="name_education" name="name_education">
                            <div class="invalid-feedback">
                                Вкажіть найменування закладу освіти!
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="last_work_place">Останнє місце роботи</label>
                            <input type="text" class="form-control" id="last_work_place" name="last_work_place">
                            <div class="invalid-feedback">
                                Вкажіть останнє місце роботи!
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
