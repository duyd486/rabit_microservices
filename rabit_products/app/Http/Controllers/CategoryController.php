<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $categories = Category::select('id','name','parent_id','thumbnail_url')->where('parent_id', '=', 0)->with('childrens:id,parent_id,name,thumbnail_url')->get();
            return ApiResponse::success($categories);
        } catch(\Throwable $th){
            return ApiResponse::internalServerError($th->getMessage());
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
