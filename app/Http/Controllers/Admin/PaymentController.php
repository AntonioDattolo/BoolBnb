<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function pay(){
        $customer  =  Auth::user ( )->id ;
        $data = [
            'data' => $customer
        ];
        return view('prova',$data);
    }
}
