<?php

return array(
    '' => 'site/index',
    'login' => 'site/login',
    'logout' => 'site/logout',
    'brands-add' => 'masters/masterBrands/create',
    'brands-admin' => 'masters/masterBrands/admin',
    
    '<controller:\w+>/<id:\d+>' => '<controller>/view',
    '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
);

