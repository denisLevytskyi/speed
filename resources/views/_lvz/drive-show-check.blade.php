<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Лента №{{ $drive->id }}</title>
        <link rel="stylesheet" href="{{ asset('css/lvz/check.css') }}">
    </head>
    <body>
        <header class="header">
            <a href="{{ route('app.drive.index') }}" class="headerA">
                <img src="{{ asset('images/main_logo.png') }}" class="headerAImg">
            </a>
            <p class="headerP">
                {{ $prop->getProp('org_name') }}
            </p>
            <p class="headerP">
                {{ $prop->getProp('sub_name') }}
            </p>
            <p class="headerP">
                {{ $prop->getProp('sub_address_1') }}
            </p>
            <p class="headerP">
                {{ $prop->getProp('sub_address_2') }}
            </p>
            <div class="headerProps">
                <p class="headerPropsP">
                    ІД {{ $prop->getProp('id') }}
                </p>
                <p class="headerPropsP">
                    ПН {{ $prop->getProp('pn') }}
                </p>
                <p class="headerPropsP">
                    ВН {{ $prop->getProp('version') }}
                </p>
                <p class="headerPropsP">
                    СН {{ $prop->getProp('assembly') }}
                </p>
            </div>
            <div class="headerInfo">
                <a href="{{ route('app.drive.show', $drive->id) }}" class="headerInfoNum">
                    СКОРОСТЕМЕРНАЯ ЛЕНТА № {{ $drive->id }}
                </a>
                <p class="headerInfoP">
                    Начата: {{ $drive->created_at }}
                </p>
                <p class="headerInfoP">
                    Закончена: {{ $drive->updated_at }}
                </p>
                <p class="headerInfoP">
                    От: {{ $drive->point_a }}
                </p>
                <p class="headerInfoP">
                    До: {{ $drive->point_b }}
                </p>
                <p class="headerInfoP">
                    ПО: {{ $drive->odometer }} км
                </p>
            </div>
        </header>
        <section class="main">
            <div class="mainItem">
                <p class="mainItemP mainItemName">
                    ДАННЫЕ ПРО ПОЛЬЗОВАТЕЛЯ
                </p>
                <p class="mainItemP">
                    -> ID: {{ $drive->user->id }}
                </p>
                <p class="mainItemP">
                    -> ИМЯ: {{ $drive->user->name }}
                </p>
                <p class="mainItemP">
                    -> EMAIL: {{ $drive->user->email }}
                </p>
            </div>
            <div class="mainItem">
                <p class="mainItemP mainItemName">
                    ДАННЫЕ ПРО АВТОМОБИЛЬ
                </p>
                <p class="mainItemP">
                    -> ID: {{ $drive->car->id }}
                </p>
                <p class="mainItemP">
                    -> ВЛАДЕЛЕЦ: [{{ $drive->car->user->id }}]  {{ $drive->car->user->name }}
                </p>
                <p class="mainItemP">
                    -> ПРОИЗВОДИТЕЛЬ: {{ $drive->car->manufacturer->mark }}
                </p>
                <p class="mainItemP">
                    -> МОДЕЛЬ: {{ $drive->car->model }}
                </p>
                <p class="mainItemP">
                    -> ГОС НОМЕР: {{ $drive->car->number }}
                </p>
                <p class="mainItemP">
                    -> ЦВЕТ: {{ $drive->car->color }}
                </p>
                <p class="mainItemP">
                    -> ТОПЛИВО: {{ $drive->car->fuel }}
                </p>
                <p class="mainItemP">
                    -> ГОД ВЫПУСКА: {{ $drive->car->year }}
                </p>
            </div>
            @foreach($drive->list as $list)
                <div class="mainItem mainItemClick">
                    <p class="mainItemP mainItemName mainItemNameClick">
                        {{ $list->created_at }} -> {{ $list->speed }} км/ч
                    </p>
                    <p class="mainItemP c0">
                        -> № ПАКЕТА: {{ $list->id }}
                    </p>
                    <p class="mainItemP c0">
                        -> ВРЕМЯ: {{ \Carbon\Carbon::createFromTimestamp($list->timestamp) }}
                    </p>
                    <p class="mainItemP c0">
                        -> СМЕЩЕНИЕ: {{ $list->time }} сек
                    </p>
                    <p class="mainItemP c0">
                        -> ШИРОТА: {{ $list->latitude }}
                    </p>
                    <p class="mainItemP c0">
                        -> ДОЛГОТА: {{ $list->longitude }}
                    </p>
                </div>
            @endforeach
        </section>
        <footer class="footer">
            <div class="footerSum">
                <p class="footerSumP">
                    ВСЕГО ПАКЕТОВ: {{ $drive->list()->count() }}
                </p>
            </div>
            <div class="footerNum">
                <p class="footerNumP">
                    Максимальная скорость: {{ $drive->list()->orderBy('speed', 'desc')->first()->speed }} км/ч
                </p>
                <p class="footerNumP">
                    Первый пакет: {{ $drive->list()->first()->created_at }} [{{ $drive->list()->first()->id }}]
                </p>
                <p class="footerNumP">
                    Последний пакет: {{ $drive->list()->orderBy('id', 'desc')->first()->created_at }} [{{ $drive->list()->orderBy('id', 'desc')->first()->id }}]
                </p>
            </div>
            <div class="footerCode">
                <img src="{{ route('app.qr', Crypt::encryptString(Request::url())) }}" alt="qr" class="footerCodeImg">
            </div>
            <p class="footerFiskal">
                = = = = СКОРОСТЕМЕРНАЯ ЛЕНТА = = = =
            </p>
            <p class="footerP">
                UNIKA Logistic
            </p>
        </footer>
        <script>
            // Получаем все элементы с классом "mainItemName"
            const mainItemNames = document.querySelectorAll('.mainItemNameClick');

            // Перебираем каждый элемент и назначаем обработчик события клика
            mainItemNames.forEach(mainItemName => {
                mainItemName.addEventListener('click', () => {
                    // Находим ближайший родительский элемент с классом "mainItem"
                    const mainItem = mainItemName.closest('.mainItem');

                    // Получаем все дочерние элементы с классом "c0" внутри найденного родительского элемента
                    const c0Elements = mainItem.querySelectorAll('.c0');

                    // Перебираем каждый найденный элемент и изменяем его класс на "c1"
                    c0Elements.forEach(c0Element => {
                        // c0Element.classList.remove('c0');
                        c0Element.classList.toggle('c1');
                    });
                });
            });
        </script>
    </body>
</html>
