<div class="py-1 bg-primary">
    <div class="container">
        <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
            <div class="col-lg-12 d-block">
                <div class="row d-flex">
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                        <span class="text">0123456789</span>
                    </div>
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                        <span class="text">nongsansachcantho1@gmail.com</span>
                    </div>
                    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                        <span class="text">3-5 Business days delivery &amp; Free Returns</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="/">NONGSANSACHCANTHO</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <form action="/users/search" class="form-inline" method="get">
                        <div class="form-group" style="padding: 18px 8px;">
                            <input class="form-control" name="key"  id="key" placeholder="Search by name..."
                                   style="width: 250px;
                               border-radius: 5px;
                               font-size: 15px">
                            &nbsp;
                            <button type="submit" class="btn btn-primary btn-xs" style="border-radius: 5px">
                                <i class="icon-search"></i> Search
                            </button>
                        </div>
                    </form>
                </li>
                <li class="nav-item"><a href="http://nongsancantho.test" class="nav-link">HOME</a></li>
                <li class="nav-item"><a href="{{ route('index.product') }}" class="nav-link">Product</a></li>
{{--                <li class="nav-item dropdown">--}}
{{--                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Product</a>--}}
{{--                    <div class="dropdown-menu" aria-labelledby="dropdown04">--}}
{{--                        <a class="dropdown-item" href="http://nongsancantho.test/user/product">Product</a>--}}
{{--                        <a class="dropdown-item" href="wishlist.html">Wishlist</a>--}}
{{--                        <a class="dropdown-item" href="http://nongsancantho.test/user/productDetail">Product Detail</a>--}}
{{--                        <a class="dropdown-item" href="http://nongsancantho.test/carts">Cart</a>--}}
{{--                        <a class="dropdown-item" href="checkout.html">Checkout</a>--}}

{{--                    </div>--}}

{{--                </li>--}}
{{--                <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>--}}
{{--                <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>--}}
{{--                <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>--}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="/users/product" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="icon-contacts"></span></a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <a href="/users/about" class="dropdown-item">About</a>
                        <a href="{{ route('contact') }}" class="dropdown-item">Contact</a>
                    </div>
                </li>

                <li class="nav-item cta cta-colored">
                    <a href="{{ route('cart.index') }}" class="nav-link">
                        <span class="icon-shopping_cart"></span>{{ $carts->sum('qty') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('order.history') }}" class="nav-link">
{{--                        <i class="icon-shopping-bag"></i>--}}
                        <span class="icon-shopping-bag"></span>
                    </a>
                </li>
{{--                MOI theem do --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="icon-user-circle"></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
{{--                        @if(\Illuminate\Support\Facades\Auth::check())--}}
                        @if(auth('cus')->check())
                            <a href="{{ route('user.profile') }}" class="dropdown-item">
                                {{auth('cus')->user()->name}}
                            </a>

                            <a href="/users/change_password" class="dropdown-item">
                                Change Password
                            </a>

                            <a href="/users/logout" class="dropdown-item">
                                Logout
                            </a>
                        @else
                            <a href="/users/login" class="dropdown-item">
                                Login
                            </a>
                        @endif
                    </div>
                </li>

            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->
