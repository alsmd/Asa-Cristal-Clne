<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //

    public function index(){
        $isNotAuthenticate = !(auth()->check());
        if($isNotAuthenticate){
            return redirect()->route('home');
        }
        return view('checkout.index');
    }
}
