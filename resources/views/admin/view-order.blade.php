@extends('admin-layout')
@section('admin-content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      THÔNG TIN NGƯỜI MUA
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
            <th>TÊN NGƯỜI MUA</th>
            <th>ĐỊA CHỈ</th>
            <th>SỐ ĐIỆN THOẠI</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($all_order as $or)
          <tr>
            <td>{{$or->name}}</td>
            <td>{{number_format((float)$or->or_total)." VNĐ"}}</td>
            <td>{{$or->or_status}}</td>
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
<br>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      THÔNG TIN VẬN CHUYỂN
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
            <td>{{number_format((float)$or->or_total)." VNĐ"}}</td>
            <td>{{$or->or_status}}</td>
            <td><span class="text-ellipsis">{{date('d-m-Y', strtotime($or->created_at))}}</span></td>
             <td>
              <a href="{{URL::to('/edit-product='.$or->id)}}" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i>
              </a>
                <a href="{{URL::to('/delete-product='.$or->id)}}" ui-toggle-class="" onclick="return confirm('Bạn chắc chắn muốn xóa chứ?')">
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
<br>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      LIỆT KÊ CHI TIẾT ĐƠN HÀNG
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
            <td>{{number_format((float)$or->or_total)." VNĐ"}}</td>
            <td>{{$or->or_status}}</td>
            <td><span class="text-ellipsis">{{date('d-m-Y', strtotime($or->created_at))}}</span></td>
             <td>
              <a href="{{URL::to('/edit-product='.$or->id)}}" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i>
              </a>
                <a href="{{URL::to('/delete-product='.$or->id)}}" ui-toggle-class="" onclick="return confirm('Bạn chắc chắn muốn xóa chứ?')">
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