<?php

$path = lang_path("en");

return [
    'prefix' => "dashboard",
    'account' => File::json("$path/json/userdashboard/account.json"),
    'orderdetails' => File::json("$path/json/userdashboard/orderdetails.json"),
    'payment' => File::json("$path/json/userdashboard/payment.json"),
];