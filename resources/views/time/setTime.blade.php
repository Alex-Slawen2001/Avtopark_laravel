<x-layout xmlns:x-slot="http://www.w3.org/1999/xlink">
    <x-slot:title>{{ $title }}</x-slot:title>
    <h2>{{ $title }}</h2>
    <form method="POST" action="{{ route('setTime') }}">
        @csrf
        <div>
            <label>Время</label>
            <input type="text" name="time" value="{{ old('name') }}">
            @error('time') <div>{{ $message }}</div> @enderror
        </div>
        <div>
            <label>Модель</label>
            <input type="text" name="model" value="{{ old('name') }}">
            @error('model') <div>{{ $message }}</div> @enderror
        </div>
        <button type="submit">Отправить</button>
    </form>
</x-layout>
