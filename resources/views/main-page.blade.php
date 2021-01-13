@extends('layout')

@section('head-files')
{{--    <script src="/js/typeahead.js"></script>--}}
@endsection
@section('footer-files')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.js"></script>

    <script>
        let searchElement = $('#job-categories-search .typeahead');
        let url = searchElement.data('source');
        searchElement.typeahead({
            // source: substringMatcher(states),
            source : function(term, process){
                console.log(term, process)
                $.get(url, {term:term}, function(data){
                    console.log(data)
                    return process(data)
                })
            }
        });
    </script>
@endsection

@section('content')



    <section>

        <div class="wrap-main-page">
            <h1>Остались без работы? Как получить пособие?</h1>
            <img class="main-page-img" src="/img/birja-940x528.jpg" alt="">

            <div id="job-categories-search">
                <h2>Пошук категорії</h2>
                <input class="typeahead" data-source="{{action('JobCategoryController@search')}}" type="text" placeholder="Введіть назву категорії">
            </div>
            <article>
                <h2><br>Как получить статус безработного?</h2>


                <p><br>Для этого необходимо зарегистрироваться в любом центре занятости (не обязательно по месту вашей
                    прописки) и подтвердить, что сейчас вы не работаете. Сделать это можно хоть через неделю, хоть через
                    год после того, как потеряли работу, — закон не устанавливает никаких временных рамок.</p>


                <p>В период карантина зарегистрироваться можно онлайн. Но перед этим нужно отсканировать или
                    сфотографировать следующие <strong>документы</strong>:</p>


                <ul>
                    <li>паспорт гражданина Украины или другой документ, удостоверяющий личность и подтверждающий
                        гражданство Украины;
                    </li>
                    <li> справку о присвоении регистрационного номера налогоплательщика;</li>
                    <li> трудовую книжку (гражданско-правовой договор или документ, подтверждающий прекращение
                        последнего вида занятости). Если нет — можно предъявить дубликат книжки или справку архивного
                        учреждения о принятии и увольнении с работы;
                    </li>
                    <li> документ об образовании;</li>
                    <li> военно-учетный документ для лиц, освободившихся из срочной военной службы.</li>
                </ul>


                <p>Внутренне перемещенные лица, которые не имеют документов, подтверждающих факт увольнения, должны
                    предоставить:</p>


                <div class="text-with-suggest__suggest">

                    <ul>
                        <li>нотариально заверенное заявление о прекращении трудовых отношений или документ,
                            подтверждающий факт прекращения занятости (гражданско-правовой договор, выписка из Единого
                            госреестра юридических лиц, физических лиц-предпринимателей и общественных формирований) или
                            соответствующее решение суда;
                        </li>
                        <li>квитанцию, подтверждающую отправку указанного заявления работодателю заказным письмом с
                            описью вложения (по возможности).
                        </li>
                    </ul>


        </div>
            </article>

{{--                <form class="form-search needs-validation" novalidate>--}}
{{--                    <div class="form-column">--}}
{{--                        <form action="/main-page" method="get"></form>--}}
{{--                        @csrf--}}
{{--                        <div class="mb-3">--}}
{{--                            <label for="post">Виберіть сферу роботи:</label>--}}
{{--                            <select id="post" name="type_of_working"--}}
{{--                                    class="form-control @error('type') is-invalid @enderror" required>--}}
{{--                                <option value="IT-сфера">IT-сфера</option>--}}
{{--                                <option value="Менеджмент">Менеджмент</option>--}}
{{--                                <option value="Бухгалтерія">Бухгалтерія</option>--}}
{{--                                <option value="Вантажоперевезення">Вантажоперевезення</option>--}}
{{--                            </select>--}}

{{--                            <input type="text" name="type_of_working">--}}
{{--                            <div class="invalid-feedback">--}}
{{--                                Введіть посаду!--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="mb-3">--}}
{{--                            <label for="address">Виберіть населений пункт:</label>--}}
{{--                            <select id="address" name="address"--}}
{{--                                    class="form-control @error('type') is-invalid @enderror" required>--}}
{{--                                <option value="Одеса">Одеса</option>--}}
{{--                                <option value="Київ">Київ</option>--}}
{{--                                <option value="Херсон">Херсон</option>--}}
{{--                                <option value="Харків">Харків</option>--}}
{{--                                <option value="Черкаси">Черкаси</option>--}}
{{--                            </select>--}}
{{--                            <div class="invalid-feedback">--}}
{{--                                Вкажіть населений пункт!--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="mb-3">--}}
{{--                            <label for="validationCustomUsername">Розділ</label>--}}
{{--                            <div class="form-group-check">--}}
{{--                                <div class="form-check">--}}
{{--                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>--}}
{{--                                    <label class="form-check-label" for="exampleRadios1">--}}
{{--                                        Вакансія--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                                <div class="form-check">--}}
{{--                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">--}}
{{--                                    <label class="form-check-label" for="exampleRadios2">--}}
{{--                                        Резюме--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <button class="btn btn-primary mb-3" type="submit">Пошук</button>--}}
{{--                </form>--}}
        </div>
    </section>
@endsection
