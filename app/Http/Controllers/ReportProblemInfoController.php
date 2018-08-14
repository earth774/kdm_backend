<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\ReportProblemInfo;
use Illuminate\Http\Request;
use App\Status;

/**
 * Description of ReportProblemInfoController
 *
 * @author Nat
 */
class ReportProblemInfoController extends KdmBaseController {

    //put your code here
    public function __construct() {
        parent::__construct(new ReportProblemInfo());
    }

    public function uploadFile(Request $request) {
        $id = $request->input("user_id");
        $title = $request->input("title");
        $content = $request->input("content");
        $user_agent = $request->input("user_agent");
        if ($request->file('file')) {
            $filePathname = $request->file('file')->getPathname();
            $fileName = $request->file('file')->getClientOriginalName();
            $destinationPath = '../upload/' . $this->model->getTable();
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            $ext = pathinfo($fileName, PATHINFO_EXTENSION); //extract a file extension
            $set_fileName = $id . "_" . substr(md5($fileName . '_' . time()), 0, 15) . "." . $ext; //gen uniqe code
        } else {
            $filePathname = "";
            $fileName = "";
        }

        $getData = new ReportProblemInfo();
        $getData->user_id = $id;
        $getData->upload_path = $fileName == "" ? "" : $destinationPath . "/" . $set_fileName;
        $getData->upload_filename = $fileName;
        $getData->title = $title;
        $getData->content = $content;
        $getData->user_agent = $user_agent;

        if ($getData->save()) {

            if($fileName != ""){
                if (move_uploaded_file($filePathname, $getData->upload_path)) {
                  return $this->responseRequestSuccess($getData);
              } else {
                  return $this->responseRequestError("Cannot upload file " . $this->model->getTable());
              }              
            }else{
                return $this->responseRequestSuccess($getData);
            }
        } else {
            return $this->responseRequestError("Cannot update " . $this->model->getTable());
        }
    }

    public function index() {
        $data = $this->model::join('user', 'user.id', 'report_problem_info.user_id')
                        ->select('report_problem_info.*', 'user.username as user_id')
                        ->where('report_problem_info.status_id', Status::$ACTIVE)->get();
        return $this->responseRequestSuccess($data);
    }

    public function getData($id) {
        $data = $this->model::join('user', 'user.id', 'report_problem_info.user_id')
                        ->select('report_problem_info.*', 'user.username as user_id')
                        ->where('report_problem_info.id', $id)
                        ->where('report_problem_info.status_id', Status::$ACTIVE)->get();
        return $this->responseRequestSuccess($data);
    }

}
