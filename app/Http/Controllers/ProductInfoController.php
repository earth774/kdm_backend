<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Status;
use App\ProductInfo;
use Illuminate\Http\Request;

/**
 * Description of ProductInfoController
 *
 * @author Nat
 */
class ProductInfoController extends KdmBaseController{
    //put your code here
    public function __construct(){
        parent::__construct(new ProductInfo());
    }

    public function index(){
        $productInfoData = $this->model::where('status_id', Status::$ACTIVE)->get();

        $new_productInfoData = array();
        array_push($new_productInfoData, array("id" => 0, "name" => "อื่นๆ","unit" => "","nameEn"=>"other"));
        foreach($productInfoData as $item){
            array_push($new_productInfoData, $item);
        }
        
        return $this->responseRequestSuccess($new_productInfoData);
    }
    
    public function getDataByResourceId($resource_id){
        $data = $this->model::where('resource_info_id', $resource_id)
                            ->where('status_id', Status::$ACTIVE)
                            ->get();
        return response()->json($data);         
    }

    public function addData(Request $request){
        $productInfo = new ProductInfo();
        $productInfo->name = $request->name;
        $productInfo->unit = $request->unit;
        $productInfo->resource_info_id = $request->resource_info_id;
        $productInfo->resource_info_explanation = $request->resource_info_explanation;
        $productInfo->breed_info_id = $request->breed_info_id;
        $productInfo->breed_info_explanation = $request->breed_info_explanation;

        if($productInfo->save()){
            return $this->responseRequestSuccess($productInfo);
        }else{
            return $this->responseRequestError("Cannot create product");
        }
    }

    public function updateData(Request $request, $id){
        $productInfo = ProductInfo::where('id',$id)->where('status_id', Status::$ACTIVE)->first();
        if( !empty($productInfo) ){
            $productInfo->name = $request->name;
            $productInfo->unit = $request->unit;
            $productInfo->resource_info_id = $request->resource_info_id;
            $productInfo->resource_info_explanation = $request->resource_info_explanation;
            $productInfo->breed_info_id = $request->breed_info_id;
            $productInfo->breed_info_explanation = $request->breed_info_explanation;
            
            if($productInfo->save()){
                return $this->responseRequestSuccess($productInfo);
            }else{
                return $this->responseRequestError("Cannot update product info");
            }
        }else{
            return $this->responseRequestError("Cannot find this product info");
        }
    }
}
