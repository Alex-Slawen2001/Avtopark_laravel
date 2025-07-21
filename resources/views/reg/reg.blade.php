<x-layout xmlns:x-slot="http://www.w3.org/1999/xlink">
    <x-slot:title>{{ $title }}</x-slot:title>
    <h2>{{ $title }}</h2>
    <form method="POST" action="{{ route('reg') }}">
        @csrf
        <div>
            <label>Имя:</label>
            <input type="text" name="name" value="{{ old('name') }}">
            @error('name') <div>{{ $message }}</div> @enderror
        </div>
        <div>
            <label>Email:</label>
            <input type="email" name="email" value="{{ old('email') }}">
            @error('email') <div>{{ $message }}</div> @enderror
        </div>
        <div>
            <label>Пароль:</label>
            <input type="password" name="password">
            @error('password') <div>{{ $message }}</div> @enderror
        </div>
        <div>
            <label>Повторите пароль:</label>
            <input type="password" name="password_confirmation">
        </div>
        <button type="submit">Зарегистрироваться</button>
    </form>
</x-layout>
