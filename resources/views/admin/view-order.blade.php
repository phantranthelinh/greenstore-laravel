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
            <th>SỐ ĐIỆN THOẠI</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($all_order as $or)
          <tr>
            <td>{{$or->tr_user_name}}</td>
            <td>{{$or->tr_phone}}</td>
          @endforeach
        </tbody>
      </table>

    </div>

    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
  
        </div>
        {{-- <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div> --}}
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
            <th>TÊN NGƯỜI MUA</th>
            <th>SỐ ĐIỆN THOẠI</th>
            <th>ĐỊA CHỈ</th>
            <th>GHI CHÚ</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($all_order as $or)
          <tr>
            <td>{{$or->tr_user_name}}</td>
            <td>{{$or->tr_phone}}</td>
            <td>{{$or->tr_address}}</td>
            <td>{{$or->tr_note}}</td>
          @endforeach
        </tbody>
      </table>

    </div>

    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
  
        </div>
        {{-- <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div> --}}
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
            <th>TÊN SẢN PHẨM</th>
            <th>SỐ LƯỢNG</th>
            <th>GIÁ</th>
            <th>TỔNG TIỀN</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($all_order as $or)
          <tr>
            <td>{{$or->od_pro_name}}</td>
            <td>{{$or->od_pro_qty}}</td>
            <td>{{number_format($or->od_pro_price)." VNĐ"}}</td>
            <td>{{$or->or_total}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>

    </div>
    
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
        </div>
        {{-- <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div> --}}
    </footer>
  </div>
</div>
@endsection