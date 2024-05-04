@extends('admin.main')

@section('content')
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
        &nbsp;
        <a class="btn btn-success" href="/admin/promotion/add">
            <i class="fa fa-plus"></i>Add new
        </a>
    </form>
    <br>
    <table class="table table-hover">
        <thead>
        <tr class="text-center">
            <th>ID</th>
            <th>Promotion Name</th>
            <th>Promotion Percent</th>
            <th>Promotion Quantity</th>
            <th>Start Time</th>
            <th>Expired Time</th>
            <th>Status</th>
            <th>Update</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($promotions as $promotion)
            <tr style="" class="text-center">
                <td>{{ $promotion->id }} </td>
                <td>{{ $promotion->name }} </td>
                <td>{{ $promotion->promotion_percent }} </td>
                <td>{{ $promotion->promotion_quantity }} </td>
                <td>{{ date('d/m/Y', strtotime($promotion->start_time))}} </td>
                <td>{{ date('d/m/Y', strtotime($promotion->expired_time))}} </td>
                <td>{!! \App\Helpers\Helper::active( $promotion->active) !!}</td>
                <td>{{ date('d/m/Y', strtotime($promotion->updated_at))}}</td>
                <td class="text-right">
                    <a href="/admin/promotion/edit/{{$promotion->id}}" class="btn btn-sm btn-primary">
                        <i class="fa fa-edit">&nbsp;</i>
                    </a>
                    <a href="#" class="btn btn-sm btn-danger"
                       onclick="removeRow({{$promotion->id}},'/admin/promotion/destroy')">
                        <i class="fa fa-trash">&nbsp;</i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="cart-footer clearfix">
{{--        {!! $promotions->appends(request()->all())->links() !!}--}}
    </div>
@endsection
