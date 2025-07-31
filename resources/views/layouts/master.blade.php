<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('pageTitle')</title>
    <link rel="stylesheet" href="{{URL::asset('css/main.css')}}">
    @yield('headerBlock')
</head>
<body>
    <div id="wrapper">
        <div id="left">
            <h1>Admin Panel</h1>
            <nav>
                <ul>
                    <li><a href="{{route('dashboard')}}">Home</a>|</li>
                    <li><a href="#">Website</a>|</li>
                    <li><a href="{{route('logout')}}">Logout</a></li>
                </ul>
            </nav>
            <div class="box">
                <h2>Products Manager</h2>
                <ul>
                    <li><a href="{{route('products.index')}}">Products Listing</a></li>
                    <li><a href="{{route('products.create')}}">Add New Products</a></li>
                    <li><a href="{{route('products.search')}}">Products Searching</a></li>
                </ul>
            </div>
            <div class="box">
                <h2>Categories Manager</h2>
                <ul>
                    <li><a href="{{route('categories.index')}}">Category Listing</a></li>
                    <li><a href="{{route('categories.create')}}">Add New Category</a></li>
                </ul>
            </div>
           
            <div class="box">
                <h2>User Manager</h2>
                <ul>
                    <li><a href="#">User Listing</a></li>
                    <li><a href="#">Add New User</a></li>
                </ul>
            </div>
        </div>
        <div id="right">
            <div id="rightHeader">
                <div id="hamburgerMenu">
                    <input type="checkbox" name="chkHamburgerMenu" id="chkHamburgerMenu">
                    <label for="chkHamburgerMenu">
                        <div class="line-01"></div>
                        <div class="line-02"></div>
                        <div class="line-03"></div>
                    </label>
                    <div id="wholeLinks">
                        <div class="links">
                            <div class="box">
                                <h2>Products Manager</h2>
                                <ul>
                                    <li><a href="{{route('products.index')}}">Products Listing</a></li>
                                    <li><a href="{{route('products.create')}}">Add New Products</a></li>
                                    <li><a href="{{route('products.search')}}">Products Searching</a></li>
                                </ul>
                            </div>
                            <div class="box">
                                <h2>Category Manager</h2>
                                <ul>
                                    <li><a href="#">Desktops</a></li>
                                    <li><a href="#">Laptops</a></li>
                                    <li><a href="#">Photocopies</a></li>
                                    <li><a href="#">Printers</a></li>
                                    <li><a href="#">Accessories</a></li>
                                </ul>
                            </div>
                             <div class="box">
                                <h2>User Manager</h2>
                                <ul>
                                    <li><a href="#">User Listing</a></li>
                                    <li><a href="#">Add New User</a></li>
                                </ul>
                                </div>
                            </div>
                    </div>
                </div>
                <h1>@yield('rightTitle')</h1>
            </div>
            <div id="toolbar">@yield('toolbar')</div>
           
            <div id="content">@yield('content')</div>
           
        </div>
    </div>
</body>
</html>