@extends('admin-layout')
@section('admin-content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      LIỆT KÊ ĐƠN HÀNG
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
            <th>TÊN NGƯỜI ĐẶT</th>
            <th>TỔNG GIÁ TIỀN</th>
            <th>TÌNH TRẠNG</th>
            <th>NGÀY THÊM</th>
            <th>HIỂN THỊ</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($all_order as $or)
          <tr>
            <td>{{$or->name}}</td>
            <td>{{$or->or_total}}</td>
            <td>{{$or->or_status}}</td>
            <td><span class="text-ellipsis">{{date('d-m-Y', strtotime($or->created_at))}}</span></td>
             <td>
              <a href="{{URL::to('/view-order='.$or->id)}}" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i>
              </a>
                <a href="{{URL::to('/delete-order='.$or->id)}}" ui-toggle-class="" onclick="return confirm('Bạn chắc chắn muốn xóa chứ?')">
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