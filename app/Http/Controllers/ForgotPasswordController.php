<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

/**
 * Description of ForgotPasswordController
 *
 * @author Nat
 */
class ForgotPasswordController extends KdmBaseController{

    public function checkEmail(Request $request){
        
        $user = User::where('email', $request->email)->first();

        if(!empty($user)){

            $newPassword = uniqid();
            $user->password = Hash::make($newPassword);
            $user->save();
            $this->sentEmail($newPassword,$user);

            return $user->password;
        }else{
            return $this->responseRequestError("อีเมล์ไม่มีในระบบ");
        }
    }

    public function sentEmail($newPassword,$user){
        $content = 'ชื่อผู้ใช้งานของคุณคือ '.$user->username.' รหัสผ่านใหม่คือ '.$newPassword;
        Mail::raw($content, function($msg) use ($user){ 
        $msg->subject('รับรหัสผ่านใหม่ระบบตลาดเกษตรดิจิตอลแบบมีส่วนร่วม');
        $msg->to([$user->email]); 
        $msg->from(['agriconnect.mulberrysoft@gmail.com']); 
        });
    }

}
