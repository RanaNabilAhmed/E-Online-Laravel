<?php
namespace App\helpers;
use App\User;
use App\Order;

function user_count(){
    $user = User::count();
    return $user;
}
function order_count(){
    $order = Order::count();
    return $order;
}
?>