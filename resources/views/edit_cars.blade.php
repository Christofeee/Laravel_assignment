<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Chris' cars</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Styles -->
</head>

<body class="">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="#">Chris' cars</a>
            
            <form class="form-inline my-2 my-lg-0">
                <div class="input-group">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </nav>

    <br>
    <br>

    <div class="table-responsive">
        <form class="container bg-light mt-5" action="{{ url('cars/'.$car->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col p-3">
                    <label for="name">Enter name:</label>
                    <input type="text" class="form-control" value={{ $car->name}} name="name">
                </div>
                <div class="col p-3">
                    <label for="price">Enter price:</label>
                    <input type="text" class="form-control" value={{ $car->price}} name="price">
                </div>
            </div>
            <div class="p-3">
                <label for="description">Enter description:</label>
                <textarea class="form-control" rows="5" id="description" name="description">{{ $car->description}}</textarea>
            </div>
            <div class="text-end p-3">
                <button type="submit" class="btn btn-info">Update</button>    
            </div>
        </form>
    </div>

</body>

</html>