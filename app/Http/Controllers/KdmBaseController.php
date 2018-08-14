<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Status;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

/**
 * Description of KdmBaseController
 *
 * @author Nat
 */
class KdmBaseController extends Controller{
    //put your code here
    protected $model;

    public function __construct($model=null) {
        $this->model = $model;
    }

    public function index(){
        $data = $this->model::where('status_id', Status::$ACTIVE)->get();
        return $this->responseRequestSuccess($data);
    }

    public function addData(Request $request){
        $setArray = $request->request ;
        $this->model->setData($setArray);
        if($this->model->save()){
            return $this->responseRequestSuccess($this->model);
        }else{
            return $this->responseRequestError("Cannot create ".$this->model->getTable());
        }
    }

    public function updateData(Request $request, $id){
        $getData = $this->model::where('id',$id)->where('status_id', Status::$ACTIVE)->first();
        if(!empty($getData)){
            $setArray = $request->request ;
            $getData->setData($setArray);
            if($getData->save()){
                return $this->responseRequestSuccess($getData);
            }else{
                return $this->responseRequestError("Cannot update ".$this->model->getTable());
            }
        }else{
            return $this->responseRequestError("Cannot find ".$this->model->getTable());
        }
    }

    protected function updateDataInternal(Request $request, $getData){
        if(!empty($getData)){
            $setArray = $request->request ;
            $getData->setData($setArray);
            if($getData->save()){
                return $this->responseRequestSuccess($getData);
            }else{
                return $this->responseRequestError("Cannot update ".$this->model->getTable());
            }
        }else{
            return $this->responseRequestError("Cannot find ".$this->model->getTable());
        }
    }

    public function getData($id){
        $data = $this->model::where('id', $id)->where('status_id', Status::$ACTIVE)->get();
        return $this->responseRequestSuccess($data);
    }

    public function deleteData($id){
        $data = $this->model::findOrFail($id);
        $data->status_id = Status::$DELETED;
        $data->save();
        return $this->responseRequestSuccess($data);
    }

    protected function responseRequestSuccess($ret){
        return response()->json(['status' => 'success', 'data' => $ret], 200)
                         ->header('Access-Control-Allow-Origin', '*')
                         ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    }

    protected function responseRequestError($message='Bad request', $statusCode=200){
        return response()->json(['status' => 'error', 'error' => $message], $statusCode)
                         ->header('Access-Control-Allow-Origin', '*')
                         ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    }

    protected function uploadImage($image_data)
    {
      $destinationPath = '../upload/'.$this->model->getTable();
      $safeName = str_random(40).'.'.'png';
      if(!file_exists($destinationPath)){
          mkdir($destinationPath, 0777, true);
      }
      if(!file_put_contents($destinationPath.'/'.$safeName, base64_decode($image_data))){
        return 'error';
      }else{
        return $destinationPath.'/'.$safeName;
      }
    }

    public function uploadFile(Request $request) {
        $id = $request->input("id");
        $filePathname = $request->file('file')->getPathname();
        $fileName = $request->file('file')->getClientOriginalName();

        $destinationPath = '../upload/' . $this->model->getTable();
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }

        $ext = pathinfo($fileName, PATHINFO_EXTENSION); //extract a file extension
        $set_fileName = $id . "_" . substr(md5($fileName . '_' . time()), 0, 15) . "." . $ext; //gen uniqe code
        // Find id
        $getData = $this->model::where('id', $id)->where('status_id', Status::$ACTIVE)->first();
        if($getData->upload_path){
            File::delete($getData->upload_path);
        }

        $getData->upload_path = $destinationPath . "/" . $set_fileName;
        $getData->upload_filename = $fileName;
        if ($getData->save()) {

            if (move_uploaded_file($filePathname, $getData->upload_path)) {
                return $this->responseRequestSuccess($getData);
            } else {
                return $this->responseRequestError("Cannot upload file " . $this->model->getTable());
            }
        } else {
            return $this->responseRequestError("Cannot update " . $this->model->getTable());
        }
    }   
}
