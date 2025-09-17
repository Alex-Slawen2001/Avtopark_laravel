<x-layout xmlns:x-slot="http://www.w3.org/1999/xlink">
    <x-slot:title>{{ $title }}</x-slot:title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        #card-element {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        #pay-btn {
            background-color: #6772e5;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        #pay-btn:disabled {
            background-color: #aaa;
            cursor: not-allowed;
        }
        #result {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
    <h2>{{ $title }}</h2>
    <form id="payment-form">
        <div class="form-group">
            <label for="amount">Сумма (USD):</label>
            <input type="number" id="amount" min="1" value="10" required>
        </div>
        <div class="form-group">
            <label>Данные карты:</label>
            <div id="card-element"><!-- Stripe Elements --></div>
        </div>
        <button type="submit" id="pay-btn">Оплатить</button>
        <div id="result"></div>
    </form>
    <script>
        const stripe = Stripe('{{ config('services.stripe.key') }}');
        const elements = stripe.elements();
        const card = elements.create('card');
        card.mount('#card-element');
        const form = document.getElementById('payment-form');
        const payBtn = document.getElementById('pay-btn');
        const resultDiv = document.getElementById('result');
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            payBtn.disabled = true;
            fetch('{{ route('pay_process') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    amount: document.getElementById('amount').value
                })
            }).then(r => r.json()).then(data => {
                if (data.error) {
                    throw new Error(data.error);
                }
                return stripe.confirmCardPayment(data.clientSecret, {
                    payment_method: {
                        card: card
                    }
                });
            }).then(paymentResult => {
                if (paymentResult.error) {
                    throw new Error(paymentResult.error.message);
                }
                resultDiv.innerText = 'Платеж успешно завершен!';
            }).catch(error => {
                resultDiv.innerText = 'Ошибка: ' + error.message;
            }).finally(() => {
                payBtn.disabled = false;
            });
        });
    </script>
</x-layout>
