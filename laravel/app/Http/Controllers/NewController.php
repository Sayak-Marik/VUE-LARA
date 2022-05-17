<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Carbon;

class NewController extends Controller
{
    public function index(Request $request)
    {
        $Items=Item::get();
        return $Items;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newItem = new Item;
        $newItem->name = $request->name;
        $newItem->age = $request->age;
        $newItem->address = $request->address;
        $newItem->save();

        return $newItem;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($xy)
    {

       // echo $pq;
        $Items=Item::where('id','=',$xy)->get();
        return $Items;
    }

    /**2``
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        $existingItem = Item::find( $id );

        if($existingItem){
            $existingItem->created_at = $request->created_at ? Carbon::now : null;
            $existingItem->name = $request->name;
            $existingItem->age = $request->age;
            $existingItem->address = $request->address;
            $existingItem->save();
            return $existingItem;
        }
        return "Item not found";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existingItem = Item::find($id);

        if($existingItem){
            $existingItem->delete();
            return "Item deleted";
        }

        return "Item not found";
    }
}
