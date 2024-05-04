<div>
    <h3> Hi {{ $order->customer->name }}</h3>

    <h4>Your order detail </h4>

    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>STT</th>
            <th>Product name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Sub total</th>
        </tr>
        <?php $total = 0; ?>
        @foreach($order->details as $detail)
            <tr>
                <th>{{ $loop->index+1 }}</th>
                <th>{{ $detail->product->name }}</th>
                <th>{{ $detail->price }}</th>
                <th>{{ $detail->quantity }}</th>
                <th>{{ number_format($detail->price * $detail->quantity, 0, '', '.') }} VND</th>
            </tr>
                <?php $total += $detail->price * $detail->quantity; ?>
        @endforeach
            <tr>
                <th colspan="4">Total price</th>
                <th>{{ number_format($total, 0, '', '.') }} VND </th>
            </tr>
    </table>

    <p>
        <a href="{{ route('order.verify', $token) }}" style="display: inline-block; padding: 7px 25px; color: #fff;background: darkblue">Click here to verify order</a>
    </p>
</div>
