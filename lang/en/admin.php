<?php

$path = lang_path("en");

return [
    'prefix' => "admin",
    'account' => File::json("$path/json/admindashboard/account.json"),
    'editproduct' => File::json("$path/json/admindashboard/editproduct.json"),
    'addproduct' => File::json("$path/json/admindashboard/addproduct.json"),
    'editorder' => File::json("$path/json/admindashboard/editorder.json"),
    'help' => File::json("$path/json/admindashboard/help.json"),
    'orders' => File::json("$path/json/admindashboard/orders.json"),
    'login' => File::json("$path/json/admindashboard/login.json"),
    'products' => File::json("$path/json/admindashboard/products.json"),
    'addcategory' => File::json("$path/json/admindashboard/addcategory.json"),
    'editcategory' => File::json("$path/json/admindashboard/editcategory.json"),
    'categories' => File::json("$path/json/admindashboard/categories.json"),
];