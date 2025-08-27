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
            <tr>
                <td>{{ $details['name'] }}</td>
                <td>{{ $details['quantity'] }}</td>
                <td>${{ $details['price'] }}</td>
                <td>${{ $details['price'] * $details['quantity'] }}</td>
                <td>
                    <a href="#" class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}">Remove</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <p>Your cart is empty.</p>
@endif
