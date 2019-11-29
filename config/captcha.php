<?php

return [
    'characters' => ['0','1','2', '3', '4', '6', '7', '8', '9'],



    'font' => base_path('vendor/bonecms/laravel-captcha/src/resources/fonts/IndiraK.ttf'),

    'default' => [
        'length' => 5,
        'width' => 300,
        'height' => 100,
        'quality' => 1,
        'math' => false,
    ],
    'math' => [
        'length' => 9,
        'width' => 120,
        'height' => 36,
        'quality' => 90,
        'math' => true,
    ],


    'flat' => [
        'length' => 5,
        'width' => 300,
        'height' => 100,
        'quality' => 9,
        'lines' => 0,
        'bgImage' => false,
        'bgColor' => '#212121',
        // 'fontColors' => ['#2c3e50', '#c0392b', '#16a085', '#c0392b', '#8e44ad', '#303f9f', '#f57c00', '#795548'],
        'fontColors' => ['#fffff', '#febcde', '#abdf79', '#abdf79', '#cccccc'],
        // 'fontColors' => ['#000000'],
        'contrast' => 0,
    ],
    'mini' => [
        'length' => 3,
        'width' => 60,
        'height' => 32,
    ],
    'inverse' => [
        'length' => 5,
        'width' => 120,
        'height' => 36,
        'quality' => 90,
        'sensitive' => true,
        'angle' => 12,
        'sharpen' => 10,
        'blur' => 2,
        'invert' => true,
        'contrast' => -5,
    ]
];
