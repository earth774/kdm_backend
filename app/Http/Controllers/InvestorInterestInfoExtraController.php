<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\InvestorInterestInfoExtra;
use App\Status;
use Illuminate\Http\Request;

/**
 * Description of BuyingItemInfoController
 *
 * @author Nat
 */
class InvestorInterestInfoExtraController extends KdmBaseController{
    //put your code here
    public function __construct(){
        parent::__construct(new InvestorInterestInfoExtra());
    }
    
    public function updateData(Request $request, $user_id){
       $user = InvestorInterestInfoExtra::where('user_id',$user_id)
                                        ->where('status_id', Status::$ACTIVE)->first();
       if(!empty($user)){
           if($request->investor_interest_type != null){ $user->investor_interest_type_str_id = implode(",",$request->investor_interest_type);}
           if($request->investor_income_type_id != null){ $user->investor_income_type_id = $request->investor_income_type_id ;}
           if($request->investor_invest_type_id != null){ $user->investor_invest_type_id = $request->investor_invest_type_id ;}
           if($request->investor_comment != null){$user->investor_comment = $request->investor_comment ;}
           if($request->interest != null){$user->is_interest = $request->interest ; }
           if($request->investor_income_type_id == 8){ //isOther
                $user->investor_income_remark =  $request->investor_income_type_note ;
           }else{
                $user->investor_income_remark =  "" ;
           }
           if($request->investor_invest_type_id == 8){ //isOther
               $user->investor_invest_remark =  $request->investor_invest_type_note ;
           }else{
                $user->investor_invest_remark =  "" ;
           }
           if ($user->save()){
                return $this->responseRequestSuccess($user);
           } else {
                return $this->responseRequestError("Cannot update data");
           }      
       }else{
           $InvestorInterestInfoExtra = new InvestorInterestInfoExtra();
           $InvestorInterestInfoExtra->user_id = $user_id ;
           if($request->investor_interest_type != null){ $InvestorInterestInfoExtra->investor_interest_type_str_id = implode(",",$request->investor_interest_type);}
           if($request->investor_income_type_id != null){ $InvestorInterestInfoExtra->investor_income_type_id = $request->investor_income_type_id ;}
           if($request->investor_invest_type_id != null){ $InvestorInterestInfoExtra->investor_invest_type_id = $request->investor_invest_type_id ;}
           if($request->investor_comment != null){$InvestorInterestInfoExtra->investor_comment = $request->investor_comment ;}
           if($request->interest != null){$InvestorInterestInfoExtra->is_interest = $request->interest ; }
           if($request->investor_income_type_id == 8){ //isOther
                $InvestorInterestInfoExtra->investor_income_remark =  $request->investor_income_type_note ;
           }else{
                $InvestorInterestInfoExtra->investor_income_remark =  "" ;
           }
           if($request->investor_invest_type_id == 8){ //isOther
               $InvestorInterestInfoExtra->investor_invest_remark =  $request->investor_invest_type_note ;
           }else{
               $InvestorInterestInfoExtra->investor_invest_remark =  "" ;
           }
           if ($InvestorInterestInfoExtra->save()){
                return $this->responseRequestSuccess($InvestorInterestInfoExtra);
           } else {
                return $this->responseRequestError("Cannot update data");
           }
        }

    }
    
     public function getData($id){
        $data = $this->model::where('user_id', $id)->where('status_id', Status::$ACTIVE)->get();
        if(!empty($data)){
            return $this->responseRequestSuccess($data);
        }else{
            return $this->responseRequestSuccess(null);
        }
        
    }
}

