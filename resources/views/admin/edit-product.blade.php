@extends('admin-layout')
@section('admin-content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật sản phẩm
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
                                @foreach ($edit_pro as $pro)
                                
                                <form role="form" action="{{URL::to('/update-product='.$pro->id)}}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label >Tên sản phẩm</label>
                                    <input type="text" class="form-control"  placeholder="Tên nhãn hiệu" name="name" value="{{$pro->pro_name}}">
                                </div>
                                <div class="form-group">
                                    <label >Thuộc thương hiệu</label>
                                    <select class="form-control input-lg m-bot15" name="brand">
                                        <option value="1">Vans</option>
                                        <option value="2">Converse</option>
                                        <option value="3">Palladium</option>
                                        <option value="4">Adidas</option>
                                        <option value="5">Nike</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Giá sản phẩm</label>
                                    <input type="text" class="form-control"  name="price" value="{{$pro->pro_price}}">
                                </div>
                                <div class="form-group">
                                    <label>Sale</label>
                                    <input type="text" class="form-control"  name="sale" value="{{$pro->pro_sale}}">
                                </div>
                                <div class="form-group">
                                    <label >Tên người thêm</label>
                                    <input type="text" class="form-control"  value="{{$pro->name}}" name="name_author">
                                </div>
                                <div class="form-group">
                                    <label>ID </label>
                                    <input type="text" class="form-control"  value="{{$pro->id}}" name="id_author">
                                </div>
                                <div class="form-group">
                                    <label>Số lượng </label>
                                    <input type="number" class="form-control"  value="{{$pro->pro_number}}" name="number">
                                </div>
                                <div class="form-group">
                                        <label>Mô tả sản phẩm</label>
                                        <div class="col-lg-15">
                                            <textarea rows="4" class="form-control "  name="content" required="" value="{{$pro->pro_content}}">
                                                
                                            </textarea>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label>Hình ảnh sản phẩm</label>
                                    <input type="file" name="images" value="">
                                    <img src="{{"public/uploads/".$pro->pro_view.""}}" width="150px">
                                </div>
                                <button type="submit" name="add-supp" class="btn btn-info">Cập nhật sản phẩm</button>
                            </form>
                            @endforeach
                            </div>

                        </div>
                    </section>
            </div>
</div>
@endsection