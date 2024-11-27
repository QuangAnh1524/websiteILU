<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Product extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = \App\Models\Product::paginate(10);
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate dữ liệu
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'sale' => 'nullable|integer|min:0|max:100',
            'price' => 'required|numeric|min:0',
        ]);

        // Tạo mới sản phẩm
        $product = new \App\Models\Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->sale = $request->input('sale');
        $product->price = $request->input('price');
        if ($request->hasFile('image_path')) {
            $file = $request->file('image_path');
            $generatedImageName = 'image_' . time() . '-' . $request->name . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $generatedImageName);
            $product->image_path = $generatedImageName;
        }
        $product->save();

        return redirect()->route('products.create')->with('message', 'Thêm sản phẩm thành công!');
    }

    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        $product = \App\Models\Product::findOrFail($id);

        return view('admin.product.detailsOfProduct', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = \App\Models\Product::find($id);
        return view('admin.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = \App\Models\Product::findOrFail($id);
        $updateData = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'sale' => $request->input('sale'),
            'price' => $request->input('price'),
        ];
        if ($request->hasFile('image_path')) {
            if ($product->image_path) {
                $oldImagePath = public_path('images/' . $product->image_path);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $file = $request->file('image_path');
            $generatedImageName = 'image_' . time() . '-' . $request->name . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $generatedImageName);

            $updateData['image_path'] = $generatedImageName;
        }
        \App\Models\Product::where('id', $id)->update($updateData);
        return view('admin.product.detailsOfProduct', compact('product'));
    }

    /**
     * Remove the specified resource from storage.
     */

    public function confirmDestroy(string $id)
    {
        $product = \App\Models\Product::find($id);
        return view('admin.product.confirmDelete', compact('product'));
    }
    public function destroy(string $id)
    {
        $product = \App\Models\Product::find($id);
        $product->delete();
        return redirect('/products');
    }
}
