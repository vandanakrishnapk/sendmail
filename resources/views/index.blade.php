<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
<div class="container">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4 mt-5 p-4 bg-warning bg-opacity-25">
            <form action="{{ route('do.create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="name" class="form-control" placeholder="Name">
                <input type="email" name="email" class="form-control" placeholder="Email">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <input type="file" name="image" class="form-control">
                <input type="submit" class="btn btn-primary" value="submit"> 
            </form>
        </div>
    </div>
</div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>