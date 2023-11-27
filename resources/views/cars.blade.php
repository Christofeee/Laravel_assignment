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
                                    <a href="{{ url('cars/' . $car->id . '/edit') }}">
                                        <button type="button" class="btn btn-outline-info">Edit</button>
                                    </a>
                                </div>
                                <div class="ms-3 mr-0">
                                    <form action="{{ url('cars/' . $car->id) }}" method="POST">
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
        <div class="d-flex justify-content-center mt-4">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    @if ($cars->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link"> : </span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $cars->previousPageUrl() }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                    @endif
        
                    @for ($i = 1; $i <= $cars->lastPage(); $i++)
                        <li class="page-item {{ $i == $cars->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $cars->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
        
                    @if ($cars->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $cars->nextPageUrl() }}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <span class="page-link"> : </span>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
        

        <form class="container bg-light mt-5" action="cars" method="POST">
            @csrf
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
                    <label for="name">Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="Enter name..." name="name"
                        value="{{ old('name') }}">
                    @error('name')
                        <p class="text-danger text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col p-3">
                    <label for="price">Price <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="Enter price..." name="price"
                        value="{{ old('price') }}">
                    @error('price')
                        <p class="text-danger text-sm">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="p-3">
                <label for="description">Description</label>
                <textarea class="form-control" rows="5" id="description" placeholder="Enter description..." name="description">{{ old('description') }}</textarea>
            </div>
            <div class="text-end p-3">
                <button type="submit" class="btn btn-info">Add</button>
            </div>
        </form>
    </div>
@endsection
