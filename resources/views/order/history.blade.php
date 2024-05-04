<!DOCTYPE html>
<html lang="en">
<head>
    @include('head')
</head>
<body class="goto-here">

@include('navigation')


<div class="hero-wrap hero-bread" style="background-image: url('/template/vegefoods-master/images/bg_1.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span> <span>Order History</span></p>
                <h1 class="mb-0 bread">Order History</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-cart">
    <form method="get">
        {{--    @if(count($carts))--}}
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                            <tr class="text-center">
                                <th>STT</th>
                                <th>Order Date</th>
                                <th>Status</th>
                                <th>Total Price</th>
                                <th>&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if (is_array($auth) || is_object($auth))
                                @foreach($auth->orders as $item)
                                    {{--                                    @php--}}
                                    {{--                                        $gia = $item->price * $item->qty;--}}
                                    {{--                                    @endphp--}}
                                    <tr class="text-center">

                                        <td scope="row">{{ $loop->index +1 }} </td>

                                        <td>
                                            {{ $item->created_at->format('d/m/Y') }}
                                        </td>

                                        <td>
                                            @if($item->status == 0)
                                                <span>Order not confirmed</span>
                                            @elseif($item->status == 1)
                                                <span>Confirmed</span>
                                            @elseif($item->status == 2)
                                                <span>Paid</span>
                                            @endif
                                        </td>

                                        <td>
                                            {{ number_format($item->totalPrice, 0, '', '.') }} VND
                                        </td>

                                        <td>
                                            <a class="btn btn-sm btn-primary"
                                               href="{{ route('order.detail', $item->id) }}">Detail</a>
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


<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
    <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
            <div class="col-md-6">
                <h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
                <span>Get e-mail updates about our latest shops and special offers</span>
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <form action="#" class="subscribe-form">
                    <div class="form-group d-flex">
                        <input type="text" class="form-control" placeholder="Enter email address">
                        <input type="submit" value="Subscribe" class="submit px-3">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@include('footer')
</body>
</html>

