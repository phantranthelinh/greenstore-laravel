<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Store - Giỏ hàng</title>
    <link rel = "icon" href ="{{asset('public/backend/images/icon.png')}}" type = "image/x-icon">
    <link rel="stylesheet" href="{{asset('public/frontend/css/style.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swa   p"
        rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>

<body>
    <div class="header">
        <header>
        <div class="container">
                <div class="navbar">
                    <div class="logo">
                        <a href="{{URL::to('/index')}}"><img src="{{asset('public/frontend/images/logo.png')}}" width="150px"></a>
                    </div>
                    <div class="search">
                            <form method="get" action="">
                                <input type="text" name="search" placeholder="Tìm kiếm ...">
                                <span><i class="fas fa-search"></i></span>
                            </form>
                    </div>
                    <nav>
                        <ul id="MenuItems">
                            <li><a href="{{URL::to('/index')}}">TRANG CHỦ</a></li>
                            <li><a href="{{URL::to('/product')}}">SẢN PHẨM</a></li>
                            <div class="dropdown">
                                <li><a href="sale.php" class="sale">SALE</a>
                                    <div class="dropdown-content">
                                        <ul>
                                            <li><a href="sale.php">10%</a></li>
                                            <li><a href="sale.php">15%</a></li>
                                            <li><a href="sale.php">30%</a></li>
                                            <li><a href="sale.php">50%</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </div>
                            <div class="dropdown">
                                <li><a href="#">THƯƠNG HIỆU</a>
                                    <div class="dropdown-content">
                                        <ul>
                                            @foreach ($categories as $cate) 
                                            <li><a href="{{URL::to('/brand='.$cate->id)}}">{{$cate->c_name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                            </div>
                                 <?php 
                                $user_id = Session::get('id_user');
                                if ($user_id ==NULL) {
                                 ?>
                                <li><a href="{{URL::to('login-checkout')}}">ĐĂNG NHẬP</a></li>
                                </li>
                                <?php }else{ ?>
                                <li><a href="{{URL::to('logout-checkout')}}">ĐĂNG XUẤT</a></li>
                                </li>
                                <?php } ?>
                        </ul>
                    </nav>
                    <div class="cart">
                        <a href="{{URL::to("/cart")}}"><img src="{{asset('public/frontend/images/cart.png')}}" width="30px" height="30px"></a>
                    </div>
                    <img src="{{asset('public/frontend/images/menu.png')}}" class="menu-icon" 
                    onclick="menutoggle()">
                </div>
            </div>
        </header>
        <br><br><br>   
           
</div>
    <div class="small-container cart-page">
        <div class="row">
            <div class="col-2">
                <h2 class="title">Điền thông tin gửi hàng</h2>
                <form action="{{URL::to('/save-checkout')}}" method="POST">
                    {{csrf_field()}}
                    <input type="hidden" name="id_user" value="{{Session::get('id_user')}}">
                    <input type="email" name="email" placeholder="Email*">
                    <input type="text" name="name" placeholder="Họ và tên*">
                    <input type="text" name="phone_number" placeholder="Số điện thoại*">
                    <input type="text" name="address" placeholder="Địa chỉ*">
                    <h4 style="text-align: left;color: #555;">Ghi chú gửi hàng</h4>
                    <textarea cols="120" rows="10" placeholder="Ghi chú đơn hàng của bạn" style="padding:10px ;" name="notes"></textarea>
                    <div class="ok">
                        <input type="submit" value="Gửi" class="btn" style="float: right; width: 250px;">
                    </div>
                </form>
            </div>
        </div>
    </div>


    

    @php
        $content = Cart::content();
    @endphp
    <!-- -----------------cart item details------------------- -->
    <div class="small-container cart-page">
        <table>
                <tr>
                    <th>Sản Phẩm</th>
                    <th>Số Lượng</th>
                    <th>Giá</th>
                </tr>
                @foreach ($content as $cart)
                        <tr>
                            <td>
                                <div class="cart-info">
                                    <img src="{{'public/uploads/'.$cart->options->image}}" width="150px">
                                    <div>
                                        <p>{{$cart->name}}</p>
                                        <small style="color:red;">{{number_format($cart->price)." VND"}}</small>
                                        
                                        <br>
                                        <a href="{{URL::to('remove-cart='.$cart->rowId)}}">Remove</a>
                                        
                                    </div>
                                </div>
                            </td>
                            <td>
                                <form action="{{URL::to('/update-cart-qty')}}" method="post">
                                    {{csrf_field()}}
                                <input type="number" value="{{$cart->qty}}" width="50%" name="qty" min="1" max="20">
                                <input type="hidden" value="{{$cart->rowId}}" name="rowId_cart" class="qty">
                                <input type="submit" value="Cập nhật" name="number-qty" class="btn" style="float: right;">
                                </form>
                            </td>
                            <td style="color:red;" >
                                <?php 
                                $Subtotal = $cart->price * $cart->qty ;
                                echo number_format($Subtotal). " VNĐ";
                                ?>
                            </td>
                        </tr>
                @endforeach
        </table>

        <div class="total-price">
            <table>
                <tr>
                    <td>Tổng</td>
                    <td>{{Cart::subtotal()." VND"}}</td>
                </tr>
                <tr>
                    <td>Phí vận chuyễn</td>
                    <td>Miễn phí</td>
                </tr>
                <tr>
                    <td>Thành tiền</td>
                    <td>{{Cart::subtotal()." VND"}}</td>
                </tr>
            </table>

        </div>
        <div class="ok">
            <?php 
            $user_id = Session::get('id_user');
            $shipping_id = Session::get('shipping_id');
            if($user_id!=NULL && $shipping_id==NULL){
             ?>
                <a href="{{URL::to('/checkout')}}"><button class="btn">Thanh Toán</button></a>
            <?php }elseif($user_id!=NULL && $shipping_id!=NULL){ ?>
                <a href="{{URL::to('/payment')}}"><button class="btn">Thanh Toán</button></a>
            <?php }else{ ?>
                <a href="{{URL::to('/login-checkout')}}"><button class="btn">Thanh Toán</button></a>
            <?php } ?>
        </div>
    </div>

    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-2">
                    <a href="{{URL::to('/index')}}"><img src="{{("public/frontend/images/logo-footer.png")}}"></a>
                    <p>Mục đích cuối cùng của chúng tôi là đem lại những đôi giày tốt nhất <br>với giá cả phù hợp nhất để giành cho các bạn
</p>
                </div>
                <div class="footer-col-4">
                    <h3>Follow us</h3>
                    <ul>
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Instagram</a></li>
                        <li><a href="#">Twitter</a></li>
                    </ul>
                </div>
            </div>
            <hr>
            <p class="Copyright">Copyright 2021 - By TheLinhx</p>
        </div>
    </div>
    
     <script>
   var MenuItems = document.getElementById("MenuItems");
        
    MenuItems.style.maxHeight = "0px";

    function menutoggle(){
        if(MenuItems.style.maxHeight == "0px")
            {
                MenuItems.style.maxHeight = "200px";
            }
        else
            {
                MenuItems.style.maxHeight = "0px";
            }
        }
    window.addEventListener("scroll",function () {
        var header = document.querySelector("header");
        header.classList.toggle("sticky",window.scrollY >0);
    })
        </script>
</body>

</html>