{{--ke thua file main--}}
@extends('admin.main')
@section('header')
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
@endsection
{{--Tao 1 key "content' de main doc duoc content--}}
@section('content')
    <form action="" method="POST">
        <div class="card-body">

            <div class="form-group">
                <label for="menu">Category Name</label>
                <input type="text" name="name" value="{{ $menu->name }}" class="form-control" id="menu" placeholder="Enter Category Name">
            </div>

{{--            <div class="form-group">--}}
{{--                <label>Danh mục</label>--}}
{{--                <select class="form-control" name="parent_id">--}}
{{--                    <option value="0" {{ $menu->parent_id == 0 ? 'selected' : '' }}>Danh mục cha</option>--}}
{{--                    @foreach($menus as $menuParent)--}}
{{--                        <option value="{{$menu->id}}"--}}
{{--                            {{ $menu->parent_id == $menuParent->id ? 'selected' : '' }}>--}}
{{--                            {{$menuParent->name}}--}}
{{--                        </option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </div>--}}
            <div class="form-group">
                <label>Category Parent</label>
                <select class="form-control" name="parent_id">
                    <option value="0" {{ $menu->parent_id == 0 ? 'selected' : '' }}>---select---</option>
                    @foreach($menus as $menuParent)
                        <option value="{{ $menuParent->id }}"
                            {{ $menu->parent_id == $menuParent->id ? 'selected' : '' }}>
                            {{ $menuParent->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control">{{ $menu->description }}</textarea>
            </div>

            <div class="form-group">
                <label>Detail Description</label>
                <textarea name="content" id="content" class="form-control">{{ $menu->content }}</textarea>
            </div>



            <div class="form-group">
                <label>Active</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active"
                           name="active" {{ $menu->active == 1 ? 'checked=""' : '' }}>
                    <label for="active" class="custom-control-label">Yes</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active"
                           name="active" {{ $menu->active == 0 ? 'checked=""' : '' }}>
                    <label for="no_active" class="custom-control-label">No</label>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Category Update</button>
        </div>
        @csrf
    </form>
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

