@extends('admin.layouts.app')
@section('title', 'Sửa mã giảm giá')
@section('content')
    <form action="{{ route('coupons.update', $coupon->id) }}" method="POST" enctype="multipart/form-data" class="form">
        @csrf
        @method('PUT')
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Sửa mã giảm giá</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">

                                    <!-- Tên mã -->
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input
                                                type="text"
                                                id="name"
                                                class="form-control"
                                                placeholder="Name"
                                                name="name"
                                                style="text-transform: uppercase"
                                                value="{{ old('name', $coupon->name) }}">
                                            @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Loại mã (type) -->
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="type">Type</label>
                                            <select
                                                id="type"
                                                class="form-control"
                                                name="type">
                                                <option value="money" {{ old('type', $coupon->type) == 'money' ?
                                                    'selected' : '' }}>Money
                                                </option>
                                                <option value="fixed" {{ old('type', $coupon->type) == 'fixed' ?
                                                    'selected' : '' }}>Giảm giá cố định
                                                </option>
                                            </select>
                                            @error('type')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Giá trị (value) -->
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="value">Value</label>
                                            <input
                                                type="number"
                                                id="value"
                                                class="form-control"
                                                placeholder="%"
                                                name="value"
                                                value="{{ old('value', $coupon->value) }}">
                                            @error('value')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Ngày hết hạn (expiry date) -->
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="expiry_date">Expiry Date</label>
                                            <input
                                                type="date"
                                                id="expiry_date"
                                                class="form-control"
                                                name="expiry_date"
                                                value="{{ old('expiry_date', $coupon->expiry_date) }}">
                                            @error('expiry_date')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Nút Submit -->
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <a href="{{ route('coupons.index') }}"
                                           class="btn btn-light-secondary me-1 mb-1">Back</a>
                                    </div>
                                </div>

                                <!-- Thông báo thành công -->
                                @if (session('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
@endsection
