<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeController extends Controller
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        // Lấy dữ liệu sản phẩm và phân trang
        $products = $this->product->paginate(4);

        // Truyền biến $products sang View
        return view('client.home.index', compact('products'));
    }
}
