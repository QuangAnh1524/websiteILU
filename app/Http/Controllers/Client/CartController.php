<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cart;
    protected $product;
    protected $cartProduct;
    protected $coupon;
    protected $order;

    public function __construct(Product $product, Cart $cart, CartProduct $cartProduct, Coupon $coupon, Order $order) {
        $this->product = $product;
        $this->cart = $cart;
        $this->cartProduct = $cartProduct;
        $this->coupon = $coupon;
        $this->order = $order;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = $this->cart->firtOrCreateBy(auth()->user()->id);
        $cartProducts = $cart->cartProducts()->with('product')->get();

        $subtotal = $cartProducts->sum(function($item) {
            $price = $item->product->sale ? $item->product->sale_price : $item->product->price;
            return $price * $item->product_quantity;
        });

        $discount = session('discount_amount_price') ?? 0;

        $total = $subtotal - $discount;

        return view('client.cart.index', compact('cart', 'subtotal', 'discount', 'total'));
    }


    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $productId = $request->input('product_id');
        if (!$productId) {
            return back()->withErrors(['message' => 'Product not found or invalid']);
        }

        $product = $this->product->findOrFail($productId);

        $cart = $this->cart->firtOrCreateBy(auth()->user()->id);

        $cartProduct = $this->cartProduct->getBy($cart->id, $product->id, null);

        if ($cartProduct) {
            $quantity = $cartProduct->product_quantity;
            $cartProduct->update(['product_quantity' => ($quantity + ($request->input('product_quantity') ?? 1))]);
        } else {
            $dataCreate = [
                'product_size' => 'Default',
                'product_quantity' => $request->input('product_quantity', 1),
                'product_price' => $product->price,
                'product_id' => $product->id,
                'cart_id' => $cart->id
            ];
            $this->cartProduct->create($dataCreate);
        }

        return back()->with(['message' => 'Thêm thành công']);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
