<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dangKi(){
        return view('user.dangki');
    }
    public function xuLiDangKi(Request $request){
        $fullname = $request->get('fullname');
        $email = $request->get('email');
        $phone = $request->get('phone');
        $address = $request->get('address');
        $identityCard = $request->get('identity Card');
        return $fullname. ' ' . $email. ' ' .$phone. ' ' .$address. ' ' . ' ' . $identityCard;
    }
    public function login(Request $request){
        $name = $request->get('name');
        $email = $request->get('email');
        $password = $request->get('password');
        return sprintf('welcome to admin page %s , email %s, password %s',$name ,$email, $password);
    }
    public function getUserDetail ($id){
        return 'hello path' . $id;
    }
}
