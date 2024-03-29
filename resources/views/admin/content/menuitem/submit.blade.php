@extends('admin.layouts.glance')
@section('title')
    thêm mới menu
@endsection
@section('content')
    <h1>Thêm mới menu</h1>
    <div class="row">
        <div class="form-three widget-shadow">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form name="tag" action="{{url('admin/menuitem')}}" method="post" class="form-horizontal">
                @csrf
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Tên sản phẩm</label>
                    <div class="col-sm-8">
                        <input type="text"name="name" value="{{old('name')}}" class="form-control1" id="focusedinput" placeholder="Default Input">
                    </div>
                </div>


                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">kiểu menu item</label>
                    <div class="col-sm-8">
                        <select name="type">
                            @foreach($types as $type_id => $type)

                            <option value="{{$type_id}}">- {{$type}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">link</label>
                    <div class="col-sm-8">
                        <input type="text"name="link" value="{{old('link')}}" class="form-control1" id="focusedinput" placeholder="Default Input">

                    </div>
                </div>

                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Icon</label>
                    <div class="col-sm-8">
                        <input type="text"name="icon" value="{{old('icon')}}" class="form-control1" id="focusedinput" placeholder="Default Input">

                    </div>
                </div>



                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">cha</label>
                    <div class="col-sm-8">
                        <select name="parent_id">
                            <option value="0">mặc định</option>
                        </select>
                    </div>
                </div>



                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">thuộc menu</label>
                    <div class="col-sm-8">
                        <select name="menu_id">
                            @foreach($menus as $menu)
                            <option value="{{$menu->name}}">{{$menu->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <label for="txtarea1" class="col-sm-2 control-label">Mô tả </label>
                    <div class="col-sm-8"><textarea name="desc" id="txtarea1" cols="50" rows="4" class="form-control1 mytinymce"> {{old('desc')}}</textarea></div>
                </div>


                <div class="col-sm-offset-2">
                    <button type="submit" class="btn btn-success">Submit</button> </div>
            </form>
        </div>
    </div>

@endsection
