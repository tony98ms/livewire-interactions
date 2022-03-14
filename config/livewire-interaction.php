<?php


return [
    'model_user' => \App\Models\User::class,
    'template' => 'bootstrap',
    'options' => [
        'bootstrap' => [
            'follow_class' => 'btn btn-info btn-block btn-sm',
            'unfollow_class' => 'btn btn-danger btn-block btn-sm'
        ],
        'tailwind' => [
            'class' => ''
        ],
    ]
];
