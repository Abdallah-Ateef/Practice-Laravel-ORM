<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Include bootstrap -->
    <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
      <form action="{{route('posts.update',$post->id)}}" method="POST">
        @method('PUT')
        @csrf
        <input type="text" name="title" placeholder="Enter title" value="{{$post->title}}"><br><br>
        <input type="text" name="body" placeholder="Enter body" value="{{$post->body}}"><br><br>
        <button type="submit">Submit</button>

      </form>
    </div>
</body>
</html>