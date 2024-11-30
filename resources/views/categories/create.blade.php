@extends('admin.layouts.app')
@section('title', 'Products')
@section('content')
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="form">
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
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" id="name" class="form-control" placeholder="Name"
                                                   name="name" value="{{ old('name') }}">
                                            @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea id="description" class="form-control" placeholder="Description"
                                                      name="description">{{ old('description') }}</textarea>
                                            @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="sale">Sale %</label>
                                            <input type="number" id="sale" class="form-control" placeholder="%"
                                                   name="sale" value="{{ old('sale') }}" min="0" max="100">
                                            @error('sale')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <div class="input-group">
                                                <span class="input-group-text">VNĐ</span>
                                                <input type="number" id="price" class="form-control"
                                                       placeholder="Enter price" name="price" value="{{ old('price') }}"
                                                       min="0">
                                            </div>
                                            @error('price')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="dropdown">
                                            <label for="categories">Categories</label>
                                            <select id="categories" name="categories" class="form-control">
                                                <option value="">-- Select a category --</option>
                                                @foreach ($categories as $category)
                                                    <option
                                                        value="{{ $category->id }}" {{ old('categories') ==
                                                                                    $category->id ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('categories')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" class="form-control" id="image" name="image_path"
                                               accept="image/*">
                                        @error('image_path')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                                @if (session('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
@endsection
