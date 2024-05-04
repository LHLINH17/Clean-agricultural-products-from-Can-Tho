{{--ke thua file main--}}
@extends('admin.main')
@section('header')
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
@endsection
{{--Tao 1 key "content' de main doc duoc content--}}
@section('content')

<section class="ftco-section ftco-cart">
    <form method="get">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        @if($order->status != 2 && $order->status != 0)
                            @if($order->status != 3)
                                <a class="btn btn-sm btn-success" href="{{ route('order.update', $order->id) }}?status=2"
                                   onclick="return confirm('Are you sure you want to confirm the delivery?')">
                                    Delivered
                                </a>
                                <a class="btn btn-sm btn-danger" href="{{ route('order.update', $order->id) }}?status=3"
                                onclick="return confirm('Are you sure you want to confirm order cancellation?')">
                                    Canceled
                                </a>
                            @else
                                <a class="btn btn-sm btn-warning" href="{{ route('order.update', $order->id) }}?status=1"
                                   onclick="return confirm('Are you sure you want to confirm order restoration?')">
                                    Restored
                                </a>
                            @endif
                        @endif
                        <h3>Customer information</h3>
                        <table class="col-md-6">
                            <thead>
                                <tr>
                                    <th>
                                        Name:
                                    </th>
                                    <td>
                                        {{ $auth->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Phone:
                                    </th>
                                    <td>
                                        {{ $auth->phone }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Address:
                                    </th>
                                    <td>
                                        {{ $auth->address }}
                                    </td>
                                </tr>
                            </thead>
                        </table>


                        <h3>Shipping information</h3>
                        <table class="col-md-6">
                            <thead>
                            <tr>
                                <th>
                                    Name:
                                </th>
                                <td>
                                    {{ $order->name }}
                                </td>
                            </tr>
                            <tr>
                                <th>Phone:
                                </th>
                                <td>
                                    {{ $order->phone }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Shipping Address
                                </th>
                                <td>
                                    {{ $order->address }}
                                </td>
                            </tr>
                            </thead>
                        </table>

                        <h3>Product Information</h3>
                        <table class="table">
                            <thead class="thead-primary">
                            <tr class="text-center">
                                <th>STT</th>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Product quantity</th>
                                <th>Product price</th>
                                <th>Sub total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if (is_array($order) || is_object($order))
                                @foreach($order->details as $item)
                                    <tr class="text-center">

                                        <td scope="row">{{ $loop->index +1 }} </td>

{{--                                        <td class="image-prod"><div class="img" style="background-image:url('{{ $item->product->thumb }}');"></div></td>--}}
                                        <td> <img src="{{ $item->product->thumb }}" width="100px"></td>

                                        <td>{{ $item->product->name }}</td>

                                        <td>{{ $item->quantity }}</td>

                                        <td>
                                            {{ number_format($item->price, 0, '', '.') }} VND
                                        </td>

                                        <td>
                                            {{ number_format($item->price * $item->quantity, 0, '', '.') }} VND
                                        </td>

                                    </tr><!-- END TR-->
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>

@endsection

@section('footer')
    <script>
        ClassicEditor
            .create( document.querySelector( '#content' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection


