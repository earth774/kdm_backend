<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\ImportItemInfo;
use App\Status;
use Illuminate\Http\Request;
 
use App\ProductInfo;
use App\ManufacturerProductInfo;
/**
 * Description of ImportItemInfoController
 *
 * @author Tae
 */
class ImportItemInfoController extends KdmBaseController{
    //put your code here
    public function __construct(){
        parent::__construct(new ImportItemInfo());
    }

    public function getDataByUser(Request $request, $user_id)
    {
    //   $data = $this->model::join('product_info', 'import_item_info.product_info_id', 'product_info.id')
    //                       ->select('import_item_info.*', 'product_info.name as product_name')
    //                       ->where('import_item_info.user_id', $user_id)
    //                       ->where('import_item_info.user_type_id', $request->user_type_id)
    //                       ->where('import_item_info.status_id', Status::$ACTIVE)->get();
    //   return $this->responseRequestSuccess($data);

      $import_item_info_data = $this->model::select('*')
                          ->where('user_id', $user_id)
                          ->where('user_type_id', $request->user_type_id)
                          ->where('status_id', Status::$ACTIVE)->get(); 

      $index = 0 ;
      foreach($import_item_info_data as $obj){
          if($obj->is_product == 0){
            $product_data = ProductInfo::select('name')
                                        // ->where('status_id', Status::$ACTIVE)
                                        ->find($obj->product_info_id);
            $import_item_info_data[$index]["product_name"] = $product_data->name;
          }else{
            $product_data = ManufacturerProductInfo::select('product_name')
                                    //    ->where('status_id', Status::$ACTIVE)
                                       ->find($obj->manufacturer_product_info_id);
            $import_item_info_data[$index]["product_name"] = $product_data->product_name;
          } 
          $index++;
      }
      return $this->responseRequestSuccess($import_item_info_data);
    }

    public function getData($id){
        // $data = $this->model::join('product_info', 'import_item_info.product_info_id', 'product_info.id')
        //              ->select('import_item_info.*', 'product_info.name as product_name')
        //              ->where('import_item_info.id', $id)
        //              ->where('import_item_info.status_id', Status::$ACTIVE)->get();
        // return $this->responseRequestSuccess($data);

        $import_item_info_data = $this->model::select('*')
                                            ->where('id', $id)
                                            ->where('status_id', Status::$ACTIVE)
                                            ->get(); 

        $index = 0 ;
        foreach($import_item_info_data as $obj){
            if($obj->is_product == 0){
                $product_data = ProductInfo::select('name')
                                    // ->where('status_id', Status::$ACTIVE)
                                    ->find($obj->product_info_id);
                $import_item_info_data[$index]["product_name"] = $product_data->name;
            }else{
                $product_data = ManufacturerProductInfo::select('product_name')
                                    // ->where('status_id', Status::$ACTIVE)
                                    ->find($obj->manufacturer_product_info_id);
                $import_item_info_data[$index]["product_name"] = $product_data->product_name;
            } 
            $index++;
        }

        return $this->responseRequestSuccess($import_item_info_data);
    }
}
