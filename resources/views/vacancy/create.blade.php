@extends('layout')

@section('content')
    <section>
        <h1>Create Vacancy</h1>
        <form method="POST" action="/vacancy" class="form-search needs-validation">
            @csrf
            <div class="form-column">
                <div class="mb-3">
                    <label for="title">Назва</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                    <div class="invalid-feedback">
                        Введіть назву!
                    </div>
                </div>
                <div class="mb-3">
                    <label for="type_of_working">Тип дияльности</label>
                    <input type="text" class="form-control" id="type_of_working" name="type_of_working" required>
                    <div class="invalid-feedback">
                        Введіть опис!
                    </div>
                </div>
                <div class="mb-3">
                    <label for="post">Посада</label>
                    <input type="text" class="form-control" id="post" name="post">
                    <div class="invalid-feedback">
                        Вкажіть посаду!
                    </div>
                </div>
                <div class="mb-3">
                    <label for="form_of_work">Форма праці</label>
                    <select id="form_of_work" name="form_of_work"
                            class="form-control @error('type') is-invalid @enderror" required>
                        <option value="Дистанційно">Дистанційно</option>
                        <option value="В офісі">В офісі</option>
                    </select>
                    <div class="invalid-feedback">
                        Вкажіть тип дільності!
                    </div>
                </div>
                <div class="mb-3">
                    <label for="company_name">Назва компанії</label>
                    <input type="text" class="form-control" id="company_name" name="company_name">
                    <div class="invalid-feedback">
                        Вкажіть посаду!
                    </div>
                </div>
                <div class="mb-3">
                    <label for="address">Адреса знаходження компанії</label>
                    <input type="text" class="form-control" id="address" name="address">
                    <div class="invalid-feedback">
                        Вкажіть посаду!
                    </div>
                </div>
                <div class="mb-3">
                    <label for="description">Опис вакансії</label>
                    <input type="text" class="form-control" id="description" name="description">
                    <div class="invalid-feedback">
                        Вкажіть посаду!
                    </div>
                </div>
                <div class="mb-3">
                    <label for="sales">Опис вакансії</label>
                    <input type="number" class="form-control" id="sales" name="sales">
                    <div class="invalid-feedback">
                        Вкажіть посаду!
                    </div>
                </div>

                <button class="btn btn-primary mb-3" type="submit">Додати</button>
            </div>
        </form>
    </section>
@endsection

