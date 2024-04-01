<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Лента №{{ $drive->id }}</title>
        <link rel="stylesheet" href="{{ asset('css/lvz/check.css') }}">
        <link rel="stylesheet" href="{{ asset('css/lvz/click.css') }}">
    </head>
    <body>
        <header class="header">
            <a href="{{ route('app.drive.index') }}" class="headerA">
                <img src="{{ asset('images/main_logo.png') }}" class="headerAImg" alt="logo">
            </a>
            <p class="headerP">
                {{ $prop->getProp('show_org_name') }}
            </p>
            <p class="headerP">
                {{ $prop->getProp('show_sub_name') }}
            </p>
            <p class="headerP">
                {{ $prop->getProp('show_sub_address_1') }}
            </p>
            <p class="headerP">
                {{ $prop->getProp('show_sub_address_2') }}
            </p>
            <div class="headerProps">
                <p class="headerPropsP">
                    ИД {{ $prop->getProp('show_id') }}
                </p>
                <p class="headerPropsP">
                    ПН {{ $prop->getProp('show_pn') }}
                </p>
                <p class="headerPropsP">
                    ВН {{ $prop->getProp('show_version') }}
                </p>
                <p class="headerPropsP">
                    СН {{ $prop->getProp('show_assembly') }}
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
                <div class="mainItem clickParent">
                    <p class="mainItemP mainItemName clickHeader">
                        {{ $list->created_at }} -> {{ $list->speed }} км/ч
                    </p>
                    <p class="mainItemP clickItem">
                        -> № ПАКЕТА: {{ $list->id }}
                    </p>
                    <p class="mainItemP clickItem">
                        -> ВРЕМЯ: {{ \Carbon\Carbon::createFromTimestamp($list->timestamp) }}
                    </p>
                    <p class="mainItemP clickItem">
                        -> СМЕЩЕНИЕ: {{ $list->time }} сек
                    </p>
                    <p class="mainItemP clickItem">
                        -> ШИРОТА: {{ $list->latitude }}
                    </p>
                    <p class="mainItemP clickItem">
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
        <script src="{{ asset('script/click.js') }}"></script>
    </body>
</html>
