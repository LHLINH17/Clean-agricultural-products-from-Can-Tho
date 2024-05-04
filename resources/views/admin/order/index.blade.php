{{--ke thua file main--}}
@extends('admin.main')
@section('header')
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
@endsection
{{--Tao 1 key "content' de main doc duoc content--}}
@section('content')

<section class="ftco-section ftco-cart">
    <form method="get">
        {{--    @if(count($carts))--}}
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table table-hover">
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
                            @if (is_array($orders) || is_object($orders))
                                @foreach($orders as $item)
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
                                                <span>pending confirmation</span>
                                            @elseif($item->status == 1)
                                                <span>Order confirmed - Awaiting payment</span>
                                            @elseif($item->status == 2)
                                                <span>Payment received</span>
                                            @elseif($item->status == 3)
                                                <span>Order canceled</span>
                                            @endif
                                        </td>

                                        <td>
                                            {{ number_format($item->totalPrice, 0, '', '.') }} VND
                                        </td>

                                        <td>
                                            <a class="btn btn-sm btn-primary" href="{{ route('order.show', $item->id) }}" >Detail</a>
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


