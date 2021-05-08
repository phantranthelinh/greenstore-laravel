@extends('welcome')
@section('content-product')
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
                                            <li><a href="brand_detail.php">{{$cate->c_name}}</a></li>
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
                        <a href="cart.php"><img src="{{asset('public/frontend/images/cart.png')}}" width="30px" height="30px"></a>
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
             @foreach ($pro as $p )
            <div class="col-4">
                <a href="{{('product-detail='.$p->id)}}"><img src="{{"public/uploads/".$p->pro_view.""}}"></a>
                <a href="{{('product-detail='.$p->id)}}"><h4>{{$p->pro_name}}</h4></a>
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
</script>
@endsection