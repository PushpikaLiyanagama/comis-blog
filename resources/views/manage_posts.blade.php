<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Posts</title>
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
        <img src="images/logo.png" alt="Logo Image" class="logo-image">
        <h4>Comics Blog - Manage Posts</h4>
    </header>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('create_post') }}">Create a Post</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('manage_posts') }}">Manage Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Log Out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="container">
        <h2>Manage Posts</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Mini Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->mini_description }}</td>
                    <td>
                        <a href="{{ route('edit_post', $post->id) }}" class="btn btn-info">Edit</a>
                        <form action="{{ route('delete_post', $post->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>

    <footer>
        <p>© All Rights Reserved. Developed by Pushpika</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
