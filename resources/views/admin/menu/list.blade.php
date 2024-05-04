@php use App\Helpers\Helper; @endphp
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
        <a class="btn btn-success" href="/admin/menus/add">
            <i class="fa fa-plus">&nbsp;</i>Add new
        </a>
        &nbsp
        <a href="" class="btn btn-danger" id="deleteAllSelectedRecord3">
            <i class="fa fa-trash"></i> Delete All Selected
        </a>
    </form>
    <br>
    <table class="table table-hover">
        <thead>
        <tr class="text-center">
            <th><input type="checkbox" name="" id="select_all_ids3"></th>
            <th style="width: 50px;">ID</th>
            <th>Name</th>
            <th>Active</th>
            <th>Update</th>
            <th style="width: 100px"></th>
        </tr>
        </thead>
        <tbody>
            {!! Helper::menu($menus) !!}
        </tbody>
        @csrf
    </table>
    <div class="cart-footer clearfix">
        {!! $menus->appends(request()->all())->links() !!}
    </div>
@endsection
