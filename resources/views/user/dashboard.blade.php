@extends("layouts.app")
@section("content")

<div class="top-img">
      <header id="headerElement" class="flex">
        <div class="logo" >
         <a href="{{route('home')}}"> <img  class="djelaba-icon" src="./icons/icon.png" alt="djelaba-icon"></a>

        </div>
        <div style="font-size: 30px; letter-spacing: 1px;font-weight: 500; color: #9c8503;">Djellaba</div>
        <div class="links">

            <a style="padding-left:5px"  href="{{route('cart')}}" class="cart" href="./pages/cart.html">
              <i class="fa-solid fa-cart-shopping"></i>
              {{ Auth::user()->products->sum("prix") }} DH
              <span class="products-number">{{ Auth::user()->products->count() }}</span>
            </a>

            <div class="user-info d-inline">{{ Auth::user()->name }}</div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
              @csrf
              <button type="submit" class="logout-button">Log out</button>
            </form>

        </div>
      </header>

      <section class="content">
        <p class="lifestyle">Lifestyle collection</p>
        <p class="men">MEN</p>
        <p class="sale">SALE UP TO <span>30% OFF</span></p>
        <p class="free-shipping">Get Free Shipping on orders over $99.00</p>
        <button>Shop Now</button>
      </section>
    </div>

    <main class="">
      <h1 class="recommended">
        <i class="fa-solid fa-check"></i>
        Recommended for you
      </h1>

      <section class="products flex">





@foreach ($products as $product)
<article class="card">
    <a href="{{route("details",$product->id)}}">
      <img width="266" src="{{$product->img}}" alt="" srcset="" />
    </a>

    <div style="width: 266px" class="content">
      <h1 class="title">{{$product->nom}}</h1>
      <p class="description">
        {{$product->desc}}
      </p>

      <div
        class="flex"
        style="justify-content: space-between; padding-bottom: 0.7rem"
      >
        <div class="price">{{$product->prix}} dh</div>

        <a href="{{route('addtocart',$product->id)}}"  class="add-to-cart flex">
          <i class="fa-solid fa-cart-plus"></i>
          Add To Cart
        </a>
      </div>
    </div>
  </article>
@endforeach

      </section>
    </main>
    @endsection




