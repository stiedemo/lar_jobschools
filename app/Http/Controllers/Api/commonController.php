<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Address_Tinh;
use App\Address_Huyen;
use App\Address_Xa;
use App\ChucVu;
class commonController extends Controller
{
    public function getAddressHuyenToTinh(Request $request)
    {
		$rules = [
			'id' => 'required'
		];
		$messengers = [
            'id.required' => 'Request Không có tham số'
		];
		$validate = Validator::make($request->all(), $rules, $messengers);
		if($validate->fails()){
			return response()->json([
				'error' => true,
				'message' => $validate->errors()
			], 200);
		}else{
            $this_result = Address_Tinh::find($request->id);
            if($this_result) {
	            return response()->json([
	                'error' => false,
	                'tinh' => $this_result->name,
	                'huyen' => $this_result->Address_Huyen->toArray()
	            ], 200);
            }
		}
    }
    public function getAddressXaByHuyen(Request $request)
    {
		$rules = [
			'id' => 'required'
		];
		$messengers = [
            'id.required' => 'Request Không có tham số'
		];
		$validate = Validator::make($request->all(), $rules, $messengers);
		if($validate->fails()){
			return response()->json([
				'error' => true,
				'message' => $validate->errors()
			], 200);
		}else{
            $this_result = Address_Huyen::find($request->id);
            if($this_result) {
	            return response()->json([
	                'error' => false,
	                'huyen' => $this_result->name,
	                'xa' => $this_result->Address_Xa->toArray()
	            ], 200);
            }
		}
    }
    public function getAddressTinh()
    {
	    $this_result = Address_Tinh::all();
	    if($this_result) {
	        return response()->json([
	            'error' => false,
	            'data' => $this_result->toArray()
	        ], 200);
	    }
    }
    public function getChucVu()
    {
	    $this_result = ChucVu::all();
	    if($this_result) {
	        return response()->json([
	            'error' => false,
	            'data' => $this_result->toArray()
	        ], 200);
	    }
    }
}
