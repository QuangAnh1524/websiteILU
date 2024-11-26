@extends('admin.layouts.app')
@section('title', 'Products')
@section('content')
    <form action="/products" class="form" method="post" enctype="multipart/form-data">
        @csrf
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Thêm sản phẩm</h4>
                    </div>
                    <div class="card-content">
                        <section class="card-body">
                            <form class="form">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Name</label>
                                            <input type="text" id="first-name-column" class="form-control"
                                                   placeholder="Name" name="name">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Description</label>
                                            <input type="text" id="last-name-column" class="form-control"
                                                   placeholder="Description" name="description">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Sale %</label>
                                            <input type="text" id="city-column" class="form-control"
                                                   placeholder="%" name="sale">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="price-column">Price</label>
                                            <div class="input-group">
                                                <span class="input-group-text">VNĐ</span>
                                                <input type="text" id="price-column" class="form-control"
                                                       placeholder="Enter price" name="price">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" class="form-control" id="image" name="image_path" accept="image/*">
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit"
                                                class="btn btn-primary me-1 mb-1">Submit
                                        </button>
                                        <button type="reset"
                                                class="btn btn-light-secondary me-1 mb-1">Reset
                                        </button>
                                    </div>
                                </div>
                                @if (session('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif
                            </form>
                        </section>
@endsection
