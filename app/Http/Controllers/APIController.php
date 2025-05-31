<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use function Illuminate\Foundation\Configuration\respond;

class APIController extends Controller
{
    public function getAllCategory()
    {
        $categories = Category::with('subCategory')->get();
        return response()->json($categories);
    }

    public function getAllTrendingProduct()
    {
        $products = Product::where('status',1)->latest()->get(['id','name','image','selling_price']);
        foreach ($products as $product)
        {
            $product->image = asset($product->image);
        }
        return response()->json($products);
    }
    public function getAllCategoryProduct($id)
    {
        $products = Product::where('category_id',$id)->where('status',1)->latest()->get(['id','name','image','selling_price']);
        foreach ($products as $product)
        {
            $product->image = asset($product->image);
        }
        return response()->json($products);
    }
    public function getProductDetail($id)
    {
        $product = Product::with(['productColors.color', 'productSizes.size'])->findOrFail($id);
        $product->image = asset($product->image);
        foreach ($product->productImages as $productImage)
        {
            $productImage->image = asset($productImage->image);
        }
        return response()->json($product);
    }

}

