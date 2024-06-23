<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <table class="table mt-5">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Body</th>
                <th scope="col">Controller</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($deletedpost as $post)
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>{{$post->title}}</td>
                    <td>{{$post->body}}</td>
                    <td>
                        <a href="{{route('posts.restore',$post->id)}}"><button type="button" class="btn btn-primary me-2">Restore</button></a>
                        <form action="{{route('posts.delete',$post->id)}}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>

                        </form>
                        
                    </td>
                  </tr>
                    
                @endforeach
            </tbody>
          </table>
    </div>
</body>
</html>