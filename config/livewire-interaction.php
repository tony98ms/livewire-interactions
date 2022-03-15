<?php


return [
    /*
     |-------------------------------------------------------------------------
     |Theme Front End
     |-------------------------------------------------------------------------
     |
     |Here you define which type of thema to use to implement the styles,
     |you must define a mandatory one, however you can customize those styles
     |by publishing the respective views.
     |Supported Theme: 'bootstrap', 'tailwind',
     */
    'theme' => 'bootstrap',

    /*
     |-------------------------------------------------------------------------
     |Show Icon
     |-------------------------------------------------------------------------
     |
     |If value is true, it will only show the icon, otherwise it will show text
     |and icon.
     */
    'only_icon' => false,

    /*
     |-------------------------------------------------------------------------
     |Follow Styles
     |-------------------------------------------------------------------------
     |
     |Here you define the classes to use in the tracking package.
     |You can customize the buttons to give them a different appearance
     |than the default.
     */
    'follow' => [
        'bootstrap' => [ // Bootstrap styles
            'btn' => [
                'follow_class' => 'btn btn-info btn-block btn-sm',
                'unfollow_class' => 'btn btn-danger btn-block btn-sm'
            ],
            'icon' => [
                'follow_icon' => 'fas fa-user-plus',
                'unfollow_icon' => 'fas fa-user-xmark'
            ]
        ],
        'tailwind' => [ // Tailwind styles
            'btn' => [
                'follow_class' => 'bg-blue-400 text-white px-32 py-1 rounded-md text-1xl font-medium hover:bg-blue-700 transition duration-300',
                'unfollow_class' => 'bg-red-400 text-white px-32 py-1 rounded-md text-1xl font-medium hover:bg-red-700 transition duration-300'
            ],
            'icon' => [
                'follow_icon' => 'fas fa-user-plus',
                'unfollow_icon' => 'fas fa-user-xmark'
            ]
        ],
    ]
];
