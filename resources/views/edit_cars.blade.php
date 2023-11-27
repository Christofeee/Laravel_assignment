@extends('layouts.app')

@section('content')
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
        <form class="container bg-light mt-5" action="{{ url('cars/' . $car->id) }}" method="POST">
            @csrf
            @method('PUT')
            @if (session('success'))
                <div class="bg-info text-white p-4 rounded-md mb-4">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="bg-danger text-white p-4 rounded-md mb-4">
                    {{ session('error') }}
                </div>
            @endif
            <div class="row">
                <div class="col p-3">
                    <label for="name">Enter name:</label>
                    <input type="text" class="form-control" value={{ old('name') ?? $car->name }} name="name">
                    @error('name')
                        <p class="text-danger text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col p-3">
                    <label for="price">Enter price:</label>
                    <input type="text" class="form-control" value={{ old('price') ?? $car->price }} name="price">
                    @error('price')
                        <p class="text-danger text-sm">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="p-3">
                <label for="description">Enter description:</label>
                <textarea class="form-control" rows="5" id="description" name="description">{{ old('description') ?? $car->description }}</textarea>
            </div>
            <div class="text-end p-3">
                <button type="submit" class="btn btn-info">Update</button>
            </div>
        </form>
    </div>
@endsection
