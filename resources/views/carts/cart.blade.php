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
            <tr id="row-{{ $id }}">
                <!-- Проверка и вывод данных для первого типа элемента -->
                @if(isset($details['name']) || isset($details['quantity']) || isset($details['price']))
                    <td>{{ $details['name'] ?? 'N/A' }}</td>
                    <td>
                        <input type="number" id="quantity-{{ $id }}" value="{{ $details['quantity'] }}" min="1" required>
                        <button onclick="updateCart('{{ $id }}', document.getElementById('quantity-{{ $id }}').value)">Update</button>
                    </td>
                    <td>${{ $details['price'] ?? 'N/A' }}</td>

                    <!-- Проверка и вывод данных для второго типа элемента -->
                @elseif(isset($details['make_year']) || isset($etails['id']) || isset($details['model']))
                    <td>{{ $details['model'] }}</td>
                    <td>
                        <input type="number" id="quantity-{{ $id }}" value="{{ $details['quantity'] ?? 1 }}" min="1" required>
                        <button onclick="updateCart('{{ $id }}', document.getElementById('quantity-{{ $id }}').value)">Update</button>
                    </td>
                    <td>{{ $details['id'] }}</td>
                @else
                    <td colspan="3">Invalid item in cart.</td>
                @endif

                <td>
                    <button onclick="removeFromCart('{{ $id }}')">Remove</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@else
    <p>Your cart is empty.</p>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function () {
        function updateCart(id, quantity) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            console.log(`Updating cart: id=${id}, quantity=${quantity}`);
            fetch('/update-cart', {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ id, quantity })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Cart updated successfully');
                        window.location.reload();
                    }
                })
                .catch(error => console.error('Error:', error));
        }
        function removeFromCart(id) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            console.log(`Removing from cart: id=${id}`);
            fetch('/remove-from-cart', {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ id })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Product removed successfully');
                        window.location.reload();
                    }
                })
                .catch(error => console.error('Error:', error));
        }
        // Добавьте обработчики событий для кнопок, если они не добавлены в HTML
        document.querySelectorAll('.update-cart-btn').forEach(button => {
            button.addEventListener('click', function () {
                const id = this.dataset.id;
                const quantity = document.getElementById(`quantity-${id}`).value;
                updateCart(id, quantity);
            });
        });
        document.querySelectorAll('.remove-from-cart-btn').forEach(button => {
            button.addEventListener('click', function () {
                const id = this.dataset.id;
                removeFromCart(id);
            });
        });
    });
</script>
