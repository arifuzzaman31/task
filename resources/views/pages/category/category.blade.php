@extends('layout.app')
@section('title', 'Category | 2AIT')
@section('content')
<div id="tableHover" class="col-lg-12 col-12 layout-spacing" style="padding: 25px 0;">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row" style="width:99%">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12 d-flex justify-content-between mx-3">
                    <h4>Category</h4>
                    <a href="{{ route('categories.create')}}" class="btn btn-primary mb-2 mr-3">Add New</a>
                </div>
            </div>
        </div>
        <div id="tableHover" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox">
                <div class="widget-content widget-content-area">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-4">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Category</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                <tr>
                                    <td>1</td>
                                    <td>{{$category->category_name}}</td>
                                    <td class="text-center">{{$category->status == 1 ? "Active" : "Deactive"}}</td>
                                    <td class="text-center">
                                        <a class="btn btn-danger btn-sm mx-1">Delete</a>
                                    </td>
                                </tr>
                                @empty
                                <p>No category</p>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $categories->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection