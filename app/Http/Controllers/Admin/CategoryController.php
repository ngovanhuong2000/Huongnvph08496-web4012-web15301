<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class CategoryController extends Controller
{


    public function index(Request $request)
    {
        $listCategory = null;
        if ($request->has('keyword') == true) {
            $keyword = $request->get('keyword');
            // dd($keyword);
            $listCategory = Category::where('name', 'LIKE', "%$keyword")->get();
        } else {
            $listCategory = Category::all(); // User::all lấy ra tất cả các bản ghi
        }

        return view('admin/categories/index', [
            'data' => $listCategory,
        ]);
    }



    public function show(Category $category)
    {
        // https: //laravel.com/docs/8.x/routing#route-model-binding 
        return view('admin.categories.show', [
            'category' => $category,
        ]);
    }
    public function create()
    {
        return view('admin/categories/create');
    }
    public function store(StoreRequest $request)
    {
        $data = request()->except('_token');
        $result = Category::create($data);

        return redirect()->route('admin.categories.index');
    }
    public function edit(Category $category)
    {
        return view('admin/categories/edit', [
            'data' => $category,
        ]);
    }
    public function update(UpdateRequest $request, Category $category)
    {

        $data = request()->except('_token');
        $category->update($data);

        return redirect()->route('admin.categories.index');
    }
    public function delete(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index');
    }
}
