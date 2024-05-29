<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home Page</title>
    <link rel="stylesheet" href="{{asset('css/global.css')}}" />
    <link rel="stylesheet" href="{{asset("css/header.css")}}" />
    <link
      rel="shortcut icon"
      href="./images/bag-shopping-solid.svg"
      type="image/x-icon"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="{{asset('css/pages/index.css')}}" />
    <link rel="stylesheet" href="{{asset('css/footer.css')}}" />
    <link rel="stylesheet" href="{{asset("css/pages/cart.css")}}" />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    
    @yield('styles')
  </head>
<body
@yield("style")>
    @yield('content')
    <footer>
        Designed and developed by
        <span>taha triqui <span style="color: white"> &</span> imad antar </span>
        © 2024.
      </footer>

  <script src="./js/main.js"></script>
</body>
</html>
