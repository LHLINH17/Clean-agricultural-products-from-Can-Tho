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
    <table class="table table-hover">
        <thead>
        <tr class="text-center">
            <th>ID</th>
            <th>Customer Name</th>
            <th>Personal Email</th>
            <th>Product Name</th>
            <th>Content</th>
            <th>Created_at</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($comments as $comment)
            <tr style="" class="text-center">
                <td>{{ $comment->id }} </td>
                <td>{{ $comment->customerName->name }} </td>
                <td>{{ $comment->customerName->email }} </td>
                <td>{{ $comment->productName->name }} </td>
                <td>{{ $comment->comment }} </td>
                <td>{{ date('d/m/Y', strtotime($comment->created_at))}}</td>
                <td class="text-right">
                    <a href="#" class="btn btn-sm btn-danger"
                       onclick="removeRow({{$comment->id}},'/admin/comment/destroy')">
                        <i class="fa fa-trash">&nbsp;</i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="cart-footer clearfix">
        {!! $comments->appends(request()->all())->links() !!}
    </div>
@endsection


