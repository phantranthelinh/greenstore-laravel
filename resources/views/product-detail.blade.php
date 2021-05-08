
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Store - Chi tiết sản phẩm</title>
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

    <!-- ---------- single Products detail ----------- -->
    <div class="small-container single-product">
        <div class="row">
        <?php if(isset($_COOKIE['msg'])){ ?>
            <p style="color:green; transition: 0.6s ease;"><?=$_COOKIE['msg']?></p>
        <?php } ?>
        </div>
        <div class="row">
            <div class="col-2">
                @foreach ($pro as $p) 
                <figure class="zoom" style="background:url('{{asset("public/uploads/".$p->pro_view."")}}')" onmousemove="zoom(event)" ontouchmove="zoom(event)">
                        <img src="{{asset("public/uploads/".$p->pro_view."")}}" width="100%" class="small-img" id="productImg">
                </figure>
                @endforeach
                <div class="small-img-row">
                    @foreach ($images as $im) 
                    <div class="small-img-rol">
                        <img src="{{asset("public/uploads/".$im->image."")}}" width="100%" class="small-img">
                    </div>
                    @endforeach
                </div>

            </div>
            <div class="col-3">
                @foreach($pro as $p)
                    <p><a href="{{URL::to('/index')}}">Home</a>/{{$p->pro_keyword}}</p>
                    <h1>{{$p->pro_name}}</h1>
                    <h4 style="color:red;">{{number_format($p->pro_price)." VNĐ"}}</h4>
                    <select>
                        <option>Select Size</option>
                        @foreach ($size_pro as $size )
                            <option value="{{$size->size}}" name="size_product">{{$size->size}}</option>
                        @endforeach
                    </select>
                    <p>{{$p->pro_description}}</p>
                        <input type="number" min="1" max="20" value="1">
                        <a href="{{URL::to('add-cart='.$p->id)}}" class="btn">Thêm giỏ hàng</a>
                        <br>
                        <h3>Product Detail
                            <i class="fa fa-indent"></i>
                        </h3>    
                    <p>{{$p->pro_content}}</p>
                @endforeach
            </div>
        </div>
    </div>

    <!-- ----- title------------- -->
    <div class="small-container">
        <div class="row row2">
            <h2>SẢN PHẨM TƯƠNG TỰ</h2>
            <a href="#"><p>XEM THÊM</p></a>
        </div>
    </div>

<!-- ---------------Products----------------- -->
    <div class="small-container">

        <div class="row">
            <div class="col-4">
                <img src="">
                <h4>Red Printed T-Shirt</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>$50.00</p>
            </div>
            <div class="col-4">
                <img src="">
                <h4>Red Printed T-Shirt</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>$50.00</p>
            </div>
            <div class="col-4">
                <img src="">
                <h4>Red Printed T-Shirt</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>$50.00</p>
            </div>
            <div class="col-4">
                <img src="">
                <h4>Red Printed T-Shirt</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>$50.00</p>
            </div>
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
    


<!-- ------------------- JS for  product gallery------------------------         -->
        <script>
            var ProductImg = document.getElementById("productImg");
            var SmallImg = document.getElementsByClassName("small-img");

            SmallImg[0].onclick = function()
            {
                ProductImg.src = SmallImg[0].src;
            }
            SmallImg[1].onclick = function()
            {
                ProductImg.src = SmallImg[1].src;
            }
            SmallImg[2].onclick = function()
            {
                ProductImg.src = SmallImg[2].src;
            }
            SmallImg[3].onclick = function()
            {
                ProductImg.src = SmallImg[3].src;
            }
            SmallImg[4].onclick = function()
            {
                ProductImg.src = SmallImg[4].src;
            }
            function zoom(e) {
            var zoomer = e.currentTarget;
            e.offsetX ? offsetX = e.offsetX : offsetX = e.touches[0].pageX
            e.offsetY ? offsetY = e.offsetY : offsetX = e.touches[0].pageX
            x = (offsetX / zoomer.offsetWidth) * 100
            y = (offsetY / zoomer.offsetHeight) * 100
            zoomer.style.backgroundPosition = x + "% " + y + "%";
            }
            window.addEventListener("scroll",function () {
        var header = document.querySelector("header");
        header.classList.toggle("sticky",window.scrollY >0);
    })
        </script>
</body>

</html>