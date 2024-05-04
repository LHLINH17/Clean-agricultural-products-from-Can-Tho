@extends('admin.main')

@section('content')
    <br>
    <form action=""  class="form-inline" >
        <div class="form-group">
            <label class="sr-only" for="">label</label>
            &nbsp;
            <input type="text" class="form-control" id="key" name="key" placeholder="Search by name...">
        </div>
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-search">&nbsp;</i>Search
        </button>
        &nbsp
        <a class="btn btn-success" href="/admin/products/add">
            <i class="fa fa-plus"></i> Add new
        </a>
        &nbsp
        <a href="" class="btn btn-danger" id="deleteAllSelectedRecord">
            <i class="fa fa-trash"></i> Delete All Selected
        </a>
    </form>
    <br>
    <table class="table table-hover" >
        <thead>
        <tr class="text-center">
            <th><input type="checkbox" name="" id="select_all_ids"></th>
            <th style="width: 50px">ID</th>
            <th>Product Name</th>
            <th>Image</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Price Sale</th>
            <th>Active</th>
            <th>Update</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $key => $product)
            <tr class="text-center" id="product_ids{{$product->id}}">
                <td><input type="checkbox" name="ids" class="checkbox_ids" value="{{$product->id}}"></td>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td><img src="{{ $product->thumb }}" width='100px'></td>
                <td>{{ $product->menu->name }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->price_sale }}</td>
                <td>{!! \App\Helpers\Helper::active($product->active) !!}</td>
                <td>{{ date('d/m/Y', strtotime($product->updated_at))}}</td>
{{--                <td>{{ $product->updated_at }}</td>--}}
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/products/edit/{{ $product->id }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{ $product->id }}, '/admin/products/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
{{--        {!! $products->links() !!}--}}
        {!! $products->appends(request()->all())->links() !!}
    </div>
@endsection
