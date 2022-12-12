<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
    <title>Doctor</title>
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
                        <a href="services.html">
                            <li>
                                Наши услуги
                            </li>
                        </a>
                    </ul>
                </div>
            </div>
        </div>
        <div class="doctors">
            <div class="container">
                <div class="inner_docs">
                    <div class="doc_text">
                        <h2>{{ $doctor->name }}</h2>
                    </div>
                    <div class="doc_content">
                        <div class="doc_image">
                            <img src="{{ asset('storage/' . $doctor->img) }}" alt="">
                        </div>
                        <div class="doc_text_content">
                            <p>стаж работы:
                                <span>{{ $doctor->experience }} года</span>
                            </p>
                            <p>специальность:
                                <span>{{ $doctor->speciality }}</span>
                            </p>
                            <p>образование:
                                <span>{{ $doctor->education }}</span>
                        </div>
                    </div>
                </div>
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
