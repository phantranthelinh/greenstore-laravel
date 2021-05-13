
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
                                <li><a href="{{URL::to('/account')}}">TÀI KHOẢN</a></li>
                                </li>
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
        <br><br><br><br><br><br>   
           
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
                            <td><input type="number" value="{{$cart->qty}}"></td>
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
                    <td>Tax</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>{{Cart::subtotal()." VND"}}</td>
                </tr>
            </table>

        </div>
        <div class="ok">
            <a href="#"><button class="btn">Thanh Toán</button></a>
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