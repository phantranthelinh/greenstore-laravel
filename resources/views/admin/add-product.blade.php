@extends('admin-layout')
@section('admin-content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm Sản Phẩm
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
                                <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label >Tên sản phẩm</label>
                                    <input type="text" class="form-control"  placeholder="Tên nhãn hiệu" name="name">
                                </div>
                                <div class="form-group">
                                    <label >Thuộc thương hiệu</label>
                                    <select class="form-control input-lg m-bot15" name="brand">
                                        <option value="1">Vans</option>
                                        <option value="2">Converse</option>
                                        <option value="3">Palladium</option>
                                        <option value="4">Adidas</option>
                                        <option value="5">New Balance</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Giá sản phẩm</label>
                                    <input type="text" class="form-control"  name="price">
                                </div>
                                <div class="form-group">
                                    <label >Tên người thêm</label>
                                    <input type="text" class="form-control"  value="<?=Session::get('name')?>" name="name_author">
                                </div>
                                <div class="form-group">
                                    <label>ID </label>
                                    <input type="text" class="form-control"  value="<?=Session::get('id')?>" name="id_author">
                                </div>
                                <div class="form-group">
                                        <label>Mô tả sản phẩm</label>
                                        <div class="col-lg-15">
                                            <textarea rows="4" class="form-control "  name="des" required="" id="ckeditor">
                                                
                                            </textarea>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label>Nội dung sản phẩm</label>
                                        <div class="col-lg-15">
                                            <textarea rows="4" class="form-control "  name="content" required="" id="ckeditor1">
                                                
                                            </textarea>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label>Hình ảnh sản phẩm</label>
                                    <input type="file" name="images" >
  
                                </div>
                                <div class="form-group">
                                	<label >Hiện thị</label>
                                    <select class="form-control input-lg m-bot15" name="status">
		                                <option value="1">Hiển thị</option>
		                                <option value="0">Ẩn</option>
                            		</select>
                                </div>
                                <button type="submit" name="add-supp" class="btn btn-info">Thêm sản phẩm</button>
                            </form>
                            </div>

                        </div>
                    </section>
            </div>
</div>
@endsection