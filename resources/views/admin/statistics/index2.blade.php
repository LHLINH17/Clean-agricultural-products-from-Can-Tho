{{--ke thua file main--}}
@extends('admin.main')
@section('header')
    {{--    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>--}}
@endsection
{{--Tao 1 key "content' de main doc duoc content--}}
@section('content')
    <div class="container">
        <h1 class="text-center text-danger pt-4">Order based statistics</h1>
        <hr>

        <div class="row py-2">
            <div class="col-md-6">
                <h3>List of Order</h3>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="date_filter">Filter by Date:</label>

                    <form method="get" action="orders">
                        <div class="input-group">
                            <select class="form-select" name="date_filter">
                                <option value="">All Dates</option>
                                <option value="today">Today</option>
                                <option value="yesterday">Yesterday</option>
                                <option value="this_week">This Week</option>
                                <option value="last_week">Last Week</option>
                                <option value="this_month">This Month</option>
                                <option value="last_month">Last Month</option>
                                <option value="this_year">This Year</option>
                                <option value="last_year">Last Year</option>
                            </select>
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <table class="table  table-bordered table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Date Created</th>
            </tr>
            </thead>

            <tbody>

            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->created_at->format('Y-m-d H:i:s') }}</td>
                </tr>

            @endforeach


            </tbody>
        </table>

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
