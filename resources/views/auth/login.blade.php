<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign in</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="shortcut icon" href="../images/bag-shopping-solid.svg" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../css/global.css" />
    <link rel="stylesheet" href="../css/header.css" />
    <link rel="stylesheet" href="../css/footer.css" />
    <style>
        .fa-solid {
            color: white;
        }

        body {
            text-shadow: 0 0.05rem 0.1rem rgba(0, 0, 0, 0.5);
            box-shadow: inset 0 0 5rem rgba(0, 0, 0, 0.5);
        }

        main {
            max-width: 500px;
        }

        footer {
            background-color: transparent;
        }
    </style>
</head>

<body
    style="
      height: 100vh;
      display: grid;
      grid-template-rows: auto 1fr auto;
      align-items: center;
    "
    class="text-center text-bg-dark">
    <header class="flex">
        <a href="/" class="logo">
            <img class="djelaba-icon" src="../icons/icon.png" alt="djelaba-icon">
        </a>

        <div class="links">

            <a class="sign-in border" href="{{ route('login') }}">
                <i class="fa-solid fa-right-to-bracket"></i>
                Sign in</a>
            <a class="register " href="{{ route('register') }}">
                <i class="fa-solid fa-user-plus"></i>
                Register</a>
        </div>
    </header>

    <main class="px-3">
        <form method="POST" action="{{ route('login') }}" style="text-align: left">
            @csrf

            <div class="mb-4">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input value="{{ old('email') }}" name="email" type="email" class="form-control"
                    id="exampleInputEmail1" aria-describedby="emailHelp" />
             @error('email')
                <small style="color:red">{{ $message }} <i class="fas fa-exclamation-triangle"></i></small>
            @enderror
        </div>

            <div class="mb-4">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1" />
                
            </div>

            <div class="mb-3 form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="exampleCheck1">remember me</label>
            </div>
            <button type="submit" class="btn btn-primary">Sign in</button>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </form>
    </main>

    <footer class="lead">

        <div class="cope"></div>
    </footer>
    <script>
        const foot = document.querySelector('.cope')
        const year = new Date().getFullYear()
        foot.innerHTML = `© <strong style="color:yellow ">${year}</strong> `
    </script>
</body>

</html>
