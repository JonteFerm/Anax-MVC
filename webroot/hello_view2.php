<?php
require __DIR__.'/config_with_app.php'; 
$app->theme->setVariable('title', "Hello World Pagecontroller");
$app->views->add('welcome/hello_world');
$app->views->add('test/quote', ['today' => date('r')], 'header');
$app->views->add('test/quote', ['today' => date('r')], 'footer'); 

$app->theme->render();