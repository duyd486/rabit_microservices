<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $params = $request->all();
        try{
            $products = Product::select(
                'id',
                'name',
                'price',
                // 'detail',
                // 'quantity',
                // 'total_sold',
                'category_id',
            );

            if(!empty($params['category_id'])){
                $category_id = $params['category_id'];
                $products->where('category_id', $category_id);
            }

            if (!empty($params['search_key'])) {
                $searchKey = $params['search_key'];
                $products->where('name', 'like', "%{$searchKey}%");
            }

            switch ($params['sort_type'] ?? 'default') {
                case 'newest':
                    $products->orderBy('created_at', 'desc');
                    break;
                case 'best_seller':
                    $products->orderBy('total_sold', 'desc');
                    break;
                case 'price_asc':
                    $products->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $products->orderBy('price', 'desc');
                    break;
                default:
                    $products->orderBy('id', 'asc');
                    break;
            }
            $products = $products->with('images:product_id,image_url')->offset($params['offset'] ?? 0)->limit($params['limit'] ?? 16)->get();

            return ApiResponse::success($products);
            
        } catch(\Throwable $th){
            return ApiResponse::internalServerError($th);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
