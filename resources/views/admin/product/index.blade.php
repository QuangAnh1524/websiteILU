@extends('admin.layouts.app')
@section('title', 'Products')
@section('content')
    <section class="section">
        <div class="row" id="table-hover-row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row mb-3">
                            <div class="col-md-5">
                                <h1 class="card-title">Danh sách sản phẩm</h1>
                            </div>
                            <div class="col-md-7">
                                <form action="{{ route('products.index') }}" method="GET">
                                    <div class="row g-2">
                                        <div class="col-md-6">
                                            <select name="category" class="form-select">
                                                <option value="" {{ request()->get('category') == '' ? 'selected' : '' }}>
                                                    -- Chọn danh mục sản phẩm --
                                                </option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->slug }}"
                                                        {{ request()->get('category') == $category->slug ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <select name="sort_by" class="form-select">
                                                <option value="id" {{ request()->get('sort_by') == 'id' ? 'selected' : '' }}>Mặc định</option>
                                                <option value="name" {{ request()->get('sort_by') == 'name' ? 'selected' : '' }}>Tên</option>
                                                <option value="price" {{ request()->get('sort_by') == 'price' ? 'selected' : '' }}>Giá</option>
                                                <option value="created_at" {{ request()->get('sort_by') == 'created_at' ? 'selected' : '' }}>Ngày tạo</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <select name="sort_direction" class="form-select">
                                                <option value="asc" {{ request()->get('sort_direction') == 'asc' ? 'selected' : '' }}>Tăng dần</option>
                                                <option value="desc" {{ request()->get('sort_direction') == 'desc' ? 'selected' : '' }}>Giảm dần</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <input type="text" name="search" class="form-control"
                                                       placeholder="Tìm kiếm sản phẩm"
                                                       value="{{ request()->get('search') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <select name="per_page" class="form-select">
                                                <option value="5" {{ request()->get('per_page') == 5 ? 'selected' : '' }}>5 sản phẩm</option>
                                                <option value="10" {{ request()->get('per_page') == 10 ? 'selected' : '' }}>10 sản phẩm</option>
                                                <option value="15" {{ request()->get('per_page') == 15 ? 'selected' : '' }}>15 sản phẩm</option>
                                                <option value="0" {{ request()->get('per_page') == 20 ? 'selected' : '' }}>20 sản phẩm</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-12 text-end">
                                            <button type="submit" class="btn btn-primary">Áp dụng bộ lọc</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>DESCRIPTION</th>
                                <th>PRICE</th>
                                <th>SALE %</th>
                                <th>ACTION</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->sale}}</td>
                                    <td>
                                        <div>
                                            <a href="{{ route('admin.products.show', ['id' => $product->id, 'page' => request()->get('page')]) }}"
                                               class="btn btn-outline-primary">Chi tiết</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$products->links()}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
