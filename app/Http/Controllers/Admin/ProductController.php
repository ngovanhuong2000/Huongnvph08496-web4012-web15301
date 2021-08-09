<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

use App\Http\Requests\Admin\Product\StoreRequest;
use App\Http\Requests\Admin\Product\UpdateRequest;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class ProductController extends Controller
{



    public function index(Request $request)
    {
        $listProduct = null;
        if ($request->has('keyword') == true) {
            $keyword = $request->get('keyword');
            // dd($keyword);
            $listProduct = Product::where('name', 'LIKE', "%$keyword")->get();
        } else {
            $listProduct = Product::all(); // User::all lấy ra tất cả các bản ghi
            $listCategory = Category::all();
        }

        return view('admin/products/index', [
            'data' => $listProduct,
            'categories' => $listCategory,
        ]);
    }


    public function show(Product $product)
    {
        // dd($user->name);
        // https: //laravel.com/docs/8.x/routing#route-model-binding 

        return view('admin.products.show', [
            'product' => $product,
        ]);
    }
    public function create()
    {
        return view('admin/products/create');
    }
    public function store(StoreRequest $request)
    {
        $data = request()->except('_token');
        $result = Product::create($data);

        return redirect()->route('admin.products.index');
    }
    public function edit(Product $product)
    {
        $listCategory = Category::all();

        return view('admin/products/edit', [
            'data' => $product,
            'categories' => $listCategory,

        ]);
    }

    public function update(UpdateRequest $request, Product $product)
    {
        // nhận dữ liệu gửi lên & lưu vào db
        $data = $request->except('_token');
        $product->update($data);

        return redirect()->route('admin.products.index');
    }
    public function delete(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index');
    }
}
