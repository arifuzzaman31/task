@extends('layout.app')
@section('title', 'Edit Product | 2AIT')
@section('content')
<div id="tableHover" class="col-lg-6 offset-md-2 col-12 layout-spacing" style="padding: 15px 0;">
    <div class="widget-content widget-content-area">
        @include('partials.message')
        <form method="POST" action="{{ route('products.update',$product->id)}}">
            @csrf
            @method('PUT')
            <div class="form-row mb-4">
                <div class="form-group col-md-12">
                    <label for="productName">Name</label>
                    <input type="text" name="product_name" value="{{ $product->name}}" class="form-control"
                        id="productName" placeholder="Product Name">
                </div>
                <div class="form-group col-md-12">
                    <label for="category">Category</label>
                    <select id="category" name="category" class="form-control">
                        @forelse ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $category->id == $product->category_id ? 'selected' : '' }}>
                            {{ $category->category_name }}
                        </option>
                        @empty
                        <option disabled selected value="">No Category</option>
                        @endforelse
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <label for="price">Price</label>
                    <input type="number" name="price" value="{{ $product->price}}" class="form-control" id="price"
                        placeholder="Product Name">
                </div>
                <div class="form-group col-md-12">
                    <label for="quantity">Quantity</label>
                    <input type="number" name="quantity" value="{{ $product->quantity}}" class="form-control"
                        id="quantity" placeholder="Product Quantity">
                </div>
                <div class="form-group col-md-12">
                    <label for="inputState">Status</label>
                    <select id="status" name="status" class="form-control">
                        <option selected value="1">Active</option>
                        <option value="0">Deactive</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Update</button>
        </form>
    </div>
</div>

<!-- end modal -->
@endsection

@push('script')
<script src="{{ asset('js/product.js')}}"></script>
@endpush