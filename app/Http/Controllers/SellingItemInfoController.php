<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\SellingItemInfo;
use App\Status;
use Illuminate\Http\Request;

/**
 * Description of SellingItemInfoController
 *
 * @author Nat
 */
class SellingItemInfoController extends KdmBaseController{
    //put your code here
    public function __construct(){
        parent::__construct(new SellingItemInfo());
    }

    public function getDataByUser(Request $request, $user_id)
    {
        if($request->user_type_id == 4){
            $data = $this->model::join('product_info', 'selling_item_info.product_info_id', 'product_info.id')
                                ->join('modern_trader_store_info','modern_trader_store_info.id','selling_item_info.sub_id')
                                ->select('selling_item_info.*', 'product_info.name as product_name','modern_trader_store_info.store_name as store_name')
                                ->where('selling_item_info.user_id', $user_id)
                                ->where('selling_item_info.user_type_id', $request->user_type_id)
                                ->where('modern_trader_store_info.status_id', Status::$ACTIVE)
                                ->where('selling_item_info.status_id', Status::$ACTIVE)->get();
            return $this->responseRequestSuccess($data);
        }elseif($request->user_type_id == 3){
            $data = $this->model::join('product_info', 'selling_item_info.product_info_id', 'product_info.id')
                                ->join('market_retailer_shop_info','market_retailer_shop_info.id','selling_item_info.sub_id')
                                ->select('selling_item_info.*', 'product_info.name as product_name','market_retailer_shop_info.shop_name as shop_name')
                                ->where('selling_item_info.user_id', $user_id)
                                ->where('selling_item_info.user_type_id', $request->user_type_id)
                                ->where('market_retailer_shop_info.status_id', Status::$ACTIVE)
                                ->where('selling_item_info.status_id', Status::$ACTIVE)->get();
            return $this->responseRequestSuccess($data);
        }else{
            $data = $this->model::join('product_info', 'selling_item_info.product_info_id', 'product_info.id')
                                ->select('selling_item_info.*', 'product_info.name as product_name')
                                ->where('selling_item_info.user_id', $user_id)
                                ->where('selling_item_info.user_type_id', $request->user_type_id)
                                ->where('selling_item_info.status_id', Status::$ACTIVE)->get();
            return $this->responseRequestSuccess($data);
        }
    }

    public function getData($id){
        $data = $this->model::join('product_info', 'selling_item_info.product_info_id', 'product_info.id')
                     ->select('selling_item_info.*', 'product_info.name as product_name')
                     ->where('selling_item_info.id', $id)
                     ->where('selling_item_info.status_id', Status::$ACTIVE)->get();
        return $this->responseRequestSuccess($data);
    }
}
