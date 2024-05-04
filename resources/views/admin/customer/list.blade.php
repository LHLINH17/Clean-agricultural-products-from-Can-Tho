@extends('admin.main')

@section('content')
    {{--    <br>--}}
    {{--    <form action="" class="form-inline">--}}
    {{--        <div class="form-group">--}}
    {{--            <label class="sr-only" for="">label</label>--}}
    {{--            &nbsp;--}}
    {{--            <input class="form-control"  name="key"  id="key" placeholder="Search by name...">--}}
    {{--        </div>--}}
    {{--        <button type="submit" class="btn btn-primary">--}}
    {{--            <i class="fa fa-search">&nbsp;Search</i>--}}
    {{--        </button>--}}
    {{--        &nbsp;--}}
    {{--        <a class="btn btn-success" href="/admin/promotion/add">--}}
    {{--            <i class="fa fa-plus">Add new</i>--}}
    {{--        </a>--}}
    {{--    </form>--}}
    {{--    <br>--}}
    <br>
    <form action="" class="form-inline">
        <div class="form-group">
            <label class="sr-only" for="">label</label>
            &nbsp;
            <input class="form-control"  name="key"  id="key" placeholder="Search by name...">
        </div>
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-search">&nbsp;</i>Search
        </button>
    </form>
    <br>
    <table class="table table-hover">
        <thead>
        <tr class="text-center">
            <th>Customer ID</th>
            <th>Customer Name</th>
            <th>Customer Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Verification</th>
            <th>Account creation date</th>
        </tr>
        </thead>
        <tbody>
        {{--            {!! \App\Helpers\Helper::menu($customers) !!}--}}
        @foreach($customers as $key => $customer)
            <tr style="" class="text-center">
                <td>{{ $customer->id }} </td>
                <td>{{ $customer->name }} </td>
                <td>{{ $customer->email }} </td>
                <td>{{ $customer->phone }} </td>
                <td>{{ $customer->address }} </td>
                <td>{!! \App\Helpers\Helper::active( $customer->status) !!}</td>
                <td>{{ date('d/m/Y', strtotime($customer->updated_at))}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="cart-footer clearfix">
        {!! $customers->appends(request()->all())->links() !!}
    </div>
@endsection



