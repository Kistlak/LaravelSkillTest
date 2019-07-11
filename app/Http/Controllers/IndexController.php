<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JsonForms;

class IndexController extends Controller
{
    public function FormWithJsonPage()
    {
        $AllTheData = JsonForms::all();
        return view("index",compact('AllTheData'));
    }

    public function GetFormData(Request $request)
    {
        $ProductName = $request->input('ProductName');
        $Quantity = $request->input('Quantity');
        $PricePerItem = $request->input('PricePerItem');
        $GetDataArray = [];
        $GetDataArray['ProductName'] = $ProductName;
        $GetDataArray['Quantity'] = $Quantity;
        $GetDataArray['PricePerItem'] = $PricePerItem;
        $GetDataArray['TotalValueNumber'] = ($Quantity*$PricePerItem);
        //print_r(json_encode($GetDataArray));
        $SaveGetDate = new JsonForms;
        $SaveGetDate->product_name = $ProductName;
        $SaveGetDate->quantity_in_stock = $Quantity;
        $SaveGetDate->price_per_item = $PricePerItem;
        $SaveGetDate->total_value_number = ($Quantity*$PricePerItem);
        $SaveGetDate->saved_json_data = json_encode($GetDataArray);
        $SaveGetDate->save();
       return $GetDataArray;
    }

    public function SetDataToTable()
    {
        $AllTheData = JsonForms::all();
        return $AllTheData;
    }
    public function UpdateData(Request $request)
    {
        $GetDataArrayToUpdate = [];
        $GetDataArrayToUpdate['ProductName'] = $request->input('ProductNameWithVal');
        $GetDataArrayToUpdate['Quantity'] = $request->input('QuantityWithVal');
        $GetDataArrayToUpdate['PricePerItem'] = $request->input('PricePerItemWithVal');
        $GetDataArrayToUpdate['TotalValueNumber'] = ($request->input('QuantityWithVal')*$request->input('PricePerItemWithVal'));
        $UpdateAll = JsonForms::where('id',$request->input('id'))->get()->first();
        $UpdateAll->product_name = $request->input('ProductNameWithVal');
        $UpdateAll->quantity_in_stock = $request->input('QuantityWithVal');
        $UpdateAll->price_per_item = $request->input('PricePerItemWithVal');
        $UpdateAll->total_value_number = ($request->input('QuantityWithVal')*$request->input('PricePerItemWithVal'));
        $UpdateAll->saved_json_data = json_encode($GetDataArrayToUpdate);
        $UpdateAll->update();
    }
    public function DeleteData(Request $request)
    {
        $DeleteAll = JsonForms::where('id',$request->input('id'))->get()->first();
        $DeleteAll->delete();
    }

}
