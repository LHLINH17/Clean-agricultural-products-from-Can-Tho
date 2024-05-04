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
                <p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span> <span>Checkout</span></p>
                <h1 class="mb-0 bread">Checkout</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="cart-list">
                    <table class="table">
                        <thead class="thead-primary">
                        <tr class="text-center">
                            <th>STT</th>
                            <th>Product name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Quantity</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (is_array($carts) || is_object($carts))
                            @foreach($carts as $item)
                                <tr class="text-center">
                                    <td scope="row">{{ $loop->index +1 }} </td>
                                    <td class="product-name"><h3>{{ $item->prod->name }}</h3></td>
                                    <td class="image-prod">
                                        <div class="img"
                                             style="background-image:url('{{ $item->prod->thumb }}');"></div>
                                    </td>
                                    <td class="price">{{ number_format($item->price, 0, '', '.') }} VND</td>
                                    <td class="quantity"> {{  $item->qty }} </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- THANH TOAN --}}
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 ftco-animate">
                <h3 class="mb-4 billing-heading">Billing Details</h3>
                <form action="" class="billing-form" method="post">
                    @csrf
                    <div class="row align-items-end">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Name</label>
                                <input name="name" type="text" value=" {{ $auth->name }}" class="form-control"
                                       placeholder="">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" type="email" value=" {{ $auth->email }}" class="form-control"
                                       placeholder="">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Phone</label>
                                <input name="phone" type="text" value=" {{ $auth->phone }}" class="form-control"
                                       placeholder="">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Address</label>
                                <input name="address" type="text" value=" {{ $auth->address }}" class="form-control"
                                       placeholder="">
                            </div>
                        </div>


                    </div>
                    <button type="submit" class="btn btn-primary py-3 px-4">Cash on delivery</button>
                </form>

                <form action="{{ route('order.vnpay') }}" method="post">
                    @csrf
                    <button name="redirect" type="submit" class="btn btn-primary py-3 px-4"><img src="/template/img/vn pay.png" width="40px" height="40px"></button>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- .section -->
{{-- HET THANH TOAN --}}

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
