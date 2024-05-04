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
                <p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span> <span>Cart</span></p>
                <h1 class="mb-0 bread">My Cart</h1>
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
                        {{--                    @php $total = 0; @endphp--}}
                        <table class="table">
                            <thead class="thead-primary">
                            <tr class="text-center">
                                <th><input type="checkbox" name="" id="select_all_ids1"></th>
                                <th>No</th>
                                <th>Product name</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>&nbsp;</th>
                                {{--                            <th>Total</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            {{--                        @foreach($products as $key => $product)--}}
                            {{--                            @php--}}
                            {{--                                $price = $product->price_sale != 0 ? $product->price_sale : $product->price;--}}
                            {{--                                $priceEnd = $price * $carts[$product->id];--}}
                            {{--                                $total += $priceEnd;--}}
                            {{--                            @endphp--}}
                            {{--                        <tr class="text-center">--}}
                            {{--                            <td class="product-remove"><a href="/carts/delete/{{ $product->id }}"><span class="ion-ios-close"></span></a></td>--}}

                            {{--                            <td class="image-prod"><div class="img" style="background-image:url('{{ $product->thumb }}');"></div></td>--}}

                            {{--                            <td class="product-name">--}}
                            {{--                                <h3>{{ $product->name }}</h3>--}}
                            {{--                                <p>{{ $product->description }}</p>--}}
                            {{--                            </td>--}}

                            {{--                            <td class="price">{{ number_format($price, 0, '', '.') }} VND</td>--}}

                            {{--                            <td class="quantity">--}}
                            {{--                                <div class="input-group mb-3">--}}
                            {{--                                    <input type="number" name="quantity[{{ $product->id }}]"--}}
                            {{--                                           class="quantity form-control input-number" value="{{ $carts[$product->id] }}" min="1" max="100">--}}
                            {{--                                </div>--}}
                            {{--                            </td>--}}

                            {{--                            <td class="total">{{ number_format($priceEnd, 0, '', '.') }} VND</td>--}}
                            {{--                        </tr><!-- END TR-->--}}
                            {{--                        @endforeach--}}
                            @if (is_array($carts) || is_object($carts))

                                @foreach($carts as $item)
                                    @php
                                        $gia = $item->price * $item->qty;
                                    @endphp
                                    <tr class="text-center" id="product_ids1{{$item->id}}">

                                        <td><input type="checkbox" name="ids1" class="checkbox_ids1"
                                                   value="{{$item->id}}"></td>

                                        <td scope="row">{{ $loop->index +1 }} </td>

                                        <td class="product-name">
                                            <h3>{{ $item->prod->name }}</h3>
                                            {{--                                                                            <p>{{ $product->description }}</p>--}}
                                        </td>

                                        <td class="image-prod">
                                            <div class="img"
                                                 style="background-image:url('{{ $item->prod->thumb }}');"></div>
                                        </td>

                                        <td class="price">{{ number_format($item->price, 0, '', '.') }} VND</td>

                                        <td class="quantity">
                                            <form action="{{ route('cart.update', $item->product_id)  }} " method="get">
                                                <div class="input-group mb-3">
                                                    <input type="number" name="qty"
                                                           class="quantity form-control input-number"
                                                           value="{{  $item->qty }}" min="1" max="100">
{{--                                                    <button><i class="ion-ios-save"></i></button>--}}
                                                    <button type="submit" class="btn btn-sm" style="width: 40px; text-align: center; color: black">
                                                        <i class="icon-save"></i>
                                                        Save
                                                    </button>
                                                </div>
                                            </form>
                                        </td>
                                        <td class="price">{{ number_format($gia, 0, '', '.') }} VND</td>
                                        <td class="product-remove"><a title="Remove product from cart"
                                                                      onclick="return confirm('Are you sure you want to remove this item ?')"
                                                                      href="/carts/delete/{{ $item->product_id }}"><span
                                                        class="ion-ios-trash"></span></a></td>
                                        {{--                                    <td class="total">{{ number_format($priceEnd, 0, '', '.') }} VND</td>--}}
                                    </tr><!-- END TR-->
                                @endforeach
                            @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center p-3">
                @if($carts->count())
                    <p><a href="/" class="btn btn-primary py-3 px-4">Continue Shopping</a></p>
                    &nbsp
                    <p><a onclick="return confirm('Do you want to remove all items from your cart?')"
                          href="{{ route('cart.clear') }}" class="btn btn-primary py-3 px-4">Clear Shopping</a></p>
                    &nbsp
                    <p><a href="{{ route('order.checkout') }}" class="btn btn-primary py-3 px-4">Place Order</a></p>
                    &nbsp
                    <form>
                        <p><a href="{{ route('cart.delete') }}" class="btn btn-danger py-3 px-4"
                              id="deleteAllSelectedRecord1"><i class="fa fa-trash"></i> Delete All Selected</a></p>
                    </form>
                @else
                    <p><a href="/" class="btn btn-primary py-3 px-4">Continue Shopping</a></p>
                    {{--                <div class="text-center"><h2>Giỏ hàng trống</h2></div>--}}
                @endif
            </div>


            <div class="row justify-content-center p-3">
                {{--            <input type="submit" value="Update Cart" formaction="{{ route('cart.update', $item->product_id) }}"--}}
                {{--                   class="btn btn-primary py-3 px-4">--}}
                {{--            <input type="submit" value="clear Cart" formaction="{{ route('cart.update', $item->product_id) }}"--}}
                {{--                   class="btn btn-primary py-3 px-4">--}}
                {{--            @csrf--}}
            </div>

            <div class="row justify-content-start">
                {{--            row justify-content-end -> row justify-content-start--}}

                {{--Start MA GIAM GIA - Coupon code --}}
                {{--            <div class="col-lg-4 mt-5 cart-wrap ftco-animate">--}}
                {{--                <div class="cart-total mb-3">--}}
                {{--                    <h3>Coupon Code</h3>--}}
                {{--                    <p>Enter your coupon code if you have one</p>--}}
                {{--                    <form action="#" class="info">--}}
                {{--                        <div class="form-group">--}}
                {{--                            <label for="">Coupon code</label>--}}
                {{--                            <input type="text" class="form-control text-left px-3" placeholder="">--}}
                {{--                        </div>--}}
                {{--                    </form>--}}
                {{--                </div>--}}
                {{--                <p><a href="checkout.html" class="btn btn-primary py-3 px-4">Apply Coupon</a></p>--}}
                {{--            </div>--}}
                {{--End MA GIAM GIA - Coupon code --}}

                {{--Start  - Estimate --}}
                {{--            <div class="col-lg-4 mt-5 cart-wrap ftco-animate">--}}
                {{--                <div class="cart-total mb-3">--}}
                {{--                    <h3>Estimate shipping and tax</h3>--}}
                {{--                    <p>Enter your destination to get a shipping estimate</p>--}}
                {{--                    <form action="#" class="info">--}}
                {{--                        <div class="form-group">--}}
                {{--                            <label for="">Country</label>--}}
                {{--                            <input type="text" class="form-control text-left px-3" placeholder="">--}}
                {{--                        </div>--}}
                {{--                        <div class="form-group">--}}
                {{--                            <label for="country">State/Province</label>--}}
                {{--                            <input type="text" class="form-control text-left px-3" placeholder="">--}}
                {{--                        </div>--}}
                {{--                        <div class="form-group">--}}
                {{--                            <label for="country">Zip/Postal Code</label>--}}
                {{--                            <input type="text" class="form-control text-left px-3" placeholder="">--}}
                {{--                        </div>--}}
                {{--                    </form>--}}
                {{--                </div>--}}
                {{--                <p><a href="checkout.html" class="btn btn-primary py-3 px-4">Estimate</a></p>--}}
                {{--            </div>--}}
                {{--End  - Estimate --}}

                {{-- Start total--}}
                {{--            <div class="col-lg-4 mt-5 cart-wrap ftco-animate">--}}
                {{--                <div class="cart-total mb-3">--}}
                {{--                    <h3>Cart Totals</h3>--}}
                {{--                    <p class="d-flex">--}}
                {{--                        <span>Subtotal</span>--}}
                {{--                        <span>$20.60</span>--}}
                {{--                    </p>--}}
                {{--                    <p class="d-flex">--}}
                {{--                        <span>Delivery</span>--}}
                {{--                        <span>$0.00</span>--}}
                {{--                    </p>--}}
                {{--                    <p class="d-flex">--}}
                {{--                        <span>Discount</span>--}}
                {{--                        <span>$3.00</span>--}}
                {{--                    </p>--}}
                {{--                    <hr>--}}
                {{--                    <p class="d-flex total-price">--}}
                {{--                        <span>Total</span>--}}
                {{--                        <span>{{ number_format($total, 0, '', '.') }} VND</span>--}}
                {{--                    </p>--}}
                {{--                </div>--}}
                {{--                <p><a href="checkout.html" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>--}}
                {{--            </div>--}}
                {{--End total--}}
            </div>
        </div>
        {{--Start Thanh Toan --}}
        {{--            <section class="ftco-section">--}}
        {{--                <div class="container">--}}
        {{--                    <div class="row justify-content-center">--}}
        {{--                        <div class="col-xl-7 ftco-animate">--}}
        {{--                            <form action="#" class="billing-form">--}}
        {{--                                <h3 class="mb-4 billing-heading">Chi tiết đơn hàng </h3>--}}
        {{--                                <div class="row align-items-end">--}}
        {{--                                    <div class="col-md-12">--}}
        {{--                                        <div class="form-group">--}}
        {{--                                            <label for="lastname">Tên </label>--}}
        {{--                                            <input type="text" class="form-control" placeholder="">--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                    <div class="w-100"></div>--}}
        {{--                                    <div class="col-md-12">--}}
        {{--                                        <div class="form-group">--}}
        {{--                                            <label for="streetaddress">Địa chỉ đặt hàng</label>--}}
        {{--                                            <input type="text" class="form-control" placeholder="">--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                    <div class="w-100"></div>--}}
        {{--                                    <div class="col-md-12">--}}
        {{--                                        <div class="form-group">--}}
        {{--                                            <label for="phone">Số điện thoại</label>--}}
        {{--                                            <input type="text" class="form-control" placeholder="">--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                    <div class="col-md-12">--}}
        {{--                                        <div class="form-group">--}}
        {{--                                            <label for="emailaddress">Địa chỉ Email</label>--}}
        {{--                                            <input type="text" class="form-control" placeholder="">--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                    <div class="w-100"></div>--}}
        {{--                                    <div class="col-md-12">--}}
        {{--                                        <div class="form-group mt-4">--}}
        {{--                                            <div class="radio">--}}
        {{--                                                <label class="mr-3"><input type="radio" name="optradio"> Create an Account? </label>--}}
        {{--                                                <label><input type="radio" name="optradio"> Ship to different address</label>--}}
        {{--                                            </div>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                            </form>--}}
        {{--                            <!-- END -->--}}
        {{--                        </div>--}}
        {{--                        <div class="col-xl-5">--}}
        {{--                            <div class="row mt-5 pt-3">--}}
        {{--                                <div class="col-md-12 d-flex mb-5">--}}
        {{--                                    <div class="cart-detail cart-total p-3 p-md-4">--}}
        {{--                                        <h3 class="billing-heading mb-4">Cart Total</h3>--}}
        {{--                                        <p class="d-flex">--}}
        {{--                                            <span>Subtotal</span>--}}
        {{--                                            <span>$20.60</span>--}}
        {{--                                        </p>--}}
        {{--                                        <p class="d-flex">--}}
        {{--                                            <span>Delivery</span>--}}
        {{--                                            <span>$0.00</span>--}}
        {{--                                        </p>--}}
        {{--                                        <p class="d-flex">--}}
        {{--                                            <span>Discount</span>--}}
        {{--                                            <span>$3.00</span>--}}
        {{--                                        </p>--}}
        {{--                                        <hr>--}}
        {{--                                        <p class="d-flex total-price">--}}
        {{--                                            <span>Total</span>--}}
        {{--                                            <span>{{ number_format($total, 0, '', '.') }} VND</span>--}}
        {{--                                        </p>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                                <div class="col-md-12">--}}
        {{--                                    <div class="cart-detail p-3 p-md-4">--}}
        {{--                                        <h3 class="billing-heading mb-4">Payment Method</h3>--}}
        {{--                                        <div class="form-group">--}}
        {{--                                            <div class="col-md-12">--}}
        {{--                                                <div class="radio">--}}
        {{--                                                    <label><input type="radio" name="optradio" class="mr-2"> Direct Bank Tranfer</label>--}}
        {{--                                                </div>--}}
        {{--                                            </div>--}}
        {{--                                        </div>--}}
        {{--                                        <div class="form-group">--}}
        {{--                                            <div class="col-md-12">--}}
        {{--                                                <div class="radio">--}}
        {{--                                                    <label><input type="radio" name="optradio" class="mr-2"> Check Payment</label>--}}
        {{--                                                </div>--}}
        {{--                                            </div>--}}
        {{--                                        </div>--}}
        {{--                                        <div class="form-group">--}}
        {{--                                            <div class="col-md-12">--}}
        {{--                                                <div class="radio">--}}
        {{--                                                    <label><input type="radio" name="optradio" class="mr-2"> Paypal</label>--}}
        {{--                                                </div>--}}
        {{--                                            </div>--}}
        {{--                                        </div>--}}
        {{--                                        <div class="form-group">--}}
        {{--                                            <div class="col-md-12">--}}
        {{--                                                <div class="checkbox">--}}
        {{--                                                    <label><input type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label>--}}
        {{--                                                </div>--}}
        {{--                                            </div>--}}
        {{--                                        </div>--}}
        {{--                                        <p><a href="#"class="btn btn-primary py-3 px-4">Place an order</a></p>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div> <!-- .col-md-8 -->--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </section>--}}
        {{--End Thanh toan--}}
        {{--    @else--}}
        {{--           --}}
        {{--        <div class="text-center"><h2>Giỏ hàng trống</h2></div>--}}
        {{--    @endif--}}

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
