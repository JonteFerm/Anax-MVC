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
            'title' => 'Internal route within this frontcontroller'
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
