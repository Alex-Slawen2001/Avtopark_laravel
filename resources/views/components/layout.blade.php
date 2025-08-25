<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Главная страница сайта">
    <title>{{ $title ?? 'Мой сайт' }}</title>
    <!-- Подключение стилей -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Подключение шрифтов Google (если хотите Roboto) -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-50 text-gray-900 min-h-screen font-sans flex flex-col">
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
                <li><a href="/reg" class="hover:underline">Регистрация</a></li>
                <li><a href="/login" class="hover:underline">Войти</a></li>
            </ul>
        </nav>
    </div>
</header>

<main class="flex-1">
    {{ $slot }}
</main>

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
</body>
</html>
