@extends('admin-layout')
@section('admin-content')
<section>Chào mừng bạn đến với Trang Admin</section>
<p>Hi <a href=""><?=Session::get('name')?></a></p>

@endsection