<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <h2>{{ $title }}</h2>
    <form action="{{ route('add.to.cart') }}" method="POST">
        @csrf
        <label for="id_serve">Enter id-serve:</label>
        <input type="text" id="id_serve" name="id_serve" required><br>
        @error('id_serve') <div>{{ $message }}</div> @enderror
        <button type="submit">Добавить</button>
    </form>
</x-layout>
