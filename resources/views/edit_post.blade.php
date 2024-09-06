<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
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
        <img src="/images/logo.png" alt="Logo Image" class="logo-image">
        <h4>Comics Blog - Edit Post</h4>
    </header>

    <section class="form-container">
        <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="comicTitle">Comic Title:</label>
                <input type="text" class="form-control" id="comicTitle" name="comicTitle" value="{{ $post->title }}" required>
            </div>

            <div class="form-group">
                <label for="comicImage">Comic Image:</label>
                <input type="file" class="form-control" id="comicImage" name="comicImage" accept="image/*">
                <small>Leave blank if you don't want to change the image</small>
            </div>

            <div class="form-group">
                <label for="comicmDescription">Comic Mini-description:</label>
                <input type="text" class="form-control" id="comicmDescription" name="comicmDescription" value="{{ $post->mini_description }}" required>
            </div>

            <div class="form-group">
                <label for="comicDescription">Comic Description:</label>
                <textarea class="form-control" id="comicDescription" name="comicDescription" rows="5" required>{{ $post->description }}</textarea>
            </div>

            <div class="upload-button">
                <button type="submit" class="btn btn-primary">Update</button>
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
