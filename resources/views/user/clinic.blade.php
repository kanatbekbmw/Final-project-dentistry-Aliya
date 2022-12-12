<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
    <title>About clinic</title>
</head>
<body>
    <div class="wrapper">

        <div id="modal_window">
            <div id="modal">
                <button id="close">X</button>
                <h2>хотите записаться на прием?</h2>
                <input type="text" placeholder="*ИМЯ" class="modal_input">
                <input type="text" placeholder="*ФАМИЛИЯ" class="modal_input">
                <input type="number" placeholder="*НОМЕР ТЕЛЕФОНА" class="modal_input">
                <button id="send_btn">отправить</button>
                <p>ВСЕ ПОЛЯ ПОМЕЧЕННЫЕ (*) - ОБЯЗАТЕЛЬНЫ ДЛЯ ЗАПОЛНЕНИЯ.</p>
            </div>
        </div>

        <div class="header">
            <div class="container">
                <div class="inner_header">
                    <ul class="menu">
                        <li>
                            <a href="{{ route('user') }}" class="logotype">
                                Aliya Clinic
                            </a>
                        </li>
                        <li>
                            <button class="add_button" id="modal_btn">
                                Записаться на приём
                            </button>
                        </li>
                        <li>
                            <a href="{{ $clinic->whatsapp }}" class="number" target="_blank">
                                {{ $clinic->number }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="navbar">
            <div class="container">
                <div class="inner_navbar">
                    <ul class="navbar_menu">
                        <a href="{{ route('user') }}">
                            <li>
                                Главная
                            </li>
                        </a>
                        <a href="{{ route('doctors') }}">
                            <li>
                                Наши доктора
                            </li>
                        </a>
                        <a href="{{ route('clinic') }}">
                            <li>
                                О клинике
                            </li>
                        </a>
                        <a href="{{ route('contacts') }}">
                            <li>
                                Контакты
                            </li>
                        </a>
                        <a href="{{ route('services') }}">
                            <li>
                                Наши услуги
                            </li>
                        </a>

                    </ul>
                </div>
            </div>
        </div>
        <div class="clinic">

        </div>

        <div class="clinic_cards">
            <div class="container">
                <div class="inner_cards">
                    <div class="clinic_card">
                        <i class="fa fa-user-md fa-5x" aria-hidden="true"></i>
                        <p class="pop">
                            Мы работаем по новейшим методикам в сфере лечения и протезирования зубов.
                        </p>
                    </div>
                    <div class="clinic_card">
                        <i class="fa fa-smile-o fa-5x" aria-hidden="true"></i>
                        <p class="pop">
                            Наша миссия — дарить вам прекрасную и здоровую улыбку.
                        </p>
                    </div>
                    <div class="clinic_card">
                        <i class="fa fa-users fa-5x" aria-hidden="true"></i>
                        <p class="pop">
                            Наша главная цель - сделать вас чуточку счастливее, чем вы есть сегодня.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="clinic_information">
            <div class="container">
                <div class="doc_text">
                    <h2>{{ $clinic->name }}</h2>
                </div>
                <p>
                    {{ $clinic->description }}
                </p>
            </div>
        </div>

        <div class="footer">
            <div class="container">
                <div class="footer_inner">
                    <ul>
                        <li class="foot_content">
                            <a href="{{ route('user') }}" class="logotype">
                                Aliya Clinic
                            </a>
                        </li>
                        <li>
                            <a href="{{ $clinic->whatsapp }}" class="foot_num" target="_blank">
                                {{ $clinic->number }}
                            </a>
                        </li>
                        <li>
                            <a href="https://kanatbekbmw@gmail.com" target="_blank" class="foot_gmail">
                                kanatbekbmw@gmail.com
                            </a>
                        </li>
                        <li>
                            <span>Наш адрес (2GIS): </span>
                            <a href="{{ $clinic->twogis }}" target="_blank">
                                {{ $clinic->address }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/main.js"></script>
</body>
</html>
