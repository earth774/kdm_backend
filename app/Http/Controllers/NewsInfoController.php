<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\NewsInfo;
use Illuminate\Http\Request;
use App\Status;
/**
 * Description of NewsInfoController
 *
 * @author Nat
 */
class NewsInfoController extends KdmBaseController {
    //put your code here
    public function __construct() {
        parent::__construct(new NewsInfo());
    }
    
    public function getPage(Request $request){

        $startNews = $request->input('startNews');
        $newsInOnePage = $request->input('newsInOnePage');

        $data = $this->model::leftjoin('news_info_resource', 'news_info.id', 'news_info_resource.news_info_id')
                ->select("news_info.*",'news_info_resource.src_path as src_path')
                ->where('news_info.status_id', Status::$ACTIVE)
                ->groupBy('news_info.id')
                ->orderBy('news_info.id','desc')
                ->offset($startNews)
                ->limit($newsInOnePage)
                ->get();  

        return $this->responseRequestSuccess($data);
    }

    public function getCount(Request $request){
        
        $count = $request->input('count');
        $total = $this->model::count()/$count;

        return $this->responseRequestSuccess($total);
    }
       
}
