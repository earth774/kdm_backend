<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\ManufacturerMaterialInfo;
use App\Status;
use Illuminate\Http\Request;

use App\ProductInfo;
use App\ManufacturerProductInfo;
/**
 * Description of ManufacturerMaterialInfoController
 *
 * @author Tae
 */
class ManufacturerMaterialInfoController extends KdmBaseController {

    //put your code here
    public function __construct() {
        parent::__construct(new ManufacturerMaterialInfo());
    }
    public function getDataByUser(Request $request, $user_id)
    {
    //   $data = $this->model::select("manufacturer_material_info.*",'manufacturer_product_info.product_name as manufacturer_product_info_name','product_info.name as product_info_name')
    //                       ->join('manufacturer_product_info','manufacturer_product_info.id','manufacturer_material_info.manufacturer_product_info_id')
    //                       ->join('product_info','product_info.id','manufacturer_material_info.product_info_id')
    //                       ->where('manufacturer_material_info.user_id', $user_id)
    //                       ->where('manufacturer_material_info.user_type_id', $request->user_type_id)
    //                       ->where('manufacturer_material_info.status_id', Status::$ACTIVE)->get();
    //   return $this->responseRequestSuccess($data);

        $Manufacturer_data = $this->model::select('*')
                                            ->where('user_id', $user_id)
                                            ->where('user_type_id', $request->user_type_id)
                                            ->where('status_id', Status::$ACTIVE)->get();

        $index = 0 ;
        foreach($Manufacturer_data as $obj){
            $manufacturer_product_data = ManufacturerProductInfo::select('product_name')
                                                                    ->where('status_id', Status::$ACTIVE)
                                                                    ->find($obj->manufacturer_product_info_id);
            $Manufacturer_data[$index]["manufacturer_product_info_name"] = $manufacturer_product_data->product_name;

            if($obj->is_product == 0){
                $product_data = ProductInfo::select('name')
                                            // ->where('status_id', Status::$ACTIVE)
                                            ->find($obj->product_info_id);
                $Manufacturer_data[$index]["product_info_name"] = $product_data->name;
                $Manufacturer_data[$index]["select_manufacturer_product_info_name"] = " ";
            }else{
                $product_data = ManufacturerProductInfo::select('product_name')
                                            // ->where('status_id', Status::$ACTIVE)
                                            ->find($obj->select_manufacturer_product_info_id);
                $Manufacturer_data[$index]["select_manufacturer_product_info_name"] = $product_data->product_name;
                $Manufacturer_data[$index]["product_info_name"] = " ";
            } 
            $index++;
        }
        return $this->responseRequestSuccess($Manufacturer_data); 
    }
}
