
@extends("layouts.app")
@section("style")

@endsection
@section("content")

    <header class="flex ">
      <a href="{{route('home')}}" class="logo">
        <img class="djelaba-icon" src="../icons/icon.png" alt="djelaba-icon">
      </a>

      <div class="links">

        <a href="{{route('cart')}}" class="cart" href="./pages/cart.html">
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

    <main style="text-align: center;" class="flex ">

      <img alt="" src="{{asset($products->img)}}" />

      <div class="product-details">
        <div style="justify-content: space-between" class="flex">
          <h2>{{$products->nom}}</h2>
          <p class="price"> {{$products->prix}}DH</p>
        </div>

        <p class="description">
        {{$products->desc}} Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus adipisci ullam doloribus, perspiciatis dignissimos vel dolor nam quisquam unde? Ratione laudantium dolor distinctio aperiam tempore inventore explicabo amet fugiat tempora.
        </p>

        <a href="{{route('addtocart',$products->id)}}"  class="flex add-to-cart " style="width: 8rem;height:1.7rem">
          <i class="fa-solid fa-cart-plus"></i>
          Add To Cart
        </a>
      </div>

    </main>



@endsection