<?php

namespace App\Http\Controllers;
use App\Models\Stores;
use Illuminate\Http\Request;

class StoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Stores::all();
    }

    //get stores for the specified task
    public function getStores($task_id) {
        if (Stores::where('task_id', $task_id)->exists()){
            $stores = Stores::where('task_id', $task_id)->get();
            return response($stores, 200);}
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
        $stores = Stores::create([
            'name' => $request->name,
            'task_id'=>$request->task_id,
            'url'=>$request->url,
            'address'=>$request->address,
            'latitude'=>$request->latitude,
            'longitude'=>$request->longitude
        ]);

        return response()->json([
            'status'=>200,
            'data'=>$stores]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Stores::find($id);
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
       if(Stores::where('id', $id)->exists()){
        $stores=Stores::find($id);
        $stores->update($request->all());
        return response($stores, 200);
       }else{
        return response()->json([
            "message" => "stores did not  updated"
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
