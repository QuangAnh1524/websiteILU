<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\CreateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Category::with('parent');
        if ($key = request()->get('search')) {
            $query->where('name', 'LIKE', "%{$key}%");
        }
        $categories = $query->paginate(5);

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parentCategory = $this->category->getParent();
        return view('categories.create', compact('parentCategory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCategoryRequest $request)
    {
        $dataCreate = $request->all();

        $category = $this->category->create($dataCreate);
        return redirect()->route('categories.index')->with('message', 'Create success!');
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
        $category = Category::with('children')->findOrFail($id);
        $parentCategory = Category::whereNull('parent_id')->get();

        return view('categories.edit', compact('category', 'parentCategory'));
    }

    public function update(Request $request, string $id)
    {
        $dataUpdate = $request->all();

        $category = $this ->category->findOrFail($id);
        $category->update($dataUpdate);

        $page = $request->input('page', 1);
        return redirect()->route('categories.index', ['id' => $id, 'page' => $page])->with('message', 'Update success!');
    }

    public function confirmDestroy(string $id) {
        $category = Category::find($id);
        $page = \request()->input('page', 1);
        return view('categories.confirmDelete', compact('category', 'page'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        $page = $request->input('page', 1);
        return redirect()->route('categories.index', ['id' => $id, 'page' => $page])->with('message', 'Delete success!');
    }
}
