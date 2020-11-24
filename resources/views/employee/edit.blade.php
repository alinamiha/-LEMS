@extends('layout')

@section('content')
    <h1>Редагувати дані: </h1>
    <section>
        <form method="POST" action="/unemployed/{{$unemployed->id}}" class="form-search needs-validation" >
            @csrf
            @method('PUT')
            <div class="form-column">
                <div class="mb-3">
                    <label for="validationCustom01">ПІБ</label>
                    <input type="text" class="form-control" id="validationCustom01" name="name" required value="{{$unemployed->name}}">
                    <div class="invalid-feedback">
                        Введіть ПІБ!
                    </div>
                </div>
                <div class="mb-3">
                    <label for="validationCustom01">Дата народження</label>
                    <input type="text" class="form-control" id="validationCustom02" name="birthday"required value="{{$unemployed->birthday}}"">
                    <div class="invalid-feedback">
                        Введіть дату!
                    </div>
                </div>
                <div class="mb-3">
                    <label for="validationCustom01">Громадянство</label>
                    <input type="text" class="form-control" id="validationCustom02" name="citizenship" required value="{{$unemployed->citizenship}}">
                    <div class="invalid-feedback">
                        Вкажіть населений пункт!
                    </div>
                </div>

                <div class="mb-3">
                    <label for="validationCustom01">Адреса реєстрації місця проживання</label>
                    <input type="text" class="form-control" id="validationCustom02" name="registration_address" required  value="{{$unemployed->registration_address}}">
                    <div class="invalid-feedback">
                        Вкажіть населений пункт!
                    </div>
                </div>
                <div class="mb-3">
                    <label for="validationCustom01">Адреса фактичного місця проживання</label>
                    <input type="text" class="form-control" id="validationCustom02" name="factual_address" required value="{{$unemployed->factual_address}}">
                    <div class="invalid-feedback">
                        Вкажіть населений пункт!
                    </div>
                </div>
                <div class="mb-3">
                    <label for="validationCustom01">Рівень освіти</label>
                    <input type="text" class="form-control" id="validationCustom02" name="education_degree" required  value="{{$unemployed->education_degree}}">
                    <div class="invalid-feedback">
                        Вкажіть населений пункт!
                    </div>
                </div>
                <div class="mb-3">
                    <label for="validationCustom01">Найменування закладу освіти</label>
                    <input type="text" class="form-control" id="validationCustom02" name="name_education" required value="{{$unemployed->name_education}}">
                    <div class="invalid-feedback">
                        Вкажіть населений пункт!
                    </div>
                </div>
                <div class="mb-3">
                    <label for="validationCustom01">Останнє місце роботи</label>
                    <input type="text" class="form-control" id="validationCustom02" name="last_work_place" required value="{{$unemployed->last_work_place}}">
                    <div class="invalid-feedback">
                        Вкажіть населений пункт!
                    </div>
                </div>
            </div>
            <button class="btn btn-primary mb-3" type="submit">Обновити</button>
        </form>
        <img class="section-img" src="/img/government.jpg" alt="government">
    </section>
@endsection
