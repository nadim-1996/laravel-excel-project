<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>


</head>

<body>

    <nav class="navbar navbar-expand-lg bg-secondary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/dashboard') }}" style="color: beige">Assignment</a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                </ul>
                @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger">Logout</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-success">Login</a>
                            <a href="{{ route('register') }}" class="btn btn-info">Register</a>
                        @endauth
                    </div>
            </div>
        </div>
    </nav>

    <div class="container text-center mt-2">
        @guest
        <div>           
            <img src="/assets/welcome.png" style="height: 50%; width: 30%; margin-bottom: 5px" alt="Italian Trulli">
            <div class="alert alert-warning mt-2 mb-2" style="max-width: 600px; margin: 0 auto;">
                You are not logged in. Please log in to access more features.
            </div>
        </div>
        @endguest
        <div class="m-auto">

            @yield('content')
        </div>
    </div>
    <div class="flex-center position-ref full-height">
        @endif
    </div>

    <footer class="py-3 my-4 border-top">
        <div class="text-center">
            <span class="mb-3 mb-md-0 text-muted">&copy; 2024 Nadim Laskar, Dev</span>
        </div>
    </footer>

</body>

</html>
