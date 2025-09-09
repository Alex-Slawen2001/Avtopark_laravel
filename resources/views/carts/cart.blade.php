@if(session('cart'))

    <table class="table">
        <thead>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Make year</th>
        </tr>
        </thead>
        <tbody>
        @foreach(session('cart') as $id => $details)
            <tr id="row-{{ $id }}">
                <!-- Проверка и вывод данных для первого типа элемента -->
                @if(isset($details['model']) || isset($details['quantity']) || isset($details['price']))
                    <td>{{ $details['model'] ?? 'N/A' }}</td>
                    <td>
                        <form action="{{ route('update.cart') }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="id" value="{{ $id }}">
                            <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1" required>
                            <button type="submit">Update</button>
                        </form>
                    </td>

                    <!-- Проверка и вывод данных для второго типа элемента -->
                @elseif(isset($details['make_year']) || isset($etails['id']) || isset($details['make_year']))
                    <td>{{ $details['make_year'] }}</td>
                    <td>
                        <form action="{{ route('update.cart') }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="id" value="{{ $id }}">
                            <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1" required>
                            <button type="submit">Update</button>
                        </form>
                    </td>
                    <td>{{ $details['id'] }}</td>
                @else
                    <td colspan="3">Invalid item in cart.</td>
                @endif

                <td>
                    <form action="{{ route('remove.from.cart') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{ $id }}">
                        <button type="submit">Remove</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@else
    <p>Your cart is empty.</p>
@endif


