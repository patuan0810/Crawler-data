<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Http\Request;
class ProductsController extends Controller
{
    public function index(Request $request)
    {
        // Số sản phẩm trên mỗi trang
        $perPage = $request->input('per_page', 15);
    
        // Trang hiện tại
        $currentPage = $request->input('page', 1);
    
        // Lấy danh sách sản phẩm với phân trang và thông tin từ cả hai bảng
        $products = Product::join('product_details', 'products.id', '=', 'product_details.product_id')
            ->orderBy('products.id', 'desc')
            ->select('products.*', 'product_details.category as detail_category', 'product_details.price', 'product_details.rate', 'product_details.quantity_sold', 'product_details.categories')
            ->paginate($perPage, ['*'], 'page', $currentPage);
    
        return response()->json($products);
    }
    
}