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
{{--    </form>--}}
{{--    <br>--}}
    <table class="table table-hover">
        <thead>
        <tr class="text-center">
            <th>ID</th>
            <th>Customer Name</th>
            <th>Personal Email</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Created_at</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($contacts as $contact)
            <tr style="" class="text-center">
                <td>{{ $contact->id }} </td>
                <td>{{ $contact->name }} </td>
                <td>{{ $contact->email }} </td>
                <td>{{ $contact->subject }} </td>
                <td>{{ $contact->message }} </td>
                <td>{{ date('d/m/Y', strtotime($contact->created_at))}}</td>
                <td class="text-right">
                    <a href="#" class="btn btn-sm btn-danger"
                       onclick="removeRow({{$contact->id}},'/admin/contact/destroy')">
                        <i class="fa fa-trash">&nbsp;</i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="cart-footer clearfix">
        {!! $contacts->appends(request()->all())->links() !!}
    </div>
@endsection


