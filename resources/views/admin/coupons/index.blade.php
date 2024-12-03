@extends('admin.layouts.app')
@section('title', 'Coupons')
@section('content')
    <section class="section">
        <div class="row" id="table-hover-row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="card-title">Mã giảm giá</h1>
                                <a href="{{route('coupons.create')}}" type="submit"
                                   class="btn btn-primary">Create</a>
                            </div>
                        </div>
                        <form method="GET" action="{{ route('coupons.index') }}" class="d-flex">
                            <input type="text" name="search" class="form-control me-2" placeholder="Tìm kiếm"
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
                                <th>TYPE</th>
                                <th>VALUE</th>
                                <th>EXPIRY DATE</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($coupons as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{ $item->type}}</td>
                                    <td>{{ $item->value}}</td>
                                    <td>{{ $item->expiry_date}}</td>
                                    <td>
                                        <div>
                                            <a href="{{ route('coupons.edit', ['coupon' => $item->id, 'page' =>
                                                request()->get('page')]) }}"
                                               class="btn btn-outline-primary">Chỉnh sửa</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <a href="{{route('coupons.confirmDestroy', ['id' => $item->id, 'page' =>
                                                request()->get('page')]) }}"
                                                class="btn btn-outline-danger">Xóa</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$coupons->links()}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
