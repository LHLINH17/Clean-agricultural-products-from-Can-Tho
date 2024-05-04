{{--ke thua file main--}}
@extends('admin.main')
@section('header')
{{--    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>--}}
@endsection
{{--Tao 1 key "content' de main doc duoc content--}}
@section('content')
   <div class="container-fluid">
       <style type="text/css">
           p.title-thongke {
               text-align: center;
               font-size: 20px;
               font-weight: bold;
           }
       </style>

       <div class="row-cols-md-auto">
           <p class="title-thongke">Order statistics by sales</p>

           <form autocomplete="off">
{{--               <form autocomplete="off" method="post">--}}
               @csrf

               <div class="col-md-2">
                   <p>From date: <input type="text" name="fromdate" id="datepicker" class="form-control"></p>
               </div>
               <div class="col-md-2">
                   <p>To date: <input type="text" name="todate"  id="datepicker2" class="form-control"></p>
               </div>
               <div class="col-md-2">
{{--                   <p><input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Lọc kết quả"></p>--}}
                   <button type="submit" id="btn-dashboard-filter" class="btn btn-primary">Filter</button>
               </div>
{{--               <div class="col-md-2">--}}
{{--                   <p>--}}
{{--                       Lọc theo--}}
{{--                       <select class="dashboard form-control">--}}
{{--                           <option> >--Chọn--< </option>--}}
{{--                           <option>7 ngày qua</option>--}}
{{--                           <option>Tháng trước</option>--}}
{{--                       </select>--}}
{{--                   </p>--}}
{{--               </div>--}}
           </form>
               <div class="col-md-12">
                   <div id="myfirstchart" style="height: 250px;"></div>
               </div>

            <canvas id="salesChart"></canvas>
       </div>
   </div>
@endsection

@section('footer')
{{--    <script>--}}
{{--        ClassicEditor--}}
{{--            .create( document.querySelector( '#content' ) )--}}
{{--            .catch( error => {--}}
{{--                console.error( error );--}}
{{--            } );--}}
{{--    </script>--}}


@endsection
