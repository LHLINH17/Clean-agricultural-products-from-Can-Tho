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
                <p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span> <span>Forgot Password</span></p>
                <h1 class="mb-0 bread">Forgot Password</h1>
            </div>
        </div>
    </div>
</div>

{{-- FORGOT_PASSWORD --}}
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 ftco-animate">
                <h3 class="mb-4 billing-heading">Get new your password</h3>
                <form action="" class="billing-form" method="post">
                    @csrf
                    <div class="row align-items-end">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" type="email" value="" class="form-control" placeholder="">
                                @error('email')
                                <div class="note-help-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary py-3 px-4">Send email</button>
                    </div>
                </form>
            </div>
            <!-- .col-md-8 -->
        </div>
    </div>
</section> <!-- .section -->
{{-- END FORGOT_PASSWORD --}}

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

