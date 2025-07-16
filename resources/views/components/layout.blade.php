<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Главная страница сайта">
    <title>{{ $title }}</title>
    <!-- Подключение стилей -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Подключение шрифтов -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<header class="bg-blue-600 text-white py-4">
    <div class="container mx-auto flex justify-between items-center px-4">
        <div class="text-2xl font-bold">
            <a href="/">Мой сайт</a>
        </div>
        <nav>
            <ul class="flex space-x-4">
                <li><a href="/" class="hover:underline">Главная</a></li>
                <li><a href="/about" class="hover:underline">О нас</a></li>
                <li><a href="/services" class="hover:underline">Услуги</a></li>
                <li><a href="/contact" class="hover:underline">Контакты</a></li>
            </ul>
        </nav>
    </div>
</header>
<body>
{{ $slot }}
</body>

<footer class="bg-gray-800 text-white py-6">
    <div class="container mx-auto px-4 text-center">
        <p>&copy; {{ date('Y') }} Мой сайт. Все права защищены.</p>
        <nav class="mt-2">
            <ul class="flex justify-center space-x-4">
                <li><a href="/privacy" class="hover:underline">Политика конфиденциальности</a></li>
                <li><a href="/terms" class="hover:underline">Условия использования</a></li>
            </ul>
        </nav>
    </div>
</footer>
<!-- Подключение скриптов -->
<script src="{{ asset('js/app.js') }}"></script>
</html>
