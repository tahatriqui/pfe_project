@extends("layouts.app")

@section("content")
<header id="headerElement" class="flex" style="">
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

  <main style="text-align: center" class="">
    <section class="cart">
        @foreach ($products as $item)
            <article style="" class="product flex ">
                <form action="{{route("cart.delete",$item->id)}}" method="post">
                    @csrf
                    @method("DELETE")
                    <button>
                        <i class="fa-solid fa-trash-can"> </i>
                    </button>
                </form>
                <p class="price">{{$item->prix}}</p>
                {{-- <div class="flex" style="margin-right: 1rem">
                <button class="decrease">-</button>
                <div class="quantity flex">3</div>
                <button class="increase">+</button>
                </div> --}}
                <p class="title">{{$item->nom}}</p>
                <img
                style="border-radius: 0.22rem"
                width="70"
                height="70"
                alt=""
                src="{{$item->img}}"
                />
            </article>
        @endforeach
    </section>
    <form method="POST" action="{{route('clear.cart')}}">
        @csrf
        @method("DELETE")
    <button type="submit" class="clear">
      <i
        style="color: #fff; margin-right: 0.2rem"
        class="fa-solid fa-trash-can icon"
      >
      </i>
    clear cart
    </button>
</form>
    <section class="summary">
      <h1>Cart Summary</h1>

      <div class="flex">
        <p class="Subtotal">Subtotal</p>
        <p>{{ Auth::user()->products->sum("prix") }} DH</p>
      </div>
      <button  class="checkout">CHECKOUT</button>
    </section>
  </main>

    <script>
        document.addEventListener("scroll", function() {
            const header = document.getElementById('headerElement');
            if (window.scrollY > 0) {
                header.style.backgroundColor = 'var(--footer-bg)';
                header.style.color = 'var(--white)';
                header.style.marginTop = '-30px';
            } else {
                header.style.backgroundColor = '';
                header.style.color = '';
                header.style.marginTop = '';
            }
        });
    </script>
@endsection



