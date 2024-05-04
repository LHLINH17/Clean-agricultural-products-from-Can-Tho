<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}}</title>
    @include('head')
    {{--    notification--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/template/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="/template/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    {{--    <link rel="stylesheet" href="/template/admin/dist/css/adminlte.min.css">--}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css"
          integrity="sha512-wJgJNTBBkLit7ymC6vvzM1EcSWeM9mmOu+1USHaRBbHkm6W9EgM0HY27+UtUaprntaYQJF75rc8gjxllKs5OIQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

</head>
@include('navigation')
<body class="hold-transition register-page">
<div class="register-box" style="margin: 30px 500px; width: 400px">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="#" class="h1"><b>Register Account</b></a>
        </div>
        <div class="card-body">
            <p class="login-box-msg" style="text-align: center">Register a new membership</p>
            {{--            Form đăng ký tài khoản--}}
            <form action="" method="post">
                @csrf
                {{--                @include('admin.alert')--}}
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Full name" name="name"
                           style="border-radius: 5px 0 0 5px; font-size: 15px">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    @error('name')
                    <div class="note-help-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Email" name="email"
                           style="border-radius: 5px 0 0 5px; font-size: 15px">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    @error('email')
                    <div class="note-help-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="password"
                           style="border-radius: 5px 0 0 5px; font-size: 15px">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    @error('password')
                    <div class="note-help-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Confirm password" name="confirm_password"
                           style="border-radius: 5px 0 0 5px; font-size: 15px">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    @error('confirm_password')
                    <div class="note-help-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <textarea class="form-control" placeholder="Address" name="address"
                              style="border-radius: 5px 0 0 5px; font-size: 15px"></textarea>
                </div>

                <div class="input-group mb-3">
                    @error('address')
                    <div class="note-help-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Number phone" name="phone"
                           style="border-radius: 5px 0 0 5px; font-size: 15px">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-phone"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    @error('phone')
                    <div class="note-help-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="agreeTerms" name="terms" value="yes">
                            <label for="agreeTerms">
                                I agree to the <a href="#">terms</a>
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block" name="submit">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <a href="/users/login" class="text-center">I already have a membership</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->
{{--<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">--}}
{{--    <div class="container py-4">--}}
{{--        <div class="row d-flex justify-content-center py-5">--}}
{{--            <div class="col-md-6">--}}
{{--                <h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>--}}
{{--                <span>Get e-mail updates about our latest shops and special offers</span>--}}
{{--            </div>--}}
{{--            <div class="col-md-6 d-flex align-items-center">--}}
{{--                <form action="#" class="subscribe-form">--}}
{{--                    <div class="form-group d-flex">--}}
{{--                        <input type="text" class="form-control" placeholder="Enter email address">--}}
{{--                        <input type="submit" value="Subscribe" class="submit px-3">--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
<footer class="ftco-footer ftco-section">
    <div class="container">
        {{--        <div class="row">--}}
        {{--            <div class="mouse">--}}
        {{--                <a href="#" class="mouse-icon">--}}
        {{--                    <div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>--}}
        {{--                </a>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Nongsancantho</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">Menu</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="py-2 d-block">Shop</a></li>
                        <li><a href="#" class="py-2 d-block">About</a></li>
                        <li><a href="#" class="py-2 d-block">Journal</a></li>
                        <li><a href="#" class="py-2 d-block">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Help</h2>
                    <div class="d-flex">
                        <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                            <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
                            <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
                            <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
                            <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
                        </ul>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">FAQs</a></li>
                            <li><a href="#" class="py-2 d-block">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Have a Questions?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">3/2, Xuan Khanh, Ninh Kieu, Can Tho, Viet Nam</span>
                            </li>
                            <li><a href="#"><span class="icon icon-phone"></span><span
                                            class="text">0123456789</span></a></li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span class="text"> nongsansachcantho1@gmail.com</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                    All rights reserved
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </div>
</footer>


<!-- loader -->
<div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00"/>
    </svg>
</div>


<script src="/template/vegefoods-master/js/jquery.min.js"></script>
<script src="/template/vegefoods-master/js/jquery-migrate-3.0.1.min.js"></script>
<script src="/template/vegefoods-master/js/popper.min.js"></script>
<script src="/template/vegefoods-master/js/bootstrap.min.js"></script>
<script src="/template/vegefoods-master/js/jquery.easing.1.3.js"></script>
<script src="/template/vegefoods-master/js/jquery.waypoints.min.js"></script>
<script src="/template/vegefoods-master/js/jquery.stellar.min.js"></script>
<script src="/template/vegefoods-master/js/owl.carousel.min.js"></script>
<script src="/template/vegefoods-master/js/jquery.magnific-popup.min.js"></script>
<script src="/template/vegefoods-master/js/aos.js"></script>
<script src="/template/vegefoods-master/js/jquery.animateNumber.min.js"></script>
<script src="/template/vegefoods-master/js/bootstrap-datepicker.js"></script>
<script src="/template/vegefoods-master/js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="/template/vegefoods-master/js/google-map.js"></script>
<script src="/template/vegefoods-master/js/main.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>

@if (Session::has('success'))
    <script>
        $.toast({
            heading: 'Thông báo',
            text: "{{ Session::get('success') }}",
            showHideTransition: 'slide',
            icon: 'success',
            position: 'top-center'
        })
        @endif
    </script>

    @if (Session::has('error'))
        <script>
            $.toast({
                heading: 'Thông báo',
                text: "{{ Session::get('error') }}",
                showHideTransition: 'slide',
                icon: 'warning',
                position: 'top-center'
            })
            @endif
        </script>
</body>
</html>
