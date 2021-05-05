@extends('admin-layout')
@section('admin-content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật thương hiệu
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <?php 
                                    $msg = Session::get('msg');
                                    if($msg){
                                        echo '<div style="text-align:center;color:green;">'.$msg.'</div>';
                                        Session::put('msg',null);
                                    }
                                ?>
                                @foreach ($edit_cate as $cate)
                                <form role="form" action="{{URL::to('/update-categories='.$cate->id)}}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label >Tên nhãn hiệu</label>
                                    <input type="text" class="form-control"  placeholder="Tên nhãn hiệu" name="name_cate" value="{{$cate->c_name}}">
                                </div>
                                
                                <div class="form-group">
                                    <label >Tên người thêm</label>
                                    <input type="text" class="form-control"  value="{{$cate->c_name_author}}" name="name_author">
                                </div>
                                <div class="form-group">
                                    <label>ID </label>
                                    <input type="text" class="form-control"  value="{{$cate->c_author_id}}" name="id_author">
                                </div>
                                <div class="form-group">
                                    <label><img src="{{$cate->c_images}}" width="150px;"></label>
                                    <br>
                                    <input type="file" >
  
                                </div>
                                @endforeach
                                <button type="submit" name="add-supp" class="btn btn-info">Cập nhật thương hiệu</button>
                            </form>
                            </div>

                        </div>
                    </section>
            </div>
</div>
@endsection