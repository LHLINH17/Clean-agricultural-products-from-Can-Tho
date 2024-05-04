@extends('admin.main')
@section('head')
@endsection

@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <!--Promotion Name-->
            <div class="row-cols-1">
                <label>Promotion Name</label>
                <input class="form-control" type="text" name="name" id="name" value="{{$promotions->name}}"  placeholder="Enter Promotion Name">
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <label>Start Time</label>
                    <input class="form-control" type="date" value="{{$promotions->start_time}}" name="start_time" id="start_time" placeholder="Enter Start Time">
                </div>

                <div class="col-md-6">
                    <label>Expired Time</label>
                    <input class="form-control" type="date" value="{{$promotions->expired_time}}" name="expired_time" id="expired_time" placeholder="Enter Expired Time">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <label>Promotion Percent</label>
                    <input class="form-control" type="number" min="1" value="{{$promotions->promotion_percent}}" name="promotion_percent" id="level" placeholder="Enter Promotion Percent">
                </div>

                <div class="col-md-6">
                    <label>Promotion Quantity</label>
                    <input class="form-control" min="1" value="{{$promotions->promotion_quantity}}" type="number"  name="quantity" id="quantity" placeholder="Enter Promotion Quantity">
                </div>
            </div>
            <!---->
            <!--Active-->
            <br>
            <div class="form-group">
                <label> Active</label>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="1" name="active" id="active" {{$promotions->active == 1 ? 'checked=""' :''}}>
                        <label class="form-check-label">Yes</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="0" name="active" id="no_active" {{$promotions->active == 0 ? 'checked=""' :''}}>
                        <label class="form-check-label">No</label>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Promotion Update</button>
        </div>
        @csrf
    </form>
@endsection

