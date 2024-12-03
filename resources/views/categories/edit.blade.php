@extends('admin.layouts.app')
@section('title', 'Category')
@section('content')
    <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data" class="form">
        @csrf
        @method('PUT')
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Sửa danh mục</h4>
                        </div>
                        <div class="card-content">
                            <section class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" id="name" class="form-control" placeholder="Name"
                                                   name="name" value="{{ old('name') ?? $category->name }}">
                                            @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                @if($category->children->count() < 1)
                                <div class="col-md-6 col-12">
                                    <div class="dropdown">
                                        <label for="categories">Parent Category</label>
                                        <select id="categories" name="parent_id" class="form-control">
                                            <option value="">-- Select parent category --</option>
                                            @foreach ($parentCategory as $item)
                                                <option
                                                    value="{{ $item->id }}" {{ old('categories') ==
                                                                                    $item->id ? 'selected' : '' }}>
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('categories')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                @endif
                                <input type="hidden" name="page" value="{{ request()->get('page') }}">
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    <a href="{{route('categories.index', ['page' => request() -> get('page')])}}"
                                       class="btn btn-light-secondary me-1 mb-1">Back</a>
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
