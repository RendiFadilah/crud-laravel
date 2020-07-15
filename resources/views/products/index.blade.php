@extends('products.layout')

@section('content')

<div class="row">
    <div class="col-lg-12  p-5" style="margin-top: 50px">
        <div class="pull-left">
            <h2>Laravel 7 CRUD</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
        </div>
    </div>
</div>

@if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered" style="margin-top: 20px">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Details</th>
        <th width="280px">Action</th>
    </tr>

    @foreach ($products as $product)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->detail }}</td>
        <td>

            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                <a href=" {{ route('products.show', $product->id) }}" class="btn btn-info">Show</a>
                <a href=" {{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $products->links() !!}

@endsection
