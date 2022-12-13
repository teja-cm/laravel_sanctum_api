<?php

namespace App\Http\Controllers;
use App\Models\BankingStatus;
use Illuminate\Http\Request;

class BankingStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BankingStatus::all();
    }

    
    public function getBankingStatus($user_id) {
        if (BankingStatus::where('user_id', $user_id)->exists()){
            $BankingStatus = BankingStatus::where('user_id', $user_id)->get();
            return response($BankingStatus, 200);}
            else{
                return response()->json([
                    "message" => "status not found"
                  ], 404);
            }
          
      }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (BankingStatus::where('user_id', $request->user_id)->exists()){
            return response()->json([
                "message" => "user id exists"
              ],202);
        }else{
        $BankingStatus = BankingStatus::create([
            'user_id'=>$request->user_id,
        ]);
        return response()->json([
            'status'=>200,
            'data'=>$BankingStatus]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return BankingStatus::find($user_id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id)
    {
        if(BankingStatus::where('user_id', $user_id)->exists()){
            $BankingStatus=BankingStatus::find($user_id);
            $BankingStatus->update($request->all());
            return response($BankingStatus, 200);
           }else{
            return response()->json([
                "message" => "BankingStatus did not  updated"
              ], 404);
            }
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
