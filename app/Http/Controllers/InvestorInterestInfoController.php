<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\InvestorInterestInfo;
use App\Province;
use App\Status;
use Illuminate\Http\Request;

/**
 * Description of InvestorInterestInfoController
 *
 * @author Tae
 */
class InvestorInterestInfoController extends KdmBaseController
{
    //put your code here
    public function __construct()
    {
        parent::__construct(new InvestorInterestInfo());
    }

    public function getDataByUser(Request $request, $user_id)
    {
        $data = $this->model::join('resource_info', 'investor_interest_info.resource_info_id', 'resource_info.id')
            ->select('investor_interest_info.*', 'resource_info.name as resource_name')
            ->where('investor_interest_info.user_id', $user_id)
            ->where('investor_interest_info.user_type_id', $request->user_type_id)
            ->where('investor_interest_info.status_id', Status::$ACTIVE)->get();
        return $this->responseRequestSuccess($data);
    }

    public function getData($id)
    {
        $data = $this->model::join('resource_info', 'investor_interest_info.resource_info_id', 'resource_info.id')
            ->select('investor_interest_info.*', 'resource_info.name as resource_name')
            ->where('investor_interest_info.id', $id)
            ->where('investor_interest_info.status_id', Status::$ACTIVE)->get();
        return $this->responseRequestSuccess($data);
    }

    public function getInvestmentMap()
    {
        $investorList = [];
        $ProvinceData = Province::get();

        foreach ($ProvinceData as $obj) {
            $investorData = $this->model::select("invest_money")
                ->where('province_id', $obj['id'])
                ->where('status_id', Status::$ACTIVE)
                ->get();
            $totalMoney = 0;
            foreach ($investorData as $investorObj) {
                $totalMoney += floatval($investorObj["invest_money"]);
            }
            $investorList[] = array($obj["chart_code"], $totalMoney);
        }
        return $this->responseRequestSuccess($investorList);
    }

    // public function getInvestmentMap() {
    //     $data = [
    //         ['th-ct', 0],
    //         ['th-pg', 2],
    //         ['th-st', 3],
    //         ['th-kr', 4],
    //         ['th-sa', 5],
    //         ['th-tg', 6],
    //         ['th-tt', 7],
    //         ['th-pl', 8],
    //         ['th-ps', 9],
    //         ['th-kp', 10],
    //         ['th-pc', 11],
    //         ['th-sh', 12],
    //         ['th-at', 13],
    //         ['th-lb', 14],
    //         ['th-pa', 15],
    //         ['th-np', 16],
    //         ['th-sb', 17],
    //         ['th-cn', 18],
    //         ['th-bm', 19],
    //         ['th-pt', 20],
    //         ['th-no', 21],
    //         ['th-sp', 22],
    //         ['th-ss', 23],
    //         ['th-sm', 24],
    //         ['th-pe', 25],
    //         ['th-cc', 26],
    //         ['th-nn', 27],
    //         ['th-cb', 28],
    //         ['th-br', 29],
    //         ['th-kk', 30],
    //         ['th-ph', 31],
    //         ['th-kl', 32],
    //         ['th-sr', 33],
    //         ['th-nr', 34],
    //         ['th-si', 35],
    //         ['th-re', 36],
    //         ['th-le', 37],
    //         ['th-nk', 38],
    //         ['th-ac', 39],
    //         ['th-md', 40],
    //         ['th-sn', 41],
    //         ['th-nw', 42],
    //         ['th-pi', 43],
    //         ['th-rn', 44],
    //         ['th-nt', 45],
    //         ['th-sg', 46],
    //         ['th-pr', 47],
    //         ['th-py', 48],
    //         ['th-so', 49],
    //         ['th-ud', 50],
    //         ['th-kn', 51],
    //         ['th-tk', 52],
    //         ['th-ut', 53],
    //         ['th-ns', 54],
    //         ['th-pk', 55],
    //         ['th-ur', 56],
    //         ['th-sk', 57],
    //         ['th-ry', 58],
    //         ['th-cy', 59],
    //         ['th-su', 60],
    //         ['th-nf', 61],
    //         ['th-bk', 62],
    //         ['th-mh', 63],
    //         ['th-pu', 64],
    //         ['th-cp', 65],
    //         ['th-yl', 66],
    //         ['th-cr', 67],
    //         ['th-cm', 68],
    //         ['th-ln', 69],
    //         ['th-na', 70],
    //         ['th-lg', 71],
    //         ['th-pb', 72],
    //         ['th-rt', 73],
    //         ['th-ys', 74],
    //         ['th-ms', 75],
    //         ['th-un', 76],
    //         ['th-nb', 77]
    //     ];
    //     print_r($data);
    //     return $this->responseRequestSuccess($data);
    // }
}
