@extends('admin.layouts.app')
@section('title', 'Products')
@section('content')
    <form action="/products/{{$product->id}}" class="form" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Chỉnh sửa sản phẩm</h4>
                        </div>
                        <div class="card-content">
                            <section class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Name</label>
                                            <input type="text" id="first-name-column" class="form-control"
                                                   value="{{$product->name}}"
                                                   placeholder="Name" name="name">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Description</label>
                                            <input type="text" id="last-name-column" class="form-control"
                                                   value="{{$product->description}}"
                                                   placeholder="Description" name="description">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Sale %</label>
                                            <input type="text" id="city-column" class="form-control"
                                                   value="{{$product->sale}}"
                                                   placeholder="%" name="sale">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="price-column">Price</label>
                                            <div class="input-group">
                                                <span class="input-group-text">VNĐ</span>
                                                <input type="text" id="price-column" class="form-control"
                                                       value="{{$product->price}}"
                                                       placeholder="Enter price" name="price">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="categories">Categories</label>
                                            <select name="categories[]" id="categories" class="form-control" multiple>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ in_array($category->id, $product->categories->pluck('id')->toArray()) ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Current Image</label>
                                        @if($product->image_path)
                                            <div>
                                                <img src="{{ asset('images/'.$product->image_path) }}"
                                                     alt="Current image"
                                                     style="max-width: 500px; height: auto;">
                                            </div>
                                        @else
                                            <p>No image uploaded</p>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Update Image</label>
                                        <input type="file" class="form-control" id="image"
                                               name="image_path" accept="image/*">
                                    </div>
                                    <input type="hidden" name="page" value="{{ request()->get('page', 1) }}">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit"
                                                class="btn btn-primary me-1 mb-1">Submit
                                        </button>
                                        <a href="{{ route('admin.products.show', $product->id) }}"
                                           class="btn btn-light-secondary me-1 mb-1">Cancel</a>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
@endsection
