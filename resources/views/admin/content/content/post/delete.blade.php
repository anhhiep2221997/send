@extends('admin.layouts.glance')
@section('title')
    Xóa danh mục
@endsection
@section('content')
    <h1>Xóa danh mục {{ $post->id .  ' : ' .$post->name }}</h1>
    <div class="row">
        <div class="form-three widget-shadow">
            <form name="post" action="{{url('admin/content/post/'.$post->id.'/delete')}}" method="post" class="form-horizontal">
                @csrf

                <div class="col-sm-offset-2">
                    <button type="submit" class="btn btn-danger">Xóa</button> </div>
            </form>
        </div>
    </div>

@endsection
