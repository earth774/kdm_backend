<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\ThaiCustomsImportInfo;
use App\Status;
use Illuminate\Http\Request;

use App\ProductInfo;
use App\ManufacturerProductInfo;

/**
 * Description of ThaiCustomsImportInfoController
 *
 * @author Tae
 */
class ThaiCustomsImportInfoController extends KdmBaseController{
    //put your code here
    public function __construct(){
        parent::__construct(new ThaiCustomsImportInfo());
    }

    public function getDataByUser(Request $request, $user_id)
    {
    //   $data = $this->model::join('product_info', 'thai_customs_import_info.product_info_id', 'product_info.id')
    //                       ->select('thai_customs_import_info.*', 'product_info.name as product_name')
    //                       ->where('thai_customs_import_info.user_id', $user_id)
    //                       ->where('thai_customs_import_info.user_type_id', $request->user_type_id)
    //                       ->where('thai_customs_import_info.status_id', Status::$ACTIVE)->get();
    //   return $this->responseRequestSuccess($data);

        $ThaiCustomsImport_data = $this->model::select('*')
                            ->where('user_id', $user_id)
                            ->where('user_type_id', $request->user_type_id)
                            ->where('status_id', Status::$ACTIVE)->get(); 

        $index = 0 ;
        foreach($ThaiCustomsImport_data as $obj){
            if($obj->is_product == 0){
                $product_data = ProductInfo::select('name')
                                            // ->where('status_id', Status::$ACTIVE)
                                            ->find($obj->product_info_id);
                $ThaiCustomsImport_data[$index]["product_name"] = $product_data->name;
            }else{
                $product_data = ManufacturerProductInfo::select('product_name')
                                        // ->where('status_id', Status::$ACTIVE)
                                        ->find($obj->manufacturer_product_info_id);
                $ThaiCustomsImport_data[$index]["product_name"] = $product_data->product_name;
            } 
            $index++;
        }
        return $this->responseRequestSuccess($ThaiCustomsImport_data);
    }

    public function getData($id){
        // $data = $this->model::join('product_info', 'thai_customs_import_info.product_info_id', 'product_info.id')
        //              ->select('thai_customs_import_info.*', 'product_info.name as product_name')
        //              ->where('thai_customs_import_info.id', $id)
        //              ->where('thai_customs_import_info.status_id', Status::$ACTIVE)->get();
        // return $this->responseRequestSuccess($data);

        $ThaiCustomsImport_data = $this->model::select('*')
                                            ->where('id', $id)
                                            ->where('status_id', Status::$ACTIVE)
                                            ->get(); 
        
        $index = 0 ;
        foreach($ThaiCustomsImport_data as $obj){
            if($obj->is_product == 0){
                $product_data = ProductInfo::select('name')
                                            // ->where('status_id', Status::$ACTIVE)
                                            ->find($obj->product_info_id);
                $ThaiCustomsImport_data[$index]["product_name"] = $product_data->name;
            }else{
                $product_data = ManufacturerProductInfo::select('product_name')
                                        // ->where('status_id', Status::$ACTIVE)
                                        ->find($obj->manufacturer_product_info_id);
                $ThaiCustomsImport_data[$index]["product_name"] = $product_data->product_name;
            } 
            $index++;
        }
        return $this->responseRequestSuccess($ThaiCustomsImport_data);
    }
}
