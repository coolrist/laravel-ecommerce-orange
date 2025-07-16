<?php

$path = lang_path("en");

return [
    'homepage' => File::json("$path/json/common/homepage.json"),
    'cart' => File::json("$path/json/common/cart.json"),
    'contact' => File::json("$path/json/common/contact.json"),
    'shop' => File::json("$path/json/common/shop.json"),
    'singleproduct' => File::json("$path/json/common/singleproduct.json"),
    'login' => File::json("$path/json/common/login.json"),
    'register' => File::json("$path/json/common/register.json"),    
    'checkout' => File::json("$path/json/common/checkout.json"),
];