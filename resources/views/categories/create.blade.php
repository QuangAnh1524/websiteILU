@extends('admin.layouts.app')
@section('title', 'Thêm danh mục')
@section('content')
    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data" class="form">
        @csrf
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Thêm danh mục</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <!-- Tên danh mục -->
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="name">Tên danh mục</label>
                                            <input
                                                type="text"
                                                id="name"
                                                class="form-control"
                                                placeholder="Tên danh mục"
                                                name="name"
                                                value="{{ old('name') }}">
                                            @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Danh mục cha -->
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="parent_id">Danh mục cha</label>
                                            <select id="parent_id" name="parent_id" class="form-control">
                                                <option value="">-- Chọn danh mục cha (nếu có) --</option>
                                                @foreach ($parentCategory as $category)
                                                    <option
                                                        value="{{ $category->id }}"
                                                        {{ old('parent_id') == $category->id ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('parent_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Nút Submit -->
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <a href="{{route('categories.index')}}"
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
