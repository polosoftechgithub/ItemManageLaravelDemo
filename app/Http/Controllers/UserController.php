<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemFormValidation;
use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades;

class UserController extends Controller
{
    public function saveItem(ItemFormValidation $request)
    {
        $item_val = new Item();
        $item_val->item_name = $request->items;
        $item_val->item_type = '1';

        $item_val->save();

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } else {
            return redirect('/');
        }
    }

    public function saveItems(ItemFormValidation $request)
    { 
        $item_val = new Item();
        $item_val->item_name = $request->items;
        $item_val->item_type = '1';

        $item_val->save();

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } else {
            return redirect('/');
        }
    }
}
