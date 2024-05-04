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
                <p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span> <span>Order Detail</span></p>
                <h1 class="mb-0 bread">Order Detail</h1>
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
                                    Shipping Address:
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

                                        <td class="image-prod">
                                            <div class="img"
                                                 style="background-image:url('{{ $item->product->thumb }}');"></div>
                                        </td>

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

