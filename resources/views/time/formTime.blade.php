<x-layout xmlns:x-slot="http://www.w3.org/1999/xlink">
    <x-slot:title>{{ $title }}</x-slot:title>
    <h2>{{ $title }}</h2>
    <form method="POST" action="{{ route('time') }}">
        @csrf
        <div>
            <label>Время</label>
            <input type="text" name="time" value="{{ old('name') }}">
            @error('name') <div>{{ $message }}</div> @enderror
        </div>
        <button type="submit">Отправить</button>
    </form>
</x-layout>
