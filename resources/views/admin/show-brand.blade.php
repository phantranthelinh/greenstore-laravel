@extends('admin-layout')
@section('admin-content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      LIỆT KÊ NHÃN HIỆU
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <?php 
          $msg = Session::get('msg');
          if($msg){
            echo '<div style="text-align:center;color:green;">'.$msg.'</div>';
            Session::put('msg',null);
          }
        ?>
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>ID</th>
            <th>TÊN THƯƠNG HIỆU</th>
            <th>LOGO</th>
            <th>TRẠNG THÁI</th>
            <th>NGÀY THÊM</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($all_cate as $b)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$b->id}}</td>
            <td>{{$b->c_name}}</td>
            <td><img src="{{"public/uploads/brand/".$b->c_images.""}}" width="150px"></td>
            <td><span class="text-ellipsis" style="text-align: center;">
            <?php
              if($b->c_active == 0){
            ?>
             <a href="{{URL::to('/unactive-brand='.$b->id)}}"><span class="fa-style fa fa-circle" style="color:red;"><span></a>
            <?php }else{ ?>
                 <a href="{{URL::to('/active-brand='.$b->id)}}"><span class="fa-style fa fa-circle" style="color:green;"><span></a>
            <?php } ?>
            </span></td>
            <td><span class="text-ellipsis">{{$b->created_at}}</span></td>
            <td>
              <a href="{{URL::to('/edit-brand='.$b->id)}}" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i>
              </a>
                <a href="{{URL::to('/delete-brand='.$b->id)}}" ui-toggle-class="" onclick="return confirm('Bạn chắc chắn muốn xóa chứ?')">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection