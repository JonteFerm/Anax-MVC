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
            'url'   => $this->di->get('url')->create(''),
            'title' => 'Home route of current frontcontroller'
        ],


        'regions'  => [
            'text'  => 'Regioner',
            'url'   => $this->di->get('url')->create('regioner'),
            'title' => 'Home route of current frontcontroller'
        ],

        'grid'  => [
            'text'  => 'Rutnät',
            'url'   => $this->di->get('url')->create('grid'),
            'title' => 'Home route of current frontcontroller'
        ],

 
        'typography' => [
            'text'  =>'Typografi',
            'url'   => $this->di->get('url')->create('typography'),
            'title' => 'Internal route within this frontcontroller'
        ],

        'fontawsome' => [
            'text'  =>'Font Awsome',
            'url'   => $this->di->get('url')->create('fontawsome'),
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
