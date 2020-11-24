@extends('layout')

@section('content')
    <section>
        <h1>aaaaaa</h1>
        <a href="/cv/create">link</a>
    </section>






    <section>
        <form method="POST" action="/unemployed" class="form-search needs-validation" >
            @csrf
            <div class="form-column">
                <div class="mb-3">
                    <label for="validationCustom01">ПІБ</label>
                    <input type="text" class="form-control" id="validationCustom01" name="name" required>
                    <div class="invalid-feedback">
                        Введіть ПІБ!
                    </div>
                </div>
                <div class="mb-3">
                    <label for="validationCustom01">Дата народження</label>
                    <input type="text" class="form-control" id="validationCustom02" name="birthday"required>
                    <div class="invalid-feedback">
                        Введіть дату!
                    </div>
                </div>
                <div class="mb-3">
                    <label for="validationCustom01">Громадянство</label>
                    <input type="text" class="form-control" id="validationCustom02" name="citizenship" required>
                    <div class="invalid-feedback">
                        Вкажіть населений пункт!
                    </div>
                </div>
                <div class="mb-3">
                    <label for="validationCustom01">Адреса реєстрації місця проживання</label>
                    <input type="text" class="form-control" id="validationCustom02" name="registration_address" required>
                    <div class="invalid-feedback">
                        Вкажіть населений пункт!
                    </div>
                </div>
                <div class="mb-3">
                    <label for="validationCustom01">Адреса фактичного місця проживання</label>
                    <input type="text" class="form-control" id="validationCustom02" name="factual_address" required>
                    <div class="invalid-feedback">
                        Вкажіть населений пункт!
                    </div>
                </div>
                <div class="mb-3">
                    <label for="validationCustom01">Рівень освіти</label>
                    <input type="text" class="form-control" id="validationCustom02" name="education_degree" required>
                    <div class="invalid-feedback">
                        Вкажіть населений пункт!
                    </div>
                </div>
                <div class="mb-3">
                    <label for="validationCustom01">Найменування закладу освіти</label>
                    <input type="text" class="form-control" id="validationCustom02" name="name_education" required>
                    <div class="invalid-feedback">
                        Вкажіть населений пункт!
                    </div>
                </div>
                <div class="mb-3">
                    <label for="validationCustom01">Останнє місце роботи</label>
                    <input type="text" class="form-control" id="validationCustom02" name="last_work_place" required>
                    <div class="invalid-feedback">
                        Вкажіть населений пункт!
                    </div>
                </div>
                <div class="mb-3">
                    <label for="validationCustom01">Телефон</label>
                    <input type="text" class="form-control" id="validationCustom02" name="telephone" required>
                    <div class="invalid-feedback">
                        Вкажіть населений пункт!
                    </div>
                </div>
            </div>
            <button class="btn btn-primary mb-3" type="submit">Редагувати</button>
        </form>
    </section>
@endsection
