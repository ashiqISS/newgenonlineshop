<?php

return array(
    '' => 'site/index',
    'login' => 'site/login',
    'logout' => 'site/logout',
    'recover-password' => 'site/ForgotPassword',
    'merchant-registration' => 'registration/merchantDetails/create',
    'merchant-activation' => 'registration/merchantDetails/UserActivation',
    'buyer-activation' => 'registration/buyerDetails/UserActivation',
    'user-registration' => 'registration/buyerDetails/create',
    'merchant-home' => 'merchant/merchantDetails/home',
    'merchant-profile' => 'merchant/merchantDetails/profile',
    'merchant-editProfile' => 'merchant/merchantDetails/editProfile',
    'change-password' => 'merchant/merchantDetails/changePassword',
    'featured-ads' => 'merchant/merchantDetails/featuredAds',
    'my-sales' => 'merchant/merchantDetails/mySales',
    'request-pay' => 'merchant/merchantDetails/paymentRequest',
    'add-product' => 'merchant/products/addProduct',
    'edit-product' => 'merchant/products/Edit',
    'delete-product' => 'merchant/products/deleteproduct',
    'view-product' => 'merchant/products/View',
    'my-products' => 'merchant/products/myProducts',
    '<controller:\w+>/<id:\d+>' => '<controller>/view',
    '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
);

