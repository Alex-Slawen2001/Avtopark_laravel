<x-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot:title>
    <h2>{{ $title }}</h2>
    <form method="POST" action="{{ route('auth') }}">
        @csrf
        <div>
            <label>Имя:</label>
            <input type="text" name="name" value="{{ old('name') }}">
            @error('name') <div>{{ $message }}</div> @enderror
        </div>
        <div>
            <label>Пароль:</label>
            <input type="password" name="password">
            @error('password') <div>{{ $message }}</div> @enderror
        </div>
        <button type="submit">Войти</button>
    </form>
</x-layout>
