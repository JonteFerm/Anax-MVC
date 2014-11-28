<?php
/**
 * Config-file for navigation bar.
 *
 */
return [

    // Use for styling the menu
    'class' => 'navbar',
 
    // Here comes the menu strcture
    'items' => [

        // This is a menu item
        'home'  => [
            'text'  => 'Home',
            'url'   => '',
            'title' => 'Home route of current frontcontroller'
        ],
 
        // This is a menu item
        'redovisning' => [
            'text' => 'Redovisning',
            'url' => 'redovisning',
            'title' => 'Internal route within this frontcontroller',
        ],

        'guestbook' => [
            'text' => 'Gästbok',
            'url' => 'guestbook',
            'title' => 'Internal route within this frontcontroller',
        ],

        'guestbook2' => [
            'text' => 'Gästbok 2',
            'url' => 'guestbook2',
            'title' => 'Internal route within this frontcontroller',
        ],

        'Tema' => [
            'text' => 'Tema',
            'url' => 'theme_ferm.php',
            'title' => 'Internal route within this frontcontroller',
        ],
        'users' => [
            'text' => 'Användare',
            'url' => 'users',
            'title' => 'Internal route within this frontcontroller',
        ],

        'test'  => [
            'text'  => 'Tester',
            'url'   => $this->di->get('url')->createRelative(''),
            'title' => 'Submenu with url to relative frontcontroller',

            'submenu' => [

                'items' => [

                    // This is a menu item of the submenu
                    'item 1'  => [
                        'text'  => 'Form Test',
                        'url'   => $this->di->get('url')->createRelative('formtest'),
                        'title' => 'Testa forms',
                    ],
                    'item 2'  => [
                        'text'  => 'DB Test',
                        'url'   => $this->di->get('url')->createRelative('dbtest'),
                        'title' => 'Testa databas',
                    ],

                ],
            ],
        ],

        'source' => [
            'text' => 'Källkod',
            'url' => 'source',
            'title' => 'Internal route within this frontcontroller'
        ],
 
    ],
 
    // Callback tracing the current selected menu item base on scriptname
    'callback' => function ($url) {
        if ($url == $this->di->get('request')->getRoute()) {
                return true;
        }
    },

    // Callback to create the urls
    'create_url' => function ($url) {
        return $this->di->get('url')->create($url);
    },
];
