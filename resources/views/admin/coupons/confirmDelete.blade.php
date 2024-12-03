@extends('admin.layouts.app')
@section('title', 'Xác nhận xóa danh mục')
@section('content')
    <h3>Chắc chắn muốn xóa mã "{{$coupon->name}}"?</h3>
    <form action="{{ url('coupons/'.$coupon->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="hidden" name="page" value="{{ $page }}">
        <button type="submit" class="btn btn-danger">Confirm Delete</button>
        <a href="{{ route('coupons.index', $coupon->id) }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
