@extends('layout')

@section('content')
    <section>
        <form class="form-search needs-validation" novalidate>
            <div class="form-column">
                <div class="mb-3">
                    <label for="validationCustom01">Я шукаю:</label>
                    <input type="text" class="form-control" id="validationCustom01" placeholder="Введіть посаду" required>
                    <div class="invalid-feedback">
                        Введіть посаду!
                    </div>
                </div>
                <div class="mb-3">
                    <label for="validationCustom02">Населенний пункт</label>
                    <input type="text" class="form-control" id="validationCustom02" placeholder="Введіть населений пункт" required>
                    <div class="invalid-feedback">
                        Вкажіть населений пункт!
                    </div>
                </div>
                <div class="mb-3">
                    <label for="validationCustomUsername">Розділ</label>
                    <div class="form-group-check">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Вакансія
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                                Резюме
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary mb-3" type="submit">Пошук</button>
        </form>
        <img class="section-img" src="/img/government.jpg" alt="government">
    </section>
@endsection
