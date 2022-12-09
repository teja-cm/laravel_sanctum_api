<?php

namespace App\Http\Controllers;
use App\Models\Task_Store_Status;
use Illuminate\Http\Request;

class TaskStoreStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function getTaskStoreStatus($user_id) {
        if (Task_Store_Status::where('user_id', $user_id)->exists()){
            $Task_Store_Status = Task_Store_Status::where('user_id', $user_id)->get();
            return response($Task_Store_Status, 200);}
            else{
                return response()->json([
                    "message" => "stores not found"
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
        if (Task_Store_Status::where('user_id', $request->user_id)->exists()){
            return response()->json([
                "message" => "user id exists"
              ],202);
        }else{
        $Task_Store_Status = Task_Store_Status::create([
            'user_id'=>$request->user_id,
        ]);
        return response()->json([
            'status'=>200,
            'data'=>$Task_Store_Status]);
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
        //
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
        if(Task_Store_Status::where('user_id', $user_id)->exists()){
            $Task_Store_Status=Task_Store_Status::find($user_id);
            $Task_Store_Status->update($request->all());
            return response($Task_Store_Status, 200);
           }else{
            return response()->json([
                "message" => "Task_Store_Status did not  updated"
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
