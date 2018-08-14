<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\NewsInfoResource;
use Illuminate\Http\Request;
use App\Status;
/**
 * Description of NewsInfoController
 *
 * @author Nat
 */
class NewsInfoResourceController extends KdmBaseController {
    //put your code here
    public function __construct() {
        parent::__construct(new NewsInfoResource());
    }
    
    public function getData($id){
         $data = $this->model::select('*')
                 ->where('status_id', Status::$ACTIVE)
                 ->where('news_info_id',$id)->get();
        return $this->responseRequestSuccess($data);
    }


    public function dropzone_post(Request $request){
        /**** php code ****/
        $news_info_id = $request->input("news_info_id");

        $filePathname = $request->file('file')->getPathname(); //temp
        $fileName = $request->file('file')->getClientOriginalName();

        $ext = pathinfo($fileName, PATHINFO_EXTENSION); //extract a file extension
        $set_fileName = $news_info_id."_".substr( md5($request->file('file')->getClientOriginalName().'_'.time()), 0 , 15).".".$ext; //gen uniqe code
        $ext_lower = $ext;
        
        //insert data
        $NewsInfoResource = new NewsInfoResource();
        $NewsInfoResource->news_info_id = $news_info_id;
        $NewsInfoResource->src_path = '../public/dropzone/news_images/'.$set_fileName;
        $NewsInfoResource->src_filename = $set_fileName;
        $NewsInfoResource->original_filename = $fileName;
        $NewsInfoResource->status_id = 1;
        if($NewsInfoResource->save()){
            $destinationPath = '../public/dropzone/news_images' ;
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }
            if(move_uploaded_file($filePathname,'../public/dropzone/news_images/'.$set_fileName)){
                return $this->responseRequestSuccess(array("id"=> $NewsInfoResource->id,"pathFile" => url('/')."/dropzone/news_images/".$set_fileName));
            } 
        }

    }
    
    
    public function dropzone_delete(Request $request){
        //print_r( $request->data);
        foreach($request->data as $value){
            $data = $this->model::where("src_filename",$value)->first();
            $data->status_id = Status::$DELETED;
            $data->save();
        }
        return $this->responseRequestSuccess(array("status" => "success"));
    }
}
