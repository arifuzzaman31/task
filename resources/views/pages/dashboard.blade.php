@extends('layout.app')
@section('content')
<div class="row layout-top-spacing">
    <div class="col-12 layout-spacing m-auto">
        <h2>Dashboard Content</h2>
    </div>
    <div>
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Product Import</h5>
                    <small class="text-muted">failled</small>
                </div>
                <p class="mb-1">Product import part was not done due to version mismatch and depreciation of the
                    interface method.</p>
            </a>
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Product Export</h5>
                    <small class="text-muted">failled</small>
                </div>
                <p class="mb-1">Product Export part was not done due to version mismatch and depreciation of the
                    interface method.</p>
            </a>
        </div>
    </div>
</div>
@endsection