<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\cr;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductImage;
use App\Models\ProductSize;
use App\Models\Size;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Http\Request;
use function Illuminate\Foundation\Configuration\respond;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product.index',
        [
            'products'=>Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create',
        [
            'categories'   =>Category::where ('status',1)->get(),
            'subcategories'=>SubCategory::where ('status',1)->get(),
            'brands'       =>Brand::where ('status',1)->get(),
            'units'        =>Unit::where ('status',1)->get(),
            'colors'       =>Color::all(),
            'sizes'        =>Size::all(),
            ]);
    }

    public function getSubCategory()
    {
        $categoryId = $_GET ['id'];
        $subCategories = SubCategory::where('category_id', $categoryId )->get();
        return respond()->json($subCategories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public $productId;
    public function store(Request $request)
    {
        $this->productId = Product::saveNewProduct($request);
        ProductColor::saveProductColor($request->color, $this->productId);
        ProductSize::saveProductSize($request->size, $this->productId);
        ProductImage::newProductImage($request->file('other_image'),$this->productId);
        return redirect('/product')->with('message','Product Info created succesfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        return view('admin.product.show',
        [
            'product'=> Product::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.product.edit',
        [
            'categories'   =>Category::where ('status',1)->get(),
            'subcategories'=>SubCategory::where ('status',1)->get(),
            'brands'       =>Brand::where ('status',1)->get(),
            'units'        =>Unit::where ('status',1)->get(),
            'colors'       =>Color::all(),
            'sizes'        =>Size::all(),
            'product'      =>Product::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Product::updateProduct($request,$id);
        ProductColor::updateProductColor($request->color, $id);
        ProductSize::updateProductSize($request->size, $id);
        if ($request->file('other_image'))
        {
            ProductImage::updateProductImage($request->file('other_image'),$id);
        }

        return redirect('/product')->with('message','Product Info updated succesfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::deleteProduct($id);
        return redirect('/product')->with('message','Product Info deleted succesfully.');

    }
}
