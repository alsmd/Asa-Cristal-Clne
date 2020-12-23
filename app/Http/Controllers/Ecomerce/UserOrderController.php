<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserOrder;
use App\Http\Controllers\Controller;

class UserOrderController extends Controller
{
    //
    private $order;

    public function __construct(UserOrder $order){
        $this->order = $order;
    }
}
