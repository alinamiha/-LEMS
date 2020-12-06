@extends('layout')

@section('content')
    <div class="record-of-services-wrap">
        <section>
            <form method="POST" action="/record-of-services/{{$work->id}}" class="form-search needs-validation">
                @csrf
                @method('PUT')
                <div class="form-column">
                    <div class="mb-3">
                        <label for="company_name">Назва компанії</label>
                        <input type="text" class="form-control" id="company_name" name="company_name" value="{{$work->company_name}}" required>
                        <div class="invalid-feedback">
                            Введіть назву!
                        </div>
                    </div>
                    <div class="form-column">
                        <div class="mb-3">
                            <label for="post">Посада</label>
                            <input type="text" class="form-control" id="post" value="{{$work->post}}" name="post" required>
                            <div class="invalid-feedback">
                                Введіть назву!
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="started_date">Дата початку</label>
                            <input type="date" class="form-control" id="started_date" value="{{$work->started_date}}" name="started_date" required>
                            <div class="invalid-feedback">
                                Введіть назву!
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="expiration_date">Дата закінчення</label>
                            <input type="date" class="form-control" id="expiration_date" value="{{$work->expiration_date}}" name="expiration_date"
                                   required>
                            <div class="invalid-feedback">
                                Введіть назву!
                            </div>
                        </div>
                        <button class="btn btn-primary mb-3" type="submit">Редагувати</button>
                    </div>
            </form>
        </section>
    </div>
@endsection

