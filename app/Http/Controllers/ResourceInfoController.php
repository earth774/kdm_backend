<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Status;
use App\ResourceInfo;
use App\BreedInfo ;
use Illuminate\Http\Request;

/**
 * Description of ResourceController
 *
 * @author Nat
 */
class ResourceInfoController extends KdmBaseController{
    //put your code here
    public function __construct(){
        parent::__construct(new ResourceInfo());
    }

    public function index(){
        $resourceInfoData = $this->model::where('status_id', Status::$ACTIVE)->get();

        $new_resourceInfoData = array();
        array_push($new_resourceInfoData, array("id" => 0, "name" => "อื่นๆ","nameEn"=>"other","unit"=>""));
        foreach($resourceInfoData as $item){
            array_push($new_resourceInfoData, $item);
        }
        
        return $this->responseRequestSuccess($new_resourceInfoData);
    }
    
    public function getNameList($id_list){
        return ResourceInfo::whereIn('id', $id_list)->get();
    }
    
     public function getData($id){
        $resourceInfoData = ResourceInfo::where("id",$id)
                ->where('status_id', Status::$ACTIVE)
                ->get();
        
        $breedInfoData = BreedInfo::where("resource_info_id",$id)
                            ->where('status_id', Status::$ACTIVE)
                            ->get();
        
        return $this->responseRequestSuccess(Array("resourceInfoData" => $resourceInfoData ,"breedInfoData" => $breedInfoData));
     }
     

    public function addData(Request $request){
        $resourceInfo = new ResourceInfo();
        $resourceInfo->name = $request->name;
        $resourceInfo->unit = $request->unit;

        if($resourceInfo->save()){
            $resourceID = $resourceInfo->id ;
            $breedAddData = $request->breedAddData;
                try{
                    foreach ($breedAddData as $value) {
                        $BreedInfo = new BreedInfo();
                        $BreedInfo->resource_info_id = $resourceID ;
                        $BreedInfo->name = $value['name'] ;
                        if($BreedInfo->save()){
                            continue;
                        }else{
                            break; 
                            return $this->responseRequestError("Cannot create breed");
                        }
                    }
                    return $this->responseRequestSuccess($resourceInfo);
                } catch (Exception $ex) {
                    return $this->responseRequestError("Cannot create breed");
                }     
        }else{
            return $this->responseRequestError("Cannot create resource");
        }
    }

    public function updateData(Request $request, $id){
        $resourceInfo = ResourceInfo::where('id',$id)->where('status_id', Status::$ACTIVE)->first();
        if( !empty($resourceInfo) ){
            $resourceInfo->name = $request->name;
            $resourceInfo->unit = $request->unit;            
            if($resourceInfo->save()){
                $breedDelData =  $request->breedDelData ;
                $breedAddData = $request->breedAddData;
                try {
                    foreach ($breedDelData as $value) {
                        $BreedInfo = BreedInfo::where("resource_info_id",$id)
                                                ->where("name",$value['name'])
                                                ->first();
                        $BreedInfo->status_id = Status::$DELETED;
                        if($BreedInfo->save()){
                            continue;
                        } else {
                            break; 
                            return $this->responseRequestError("Cannot delete breed");
                        }
                    }
                } catch (Exception $ex) {
                    return $this->responseRequestError("error delete breed");
                }
                
                try {
                    foreach ($breedAddData as $value) {
                        $BreedInfo = BreedInfo::where("resource_info_id",$id)
                                                ->where("name",$value['name'])
                                                ->first();
                        if(!empty($BreedInfo)){
                            $BreedInfo->status_id = Status::$ACTIVE ;
                            $BreedInfo->save();
                        }else{
                            $BreedInfo = new BreedInfo();
                            $BreedInfo->resource_info_id = $id ;
                            $BreedInfo->name = $value['name'] ;
                            if($BreedInfo->save()){
                                continue;
                            }else{
                                break; 
                                return $this->responseRequestError("Cannot create breed");
                            }
                            
                        }
                    }
                } catch (Exception $ex) {
                    return $this->responseRequestError("Cannot create breed");
                }
                return $this->responseRequestSuccess($resourceInfo);
            }else{
                return $this->responseRequestError("Cannot update resource info");
            }

        }else{
            return $this->responseRequestError("Cannot find this resource info");
        }
    }
}
