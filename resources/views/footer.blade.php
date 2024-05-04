<footer class="ftco-footer ftco-section">
    <div class="container">
        <div class="row">
            <div class="mouse">
                <a href="#" class="mouse-icon">
                    <div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
                </a>
            </div>
        </div>
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
                            <li><span class="icon icon-map-marker"></span><span class="text">3/2, Xuan Khanh, Ninh Kieu, Can Tho, Viet Nam</span></li>
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text">0123456789</span></a></li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span class="text">&nbsp;&nbsp;&nbsp;nongsansachcantho1@gmail.com</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </div>
</footer>



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


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
        heading: 'Notification',
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
            heading: 'Notification',
            text: "{{ Session::get('error') }}",
            showHideTransition: 'slide',
            icon: 'warning',
            position: 'top-center'
        })
        @endif
    </script>

    <script>
        $(function(e){
            $('#select_all_ids1').click(function (){
                $('.checkbox_ids1').prop('checked',$(this).prop('checked'));
            });

            $('#deleteAllSelectedRecord1').click(function (e){
                e.preventDefault();
                var all_ids1  = [];
                $('input:checkbox[name=ids1]:checked').each(function (){
                    all_ids1.push($(this).val());
                });

                $.ajax({
                    url:"{{ route('cart.delete') }}",
                    type:"DELETE",
                    data:{
                        ids1:all_ids1,
                        _token:'{{ csrf_token() }}'
                    },
                    success:function (response) {
                        $.each(all_ids,function (key,val){
                            $('#product_ids1'+val).remove();
                        });
                    }
                });
            });
        });
    </script>
