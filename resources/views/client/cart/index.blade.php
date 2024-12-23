<!-- Featured Start -->
@extends('client.layouts.app')
@section('title', 'Cart')
@section('content')


    <div class="row px-xl-5">
        @if (session('message'))
            <div class="row">
                <h3 class="text-danger">{{ session('message') }}</h3>
            </div>
        @endif
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                <tr>
                    <th>Products</th>
                    <th>Price</th>
                    <th>Size</th>
                    <th>Sale</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody class="align-middle">
                @foreach ($cart->cartProducts as $item)
                    <tr id="row-{{ $item->id }}">
                        <td class="align-middle"><img src="{{ $item->product->image_path }}" alt=""
                                                      style="width: 50px;">
                            {{ $item->product->name }}</td>
                        <td class="align-middle">
                            <p
                                style="{{ $item->product->sale ? 'text-decoration: line-through' : '' }};                                                                                                                                                                                                                                                 ">
                                ${{ $item->product->price }}
                            </p>

                            @if ($item->product->sale)
                                <p
                                    style="
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               ">
                                    ${{ $item->product->sale_price}}
                                </p>
                            @endif
                        </td>
                        <td class="align-middle">{{ $item->product_size }}</td>
                        <td class="align-middle">{{ $item->product->sale }}</td>
                        <td class="align-middle">
                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-primary btn-minus btn-update-quantity"
                                            data-action=""
                                            data-id="{{ $item->id }}">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="number" class="form-control form-control-sm bg-secondary text-center p-0"
                                       id="productQuantityInput-{{ $item->id }}" min="1"
                                       value="{{ $item->product_quantity }}">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-primary btn-plus btn-update-quantity"
                                            data-action=""
                                            data-id="{{ $item->id }}">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle">
                                  <span
                                      id="cartProductPrice{{ $item->id }}">${{ $item->product->sale ? $item->product->sale_price * $item->product_quantity : $item->product->price * $item->product_quantity }}</span>

                        </td>
                        <td class="align-middle">
                            <button class="btn btn-sm btn-primary btn-remove-product"
                                    data-action=""><i
                                    class="fa fa-times"></i></button>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <form class="mb-5" method="POST" action="">
                @csrf
                <div class="input-group">
                    <input type="text" class="form-control p-4" value="{{ Session::get('coupon_code') }}"
                           name="coupon_code" placeholder="Coupon Code">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Apply Coupon</button>
                    </div>
                </div>
            </form>
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Subtotal</h6>
                        <h6 class="font-weight-medium total-price">${{ $subtotal }}</h6>
                    </div>

                    @if ($discount > 0)
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Coupon</h6>
                            <h6 class="font-weight-medium coupon-div">-${{ $discount }}</h6>
                        </div>
                    @endif
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold total-price-all">${{ $total }}</h5>
                    </div>
                    <a href="" class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('client/cart/cart.js') }}"></script>
@endsection
