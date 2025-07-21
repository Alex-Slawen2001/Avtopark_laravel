<x-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot:title>
<main class="py-8">
    <div class="container mx-auto px-4">
        <!-- Приветственная секция -->
        <section class="text-center mb-8">
            <h1 class="text-4xl font-bold mb-4">{{ $text }}</h1>
            <p class="text-lg">Мы предлагаем лучшие услуги для вашего комфорта.</p>
        </section>
        <!-- Секция с карточками -->
        <section class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Карточка 1 -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-bold mb-2">Услуга 1</h2>
                <p>Описание услуги 1. Мы делаем всё качественно и быстро.</p>
            </div>
            <!-- Карточка 2 -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-bold mb-2">Услуга 2</h2>
                <p>Описание услуги 2. Индивидуальный подход к каждому клиенту.</p>
            </div>
            <!-- Карточка 3 -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-bold mb-2">Услуга 3</h2>
                <p>Описание услуги 3. Гарантия качества и надёжности.</p>
            </div>
        </section>
        <!-- Секция с призывом к действию -->
        <section class="mt-8 bg-blue-50 p-8 rounded-lg text-center">
            <h2 class="text-3xl font-bold mb-4">Готовы начать?</h2>
            <p class="mb-6">Свяжитесь с нами прямо сейчас для получения консультации.</p>
            <a href="/contact" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors">Связаться</a>
        </section>
    </div>
</main>
</x-layout>
