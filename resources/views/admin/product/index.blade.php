@extends('admin.layouts.app')
@section('title', 'Products')
@section('content')
    <section class="section">
        <div class="row" id="table-hover-row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="row">
                            <div class="col-md-5">
                                <h1 class="card-title">Danh sách sản phẩm</h1>
                            </div>
                            <div class="col-md-7">
                                <form action="{{ route('products.index') }}" method="GET">
                                    <div class="row g-6">
                                        <div class="col-md-8">
                                            <select name="category" class="form-select">
                                                <option value="" selected>-- Chọn danh mục sản phẩm --</option>
                                                <option value="ao-nam" {{ request()->get('category') == 'ao-nam' ? 'selected' : '' }}>Áo nam</option>
                                                <option value="ao-nu" {{ request()->get('category') == 'ao-nu' ? 'selected' : '' }}>Áo nữ</option>
                                                <option value="quan-nam" {{ request()->get('category') == 'quan-nam' ? 'selected' : '' }}>Quần nam</option>
                                                <option value="quan-nu" {{ request()->get('category') == 'quan-nu' ? 'selected' : '' }}>Quần nữ</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <button type="submit" class="btn btn-primary w-100">Lọc</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <form method="GET" action="{{ route('products.index') }}" class="d-flex">
                            <input type="text" name="search" class="form-control me-2" placeholder="Tìm kiếm sản phẩm"
                                   value="{{ request()->get('search') }}">
                            <button type="submit" class="btn btn-primary">Tìm</button>
                        </form>
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
                                            <a href="{{ route('admin.products.show', ['id' => $product->id, 'page' =>
                                                        request()->get('page')]) }}"
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
