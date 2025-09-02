@if(session('cart'))
    <table class="table">
        <thead>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach(session('cart') as $id => $details)

            @if(session('cart'))
                @foreach(session('cart') as $id => $details)
                    <tr>
                        <!-- Проверка и вывод данных для первого типа элемента -->
                        @if(isset($details['name']) || isset($details['quantity']) || isset($details['price']))
                            <td>{{ $details['name'] ?? 'N/A' }}</td>
                            <td>{{ $details['quantity'] }}</td>
                            <td>${{ $details['price'] ?? 'N/A' }}</td>
                            <!-- Проверка и вывод данных для второго типа элемента -->
                        @elseif(isset($details['make_year']) || isset($etails['id']) || isset($details['model']))
                            <td>{{ $details['model'] }}</td>
                            <td>{{ $details['make_year'] }}</td>
                            <td>{{ $details['id'] }}</td>
                        @else
                            <td colspan="3">Invalid item in cart.</td>
                        @endif
                        <td>
                            <a href="#" class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}">Remove</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4">Your cart is empty.</td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
@else
    <p>Your cart is empty.</p>
@endif
