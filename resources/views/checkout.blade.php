<x-layouts.app>
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow">
        <h2 class="text-2xl font-bold mb-4">Checkout</h2>

        <form method="POST" action="{{ route('checkout.process') }}">
            @csrf
            <div class="mb-4">
                <label class="block font-semibold">Shipping Address</label>
                <input type="text" name="shipping_address" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block font-semibold">Billing Address</label>
                <input type="text" name="billing_address" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block font-semibold">Payment Method</label>
                <select name="payment_method" class="w-full border rounded p-2" required>
                    <option value="card">Card</option>
                    <option value="paypal">PayPal</option>
                </select>
            </div>

            <button type="submit" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700 transition">Place Order</button>
        </form>
    </div>
</x-layouts.app>
