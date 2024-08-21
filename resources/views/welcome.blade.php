<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comics Blogs</title>
    <meta name="description" content="Explore and create amazing comics on Comis Blogs, your go-to platform for comic enthusiasts.">
    <meta name="keywords" content="Comics, Blog, Create, Share, Art, Storytelling">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Comic Sans MS', cursive, sans-serif;
            margin: 0;
            padding: 0;
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
            width: 100%;
        }
        .navbar-nav {
            margin: 0 auto;
            gap: 30px;
        }
        .navbar-nav .nav-item {
            flex-grow: 1;
            text-align: center;
        }
        .image-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 20px 0;
            flex-wrap: wrap;
        }
        .image-container .img-fluid {
            height: auto;
        }
        .image01 {
            width: 40%;
            max-height: 400px;
        }
        .image02, .image03 {
            width: 25%;
            max-height: 200px;
        }
        .image01, .image02, .image03 {
            border-radius: 15px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }

        @media (max-width: 768px) {
            .image01 {
                width: 100%;
                max-height: none;
            }
            .image02, .image03 {
                width: 48%;
                max-height: none;
            }
        }

        @media (max-width: 576px) {
            .image01, .image02, .image03 {
                width: 100%;
                max-height: none;
            }
        }

        .post {
            margin: 20px 0;
        }
        .about-section {
            text-align: center;
            margin: 20px 0;
            padding: 20px;
            background-color: #f8f9fa;
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
        <img src="images/logo.png" alt="Comics Blog Logo" class="logo-image">
        <h4>Comics Blog - Site</h4>
    </header>

    <section class="navbar-section">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about-section">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('create_post') }}">Create a Post</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Sign Up</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Log In</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>

    <section class="container image-gallery">
        <div class="image-container">
            <img src="images/image02.jpg" alt="Comic Image 02" class="img-fluid image02">
            <img src="images/image01.jpg" alt="Comic Image 01" class="img-fluid image01">
            <img src="images/image03.jpg" alt="Comic Image 03" class="img-fluid image03">
        </div>
    </section>

    <section class="container blog-posts">
        <div class="row">
            <div class="col-md-12">
                @foreach($posts as $post)
                    <div class="card post">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="{{ asset($post->image_path) }}" alt="{{ $post->title }}" class="card-img">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h2>{{ $post->title }}</h2>
                                    <p class="card-text">{{ $post->mini_description }}</p>
                                    <a href="{{ url('posts/' . $post->id) }}">
                                        <button type="button" class="btn btn-outline-warning">See more...</button>
                                    </a>                                  
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="about-section" class="about-section">
        <h2>About Us Section</h2>
        <br>
        <p>Welcome to Comis, your go-to platform for creating and sharing comics. We believe that everyone has a story to tell, and with Comis, anyone can become a comic creator. Whether you're a seasoned artist or just starting, our user-friendly platform empowers you to publish your comics and reach an audience eager to enjoy your work. Join us, and let your creativity shine!</p>
    </section>

    <footer>
        <p>© All Rights Reserved. Developed by Pushpika</p>
    </footer>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
