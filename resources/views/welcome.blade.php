
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Store - Thế giới giày của bạn</title>
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
                        <a href="{{URL::to("/show-cart")}}"><img src="{{asset('public/frontend/images/cart.png')}}" width="30px" height="30px"></a>
                    </div>
                    <img src="{{asset('public/frontend/images/menu.png')}}" class="menu-icon" 
                    onclick="menutoggle()">
                </div>
            </div>
        </header>
        <br><br><br><br><br><br>   
            <div class="row">
                <div class="slideshow-container">
                    @foreach ($slides as $slide) 
                    <div class="mySlides fade">
                      <div class="numbertext">1 / 2</div>
                      <img src="{{"public/frontend/".$slide->image.""}}" style="width:1000px">
                      <div class="text">HOT PRODUCT</div>
                    </div>
                    @endforeach
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
                <br>
                <div style="text-align:center">
                    @foreach ($slides as $slide)
                  <span class="dot" onclick="currentSlide({{$slide->id}})"></span> 
                    @endforeach
                </div>
                </div>
            </div>
    </div>
  
</body>
    <!-- ------------- featured categorries ---------------- -->
    <div class="categories">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <img src="{{('public/frontend/images/category-1.jpg')}}">
                </div>
                <div class="col-3">
                    <img src="{{('public/frontend/images/category-2.jpg')}}">
                </div>
                <div class="col-3">
                    <img src="{{('public/frontend/images/category-3.jpg')}}">
                </div>

            </div>
        </div>

    </div>
    <!-- ------------- featured products ---------------- -->
    <div class="small-container">
        <h2 class="title">SẢN PHẨM KHUYỄN MÃI</h2>
        <div class="row">
            @foreach($pro_sale as $sale) 
                <div class="col-4">
                    <a href="{{URL::to('product-detail='.$sale->id)}}"><img src="{{"public/uploads/".$sale->pro_view.""}}"></a>
                    <a href="{{URL::to('product-detail='.$sale->id)}}"><h4>{{$sale->pro_name}}</h4></a>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <p style="text-align: right; color: red;">{{number_format($sale->pro_price)." VNĐ"}}</p>
                </div>
            @endforeach
        </div>
        <h2 class="title">SẢN PHẨM MỚI</h2>
        <div class="row">
            @foreach($pro_hot as $hot) 
                <div class="col-4">
                    <a href="{{URL::to('product-detail='.$hot->id)}}"><img src="{{"public/uploads/".$hot->pro_view.""}}"></a>
                    <a href="{{URL::to('product-detail='.$hot->id)}}"><h4>{{$hot->pro_name}}</h4></a>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <p style="text-align: right; color: red;">{{number_format($hot->pro_price)." VNĐ"}}</p>
                </div>
            @endforeach
        </div>
        <h2 class="title">SẢN PHẨM HOT</h2>
        <div class="row">
             @foreach($pro_new as $new) 
                <div class="col-4">
                    <a href="{{URL::to('product-detail='.$new->id)}}"><img src="{{"public/uploads/".$new->pro_view.""}}"></a>
                    <a href="{{URL::to('product-detail='.$new->id)}}"><h4>{{$new->pro_name}}</h4></a>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <p style="text-align: right; color: red;">{{number_format($new->pro_price)." VNĐ"}}</p>
                </div>
            @endforeach
        </div>
        <h2 class="title">SẢN PHẨM SẮP HẾT</h2>
        <div class="row">
             @foreach($pro_new as $new) 
                <div class="col-4">
                    <a href="{{URL::to('product-detail='.$new->id)}}"><img src="{{"public/uploads/".$new->pro_view.""}}"></a>
                    <a href="{{URL::to('product-detail='.$new->id)}}"><h4>{{$new->pro_name}}</h4></a>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <p style="text-align: right; color: red;">{{number_format($new->pro_price)." VNĐ"}}</p>
                </div>
            @endforeach
        </div>
    </div>
    <div class="brands">
        <div class="small-container">
            <div class="row">
                 @foreach ($categories as $cate) 

                    <div class="col-5">
                        <a href="{{URL::to('/brand='.$cate->id)}}"><img src="{{"public/uploads/brand/".$cate->c_images.""}}"></a>
                    </div>
                @endforeach
            </div>
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
  var slideIndex = 1;
  showSlides(slideIndex);

  function plusSlides(n) {
    showSlides(slideIndex += n);
  }

  function currentSlide(n) {
    showSlides(slideIndex = n);
  }

  function showSlides(n) {

    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1}    
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";

  }
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
    <script type="text/javascript" src="{{asset("public/frontend/js/jquery-3.3.1.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("public/frontend/js/js.js")}}" ></script>
</body>
</html>