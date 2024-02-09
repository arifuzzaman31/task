@extends('layout.app')
@section('title', 'Product | 2AIT')

@section('content')
<div id="tableHover" class="col-lg-6 offset-md-3 col-12 layout-spacing" style="padding: 15px 0;">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12 d-flex justify-content-between">
                    <h4>Create Product</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="widget-content widget-content-area">
        @include('partials.message')
        <form method="post" action="{{ route('products.store')}}">
            @csrf
            <div class="form-row mb-4">
                <div class="form-group col-md-12">
                    <label for="productName">Name</label>
                    <input type="text" name="product_name" class="form-control" id="productName"
                        placeholder="Product Name">
                </div>
                <div class="form-group col-md-12">
                    <label for="category">Category</label>
                    <select id="category" name="category" class="form-control">
                        @forelse ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @empty
                        <option disabled selected value="">No Category</option>
                        @endforelse
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <label for="price">Price</label>
                    <input type="number" name="price" class="form-control" id="price" placeholder="Product Name">
                </div>
                <div class="form-group col-md-12">
                    <label for="quantity">Quantity</label>
                    <input type="number" name="quantity" class="form-control" id="quantity"
                        placeholder="Product Quantity">
                </div>
                <div class="form-group col-md-12">
                    <label for="inputState">Status</label>
                    <select id="status" name="status" class="form-control">
                        <option selected value="1">Active</option>
                        <option value="0">Deactive</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Create</button>
        </form>
    </div>
</div>

<!-- end modal -->
@endsection