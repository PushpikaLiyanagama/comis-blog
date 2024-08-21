<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Comic Sans MS', cursive, sans-serif;
        }
        .logo {
            text-align: center;
            padding: 20px 0;
        }
        .logo-image {
            width: 100px;
            height: 80px;
        }
        .navbar {
            position: sticky;
            top: 0;
            z-index: 1000;
            background-color: #f8f9fa;
        }
        .navbar-nav {
            margin: 0 auto;
            gap: 30px;
        }
        .navbar-nav .nav-item {
            flex-grow: 1;
            text-align: center;
        }
        .post-image {
            display: block;
            margin: 20px auto;
            width: 50%;
            max-width: 400px;
            height: auto;
            border-radius: 15px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }
        .post-title {
            text-align: center;
            margin: 20px 0;
            font-size: 2em;
        }
        .post-description {
            text-align: center;
            margin: 20px 0;
            font-size: 1.2em;
        }
        footer {
            text-align: center;
            padding: 10px 0;
            background-color: #f8f9fa;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <header class="logo">
        <img src="{{ asset('images/logo.png') }}" alt="Logo Image" class="logo-image">
        <h4>Comics Blog - Post Details</h4>
    </header>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('create_post') }}">Create a Post</a>
                    </li>
                    <li class="nav-item">
                        @auth
                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Log Out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @else
                            <a class="nav-link" href="{{ route('login') }}">Log In</a>
                        @endauth
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="container">
        <img src="{{ asset($post->image_path) }}" alt="Post Image" class="post-image">
        <h2 class="post-title">{{ $post->title }}</h2>
        <p class="post-description">{{ $post->description }}</p>
    </section>

    <footer>
        <p>© All Rights Reserved. Developed by Pushpika</p>
    </footer>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
