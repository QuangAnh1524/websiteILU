@extends('admin.layouts.app')
@section('title', 'Chi tiết Sản phẩm')
@section('content')
    <h3>Are you sure you want to delete "{{$product->name}}"?</h3>
    <form action="{{ url('products/'.$product->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Confirm Delete</button>
        <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
