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
        <table class="table align-middle">
            <thead class="table-info">
                <tr>
                    <td>Name</td>
                    <td>Description</td>
                    <td>Price</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($cars as $car)
                    <tr>
                        <td>{{ $car->name }}</td>
                        <td>{{ $car->description }}</td>
                        <td>${{ $car->price }}</td>
                        <td>
                            <div class="d-flex justify-between">
                                <div>
                                    <a href="{{ url('cars/'.$car->id.'/edit') }}">
                                        <button type="button" class="btn btn-outline-info">Edit</button>
                                    </a>
                                </div>
                                <div class="ms-3 mr-0">
                                    <form action="{{ url('cars/'.$car->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if(session('success'))
            <div class="bg-info p-4 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="bg-danger p-4 rounded-md mb-4">
                {{ session('error') }}
            </div>
        @endif
        <form class="container bg-light mt-5" action="cars" method="POST">
            @csrf
            <div class="row">
                <div class="col p-3">
                    <label for="name">Enter name:</label>
                    <input type="text" class="form-control" placeholder="Enter name..." name="name" value="{{ old('name') }}">
                    @error('name')
                      <p class="text-danger text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col p-3">
                    <label for="price">Enter price:</label>
                    <input type="text" class="form-control" placeholder="Enter price..." name="price" value="{{ old('price') }}">
                    @error('price')
                      <p class="text-danger text-sm">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="p-3">
                <label for="description">Enter description:</label>
                <textarea class="form-control" rows="5" id="description" placeholder="Enter description..." name="description">{{ old('description') }}</textarea>
            </div>
            <div class="text-end p-3">
                <button type="submit" class="btn btn-info">Add</button> 
            </div>
        </form>
    </div>

</body>

</html>
