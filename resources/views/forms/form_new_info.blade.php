<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <h2>{{ $title }}</h2>
    <form action="{{ route('addInfo') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>
        @error('name') <div>{{ $message }}</div> @enderror

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        @error('email') <div>{{ $message }}</div> @enderror

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        @error('password') <div>{{ $message }}</div> @enderror
        <label>Повторите пароль:</label>
        <input type="password" name="password_confirmation"><br>
        <label for="model">Model:</label>
        <input type="text" id="model" name="model" required><br>
        @error('model') <div>{{ $message }}</div> @enderror
        <label for="make_year">Make Year:</label>
        <input type="number" id="make_year" name="make_year" min="1900" max="2100" required><br>
        @error('make_year') <div>{{ $message }}</div> @enderror
        <button type="submit">Добавить</button>
    </form>
</x-layout>
