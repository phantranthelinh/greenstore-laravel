
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Store - Sản Phẩm </title>
    <link rel = "icon" href ="{{asset('public/backend/images/icon.png')}}" type = "image/x-icon">
    <link rel="stylesheet" href="{{asset('public/frontend/css/style.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
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
            <div class="progress-container">
                <div class="progress-bar" id="myBar"></div>
            </div>
                <div class="navbar">
                    <div class="logo">
                        <a href="{{URL::to('/index')}}"><img src="{{asset('public/frontend/images/logo.png')}}" width="150px"></a>
                    </div>
                    <div class="search">
                        <form method="POST" action="{{URL::to('/search')}}">
                                {{csrf_field()}}
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
                            if ($user_id !=NULL) {
                            ?>
                                <li><a href="{{URL::to('/show-order')}}">XEM ĐƠN HÀNG</a></li>
                            <?php }?>
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
                        <a href="{{URL::to("/show-cart")}}"><img src="{{asset('public/frontend/images/cart.png')}}" width="30px" height="30px"></a>
                    </div>
                    <img src="{{asset('public/frontend/images/menu.png')}}" class="menu-icon" 
                    onclick="menutoggle()">
                </div>
            </div>
        </header>
        <br><br><br><br><br><br>   
           
</div>
    <div class="small-container">

        <div class="row row-2">
            <h2>Tất cả sản phẩm</h2>
            <select onchange="this.options[this.selectedIndex].value && (window.location= this.options[this.selectedIndex].value)">
                <option>Sắp xếp</option>
                <option value="?field=pro_price&orderBy=desc">Sắp xếp giá từ Cao đến thấp</option>
                <option value="?field=pro_price&orderBy=asc">Sắp xếp giá từ Thấp đến cao</option>
                <option value="?field=pro_name&orderBy=asc">Sắp xếp theo tên</option>
            </select>
        </div>

        <div class="row">
            @foreach ($pro as $p)
            <div class="col-4">
                <a href="{{URL::to('product-detail='.$p->id)}}"><img src="{{"public/uploads/".$p->pro_view.""}}"></a>
                <a href="{{URL::to('product-detail='.$p->id)}}"><h4>{{$p->pro_name}}</h4></a>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p style="text-align: right; color:red;">{{number_format($p->pro_price)." VNĐ"}}</p>
            </div>
            @endforeach
        </div>
        
        <div class="page-btn">
            <span>1</span>
            <span>2</span>
            <span>3</span>
            <span>4</span>
            <span>&#8594;</span>
        </div>
    </div>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-2">
                    <a href="index.php"><img src="{{("public/frontend/images/logo-footer.png")}}"></a>
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

</body>
</html>
<script type="text/javascript">
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
    window.onscroll = function() {myFunction()};

    function myFunction() {
    var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    var scrolled = (winScroll / height) * 100;
    document.getElementById("myBar").style.width = scrolled + "%";
    }
</script>
</body>

</html>