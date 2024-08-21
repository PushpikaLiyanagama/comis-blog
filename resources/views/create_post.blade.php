<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a Post</title>
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
        .form-container {
            margin: 40px auto;
            padding: 60px;
            width: 60%;
            max-width: 600px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            background-color: #fff;
        }
        .form-group label {
            font-weight: bold;
        }
        .form-control {
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .upload-button {
            display: flex;
            justify-content: center;
            margin-top: 20px;
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
        <h4>Comics Blog - Create a Post</h4>
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

    <section class="form-container">
        <form action="{{ route('submit.post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="comicTitle">Comic Title:</label>
                <input type="text" class="form-control" id="comicTitle" name="comicTitle" placeholder="Enter Comic Title" required>
            </div>
            <div class="form-group">
                <label for="comicImage">Comic Image:</label>
                <input type="file" class="form-control" id="comicImage" name="comicImage" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="comicmDescription">Comic Mini-description:</label>
                <input type="text" class="form-control" id="comicmDescription" name="comicmDescription" placeholder="Enter Short description" required>
            </div>
            <div class="form-group">
                <label for="comicDescription">Comic Description:</label>
                <textarea class="form-control" id="comicDescription" name="comicDescription" rows="5" placeholder="Enter Comic Description" required></textarea>
            </div>
            <div class="upload-button">
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
        </form>
    </section>


    <footer>
        <p>© All Rights Reserved. Developed by Pushpika</p>
    </footer>

    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
