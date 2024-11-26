@extends('admin.layouts.app')
@section('title', 'Chi tiết Sản phẩm')
@section('content')
    <section class="section">
        <div class="row" id="table-hover-row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Chi tiết "{{$product->name}}"</h1>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $product->id }}</td>
                            </tr>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <td>{{ $product->name }}</td>
                            </tr>
                            <tr>
                                <th>Ảnh</th>
                                <td>
                                    @if($product->image_path)
                                        <img src="{{ asset('images/'.$product->image_path) }}"
                                             alt="{{ $product->name }}"
                                             style="max-width: 200px; height: auto;">
                                    @else
                                        Chưa có ảnh
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Mô tả</th>
                                <td>{{ $product->description }}</td>
                            </tr>
                            <tr>
                                <th>Giá</th>
                                <td>{{ number_format($product->price) }} VND</td>
                            </tr>
                            <tr>
                                <th>Giảm giá</th>
                                <td>{{ $product->sale }}%</td>
                            </tr>
                            <tr>
                                <th>Hành động</th>
                                <td>
                                    <a class="btn btn-outline-primary">Chỉnh sửa</a>
                                    <a  class="btn btn-outline-secondary">Quay lại</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
