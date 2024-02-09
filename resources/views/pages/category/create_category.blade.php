@extends('layout.app')
@section('title', 'Create Category | 2AIT')
@section('content')
<div class="row" style="width: 95%;padding: 25px 0;">
    <div id="flFormsGrid" class="col-lg-6 offset-md-3 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Create Category</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                @include('partials.message')
                <form method="post" action="{{ route('categories.store')}}">
                    @csrf
                    <div class="form-row mb-4">
                        <div class="form-group col-md-12">
                            <label for="cateName">Category Name</label>
                            <input type="text" name="category_name" class="form-control" id="cateName"
                                placeholder="Category Name">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputState">Status</label>
                            <select id="status" name="status" class="form-control">
                                <option selected value="1">Active</option>
                                <option value="0">Deactive</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection