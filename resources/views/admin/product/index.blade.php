@extends('admin.layouts.app')
@section('title', 'Products')
@section('content')
    <section class="section">
        <div class="row" id="table-hover-row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h1 class="card-title">Danh sách sản phẩm</h1>
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
