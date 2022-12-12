<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
    <title>Orthodontics</title>
</head>
<body>

<div class="wrapper">
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
    <div class="ortodont">
        <div class="conatiner">
            <div class="inner_orto">
                <div class="orto_image">
                    <img src="{{ asset('storage/' . $servic->img) }}" alt="">
                </div>
                <div class="orto_text">
                    <h3>{{ $servic->name }}</h3>
                    <p>
                        {{ $servic->description }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="container">
            <div class="footer_inner">
                <ul>
                    <li>
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
