@extends('admin.layouts.app')
@section('title', '')
@section('content')
    <h3>Chắc chắn muốn xóa sản phẩm "{{$product->name}}"?</h3>
    <form action="{{ url('products/'.$product->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="hidden" name="page" value="{{ $page }}">
        <button type="submit" class="btn btn-danger">Confirm Delete</button>
        <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
