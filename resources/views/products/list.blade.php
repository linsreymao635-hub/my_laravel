@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{ route('products.create') }}" class="btn btn-info"> create+</a>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $index => $product)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>
                            <a href="" data-bs-toggle="modal" data-bs-target="#showProduct{{ $product->id }}">
                                <i class="fa-solid fa-eye text-success"></i>
                            </a>
                            |
                            <a href="{{ route('products.edit', $product->id) }}">
                                <i class="fa-solid fa-pen-to-square text-info"></i>
                            </a>
                            |
                            <a href="" data-bs-toggle="modal"
                                data-bs-target="#deleteProduct{{ $product->id }}">
                                <i class="fa-solid fa-trash text-danger"></i>
                            </a>
                            @include('products.show')
                            @include('products.delete')
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection