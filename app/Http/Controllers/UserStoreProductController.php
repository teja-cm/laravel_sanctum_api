<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User_Store_Product;

class UserStoreProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id,$store_id)
    {
        $users = DB::table('user__store__products')
                ->select(DB::raw('product_id'))
                ->where('user_id', '=', $user_id)
                ->where('store_id', '=', $store_id)
                ->get();
        return response()->json($users);



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $User_Store_Product = User_Store_Product::create([
            'user_id' => $request->user_id,
            'store_id' => $request->store_id,
            'product_id' => $request->product_id
        ]);

        return response()->json([
            'status'=>200,
            'data'=>$User_Store_Product]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
