<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try{
            $params = $request->validate([
                'user_id' => ['required'],
            ]);
            $userId = $params['user_id'];
            $addresses = Address::select('addresses', 'phone')->where('user_id', $userId)->limit($limit ?? 6)->get();
            return ApiResponse::success($addresses);
        } catch(\Throwable $th){
            return ApiResponse::internalServerError($th->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $params = $request->validate([
                'user_id' => ['required'],
                'addresses' => ['required'],
                'phone' => ['required'],
            ]);

            $userId = $params['user_id'];
            $address = $params['addresses'];
            $phone = $params['phone'];

            $item = Address::create([
                'user_id' => $userId,
                'addresses' => $address,
                'phone' => $phone,
            ]);

            return ApiResponse::success($item);
        }catch(\Throwable $th){
            return ApiResponse::internalServerError($th->getMessage());
        }
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
    public function update(Request $request, Address $id)
    {
        try{
            $params = $request->validate([
                'addresses' => ['required'],
                'phone' => ['required'],
            ]);

            $address = $params['addresses'];
            $phone = $params['phone'];

            $id->update([
                'addresses' => $address,
                'phone' => $phone,
            ]);

            return ApiResponse::success($id);
        }catch(\Throwable $th){
            return ApiResponse::internalServerError($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $id)
    {
        try{
            $id->delete();

            return ApiResponse::success('Xóa thành công');
        }catch(\Throwable $th){
            return ApiResponse::internalServerError($th->getMessage());
        }
    }
}
