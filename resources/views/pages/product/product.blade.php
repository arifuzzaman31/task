@extends('layout.app')
@section('title', 'Product | 2AIT')
@section('content')
<div id="tableCheckbox" class="col-lg-12 col-12 layout-spacing" style="padding: 25px 0;">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12 d-flex justify-content-between">
                    <h4 class="mx-2">Product</h4>
                    <div class="text-center mr-2">
                        <form method="POST" action="{{ route('import.products') }}" class="d-inline">
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn btn-success btn-sm mx-1">Import</button>
                        </form>
                        <a type="button" href="{{ route('export.products') }}" class="btn btn-info mb-2 mr-3">Export</a>
                        <a type="button" href="{{ route('products.create') }}" class="btn btn-primary mb-2 mr-3">Create
                            New</a>

                    </div>
                </div>
            </div>
        </div>
        <div id="tableHover" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox">
                <div class="widget-content widget-content-area">
                    <div class="table-responsive">
                        @include('partials.message')
                        <table class="table table-bordered table-hover mb-4">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($products as $product)
                                <tr>
                                    <td>{{ $product->id}}</td>
                                    <td>{{ $product->name}}</td>
                                    <td>{{ $product->category->category_name}}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td class="text-center">{{$product->status == 1 ? "Active" : "Deactive"}}</td>
                                    <td class="text-center">
                                        <form method="POST" action="{{ route('products.purchase', $product->id) }}"
                                            class="d-inline" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('POST')
                                            <button type="submit" class="btn btn-success btn-sm mx-1">Purchase</button>
                                        </form>
                                        <a href="{{ route('products.edit',$product->id)}}"
                                            class="btn btn-info btn-sm mx-1">Edit</a>
                                        <form method="POST" action="{{ route('products.destroy', $product->id) }}"
                                            class="d-inline"
                                            onsubmit="return confirm('Are you sure you want to delete this product?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm mx-1">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <p>No product</p>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $products->links() }}
                    </div>

                </div>
            </div>
        </div>


    </div>
</div>
@endsection