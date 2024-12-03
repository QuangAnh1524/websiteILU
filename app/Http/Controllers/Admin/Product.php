<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class Product extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = \App\Models\Product::query();
        //tim kiem
        if ($searchKey = request()->get('search')) {
            $query->where(function($q) use ($searchKey) {
                $q->where('name', 'like', '%' . $searchKey . '%')
                    ->orWhere('description', 'like', '%' . $searchKey . '%');
            });
        }

//        // loc
//        $query->whereHas('categories', function($q) use ($request) {
//            $q->where('categories.id', $request->category); // Sử dụng ID của danh mục
//        });

        // sap xep
        $sortBy = $request->get('sort_by', 'id');
        $sortDirection = $request->get('sort_direction', 'asc');
        $query->orderBy($sortBy, $sortDirection);

        $perPage = request()->get('per_page', 10);

        $products = $query->paginate($perPage)->withQueryString();
        $categories = \App\Models\Category::all();

        return view('admin.product.index', compact('products', 'categories'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'sale' => 'nullable|integer|min:0|max:100',
            'price' => 'required|numeric|min:0',
        ]);

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
        $product->categories()->sync($request->input('categories'));

        return redirect()->route('products.create')->with('message', 'Thêm sản phẩm thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = \App\Models\Product::with('categories')->findOrFail($id);
        return view('admin.product.detailsOfProduct', compact('product'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        $product = \App\Models\Product::find($id);
        $page = $request->get('page', 1);
        $categories = \App\Models\Category::whereNotNull('parent_id')->get();
        return view('admin.product.edit', compact('product', 'page', 'categories'));
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
            // Xử lý hình ảnh nếu có thay đổi
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

        // Cập nhật thông tin sản phẩm
        $product->update($updateData);

        // Cập nhật mối quan hệ giữa sản phẩm và danh mục
        $product->categories()->sync($request->input('categories'));  // Đồng bộ danh mục

        $page = $request->input('page', 1);
        return redirect()->route('admin.products.show', ['id' => $id, 'page' => $page])
            ->with('success', 'Cập nhật sản phẩm thành công!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function confirmDestroy(Request $request, string $id)
    {
        $product = \App\Models\Product::find($id);
        $page = $request->get('page', 1);
        return view('admin.product.confirmDelete', compact('product', 'page'));
    }

    public function destroy(Request $request, string $id)
    {
        $product = \App\Models\Product::find($id);
        $product->delete();

        $page = $request->input('page', 1);
        return redirect()->route('products.index', ['page' => $page])->with('success', 'Sản phẩm đã được xóa');
    }

}

