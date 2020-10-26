<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemFormValidation;
use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades;

class ItemController extends Controller
{
    /**
     * Homepage
    */
    public function index()
    {
        $items = Item::all();
        return view('welcome', compact('items'));
    }

    /**
     * Save the Item name
    */
    public function saveToItem(ItemFormValidation $request)
    {
        $item_val = new Item();
        $item_val->item_name = $request->item_name;
        $item_val->item_type = '1';

        $item_val->save();
        if($item_val->id){
            return redirect('/')->withInput()->with('SuccessStatus', 'Item is Saved Successfully');
        } else {
            return redirect('/')->withInput()->with('ErrorStatus', 'Oops, Something Went Wrong!!');
        }
        
    }

    public function updateItemType(Request $request)
    {
        $itemId = $request['itemid'];
        $itemShift = $request['shift'];
        $flight = Item::find($itemId);

        if($itemShift == 'right'){
            $flight->item_type = '2';
            $flight->save();
        } else {
            $flight->item_type = '1';
            $flight->save();
        }

        $update_sts = 1;
        
        if($flight->wasChanged('item_type') == true){
            $sts['status'] = $update_sts;
            return response()->json($sts, 200);
        } else {
            $sts['status'] = 0;
            return response()->json($sts, 200);
        }
    }
}
