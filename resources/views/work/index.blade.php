@extends('layout')

@section('content')
    <div class="record-of-services-wrap">
        <section class="record-of-services-section">
            <h2>Додати місце роботи</h2>
            <form method="POST" action="/record-of-services" class="form-search needs-validation">
                @csrf
                <div class="form-column">
                    <div class="mb-3">
                        <label for="company_name">Назва компанії</label>
                        <input type="text" class="form-control" id="company_name" name="company_name" required>
                        <div class="invalid-feedback">
                            Введіть назву!
                        </div>
                    </div>
                    <div class="form-column">
                        <div class="mb-3">
                            <label for="post">Посада</label>
                            <input type="text" class="form-control" id="post" name="post" required>
                            <div class="invalid-feedback">
                                Введіть назву!
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="started_date">Дата початку</label>
                            <input type="date" class="form-control" id="started_date" name="started_date" required>
                            <div class="invalid-feedback">
                                Введіть назву!
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="expiration_date">Дата закінчення</label>
                            <input type="date" class="form-control" id="expiration_date" name="expiration_date"
                                   required>
                            <div class="invalid-feedback">
                                Введіть назву!
                            </div>
                        </div>
                        <button class="btn btn-primary mb-3" type="submit">Додати</button>
                    </div>
                </div>
            </form>
        </section>
        @if($works->count() > 0)
        <section style="width: 60%;">
            <h2>Послужний список {{$user->name}}</h2>
            <div class="wrap-users-info">
                @foreach($works as $work)
                    <div class="users-info">
                        <ul>
                            <li><b>Назва компанії:</b> {{$work -> company_name}}</li>
                            <li><b>Посада:</b> {{$work -> post}}</li>
                            <li><b>Дата початку:</b> {{$work -> started_date}}</li>
                            <li><b>Дата закінчення:</b> {{$work -> expiration_date}}</li>
                        </ul>
                        <div class="wrap-btn-work">
                            <a href="/record-of-services/{{$work->id}}/edit"><button class="btn btn-primary">Редагувати</button></a>
                            <form method="POST" action="/record-of-services/{{$work->id}}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit"><span>Видалили</span></button>
                            </form>
                        </div>

                    </div>
                @endforeach
            </div>
        </section>
            @endif
    </div>
@endsection

