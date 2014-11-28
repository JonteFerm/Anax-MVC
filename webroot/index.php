<?php
require __DIR__.'/config_with_app.php';
$app->theme->configure(ANAX_APP_PATH . 'config/theme_me.php');
$app->navbar->configure(ANAX_APP_PATH. 'config/navbar_me.php');
$app->url->setUrlType(\Anax\Url\CUrl::URL_CLEAN);
$app = new \Anax\MVC\CApplicationBasic($di); //To enable session wrapping.

 $di->setShared('db', function() {
    $db = new \Mos\Database\CDatabaseBasic();
    $db->setOptions(require ANAX_APP_PATH . 'config/config_mysql.php');
    $db->connect();
    return $db;
});

$di->session();

/*
// ____________________________________________________
// Controllers
// ____________________________________________________
*/

$di->set('UsersController', function() use ($di) {
    $controller = new \Anax\Users\UsersController();
    $controller->setDI($di);
    return $controller;
});

$di->set('CommentController', function() use ($di) {
    $controller = new \Anax\Comments\CommentController();
    $controller->setDI($di);
    return $controller;
});

$di->set('FormAddCommentController', function() use ($di) {
    $controller = new \Anax\Comments\FormAddCommentController();
    $controller->setDI($di);
    return $controller;
});

$di->set('FormEditCommentController', function() use ($di) {
    $controller = new \Anax\Comments\FormEditCommentController();
    $controller->setDI($di);
    return $controller;
});


$di->set('FormSmallController', function() use ($di){
 	$controller = new \Anax\HTMLForm\FormController();
 	$controller->setDI($di);
 	return $controller;
 });

$di->set('FormAddUserController', function() use ($di){
 	$controller = new \Anax\Users\FormAddUserController();
 	$controller->setDI($di);
 	return $controller;
 });

$di->set('FormDeleteUserController', function() use ($di){
 	$controller = new \Anax\Users\FormDeleteUserController();
 	$controller->setDI($di);
 	return $controller;
 });


/*
// ____________________________________________________
// Main routes
// ____________________________________________________
*/
$app->router->add('setup', function() use($app){
	$app->db->dropTableIfExists('user')->execute();
 
    $app->db->createTable(
        'user',
        [
            'id' => ['integer', 'primary key', 'not null', 'auto_increment'],
            'acronym' => ['varchar(20)', 'unique', 'not null'],
            'email' => ['varchar(80)'],
            'name' => ['varchar(80)'],
            'password' => ['varchar(255)'],
            'created' => ['datetime'],
            'updated' => ['datetime'],
            'deleted' => ['datetime'],
            'active' => ['datetime'],
        ]
    )->execute();

    $app->db->insert(
        'user',
        ['acronym', 'email', 'name', 'password', 'created', 'active']
    );
 
    $now = date(DATE_RFC2822);
 
    $app->db->execute([
        'admin',
        'admin@dbwebb.se',
        'Administrator',
        password_hash('admin', PASSWORD_DEFAULT),
        $now,
        $now
    ]);
 
    $app->db->execute([
        'doe',
        'doe@dbwebb.se',
        'John/Jane Doe',
        password_hash('doe', PASSWORD_DEFAULT),
        $now,
        $now
    ]);
});

$app->router->add('', function() use ($app){
	$app->theme->setTitle("Hem");
	$content = $app->fileContent->get('me.md');
	$content = $app->textFilter->doFilter($content, 'shortcode, markdown');
	$byline = $app->fileContent->get('byline.md');
	$byline = $app->textFilter->doFilter($byline,'shortcode, markdown');

	$app->views->add("me/page", [
		'content' => $content,
		'byline' => $byline,
	]);

});

$app->router->add('redovisning', function() use ($app){
	$app->theme->setTitle("Redovisning");

	$content = $app->fileContent->get('redovisning.md');
	$content = $app->textFilter->doFilter($content,'shortcode, markdown');
	$byline = $app->fileContent->get('byline.md');
	$byline = $app->textFilter->doFilter($byline,'shortcode, markdown');

	$app->views->add("me/page", [
		'content' => $content,
		'byline' => $byline,
	]);
});

$app->router->add('source', function() use ($app){
	$app->theme->addStylesheet('css/source.css');
	$app->theme->setTitle("Källkod");

	$source = new \Mos\Source\CSource([
		'secure_dir' => '..',
		'base_dir' => '..',
		'add_ignore' => ['.htaccess'],
	]);

	$app->views->add('me/source', [
		'content' => $source->View(),
	]);
});

$app->router->add('guestbook', function() use ($app){
	$app->theme->setTitle("Gästbok");

	$app->theme->setTitle("Welcome to Anax Guestbook");


	$app->dispatcher->forward([
	    'controller' => 'comment',
	    'action'     => 'viewImproved',
	]);

	$app->dispatcher->forward([
		'controller' => 'form-add-comment', 
		'action' => 'index',
	]);

});

$app->router->add('guestbook2', function() use ($app){
	$app->theme->setTitle("Gästbok 2");

	$app->theme->setTitle("Welcome to Anax Guestbook");


	$app->dispatcher->forward([
	    'controller' => 'comment',
	    'action'     => 'viewImproved',
	]);

	$app->dispatcher->forward([
		'controller' => 'form-add-comment', 
		'action' => 'index',
	]);

});


$app->router->add('formtest', function() use ($app){

	$app->session();
	$app->theme->setTitle("Test form");

    $app->dispatcher->forward(['controller' => 'form-small', 'action' => 'index']);

});

$app->router->add('dbtest', function() use ($app){
	$db = new \Mos\Database\CDatabaseBasic();
	$options = require ANAX_APP_PATH."config/config_mysql.php";
	$db->setOptions($options);
	$db->connect();
	$db->setVerbose(false);

	$sql = "DROP TABLE IF EXISTS test;";

	$db->execute($sql);

	$sql = "CREATE TABLE test(
		id INT primary key not null auto_increment,
		age int,
		text varchar(80)

	);";
	
	$db->execute($sql);

	$db->insert(
		'test',
		[
			'age' => 22,
			'text' => 'Testar insert'
		]

	);

	$db->execute();

	$db->insert(
		'test',
		[
			'age' => 90,
			'text' => 'Hello world'
		]

	);

	$db->execute();

	$sql = "UPDATE test SET age=?, text=? WHERE id=?";
	$db->execute($sql, [80, 'Hej världen!', 2]);

	$sql = "SELECT age, text FROM test;";
	$db->execute($sql);
	$res = $db->fetchAll();

	$content = "<h1>Select test:</h1>";

	foreach($res as $val){
		$content .= "<p>{$val->age}, {$val->text}</p>";
	}

	
	$app->views->add("me/page", [
		'content' => $content,
	]);

});

$app->router->add('users', function() use($app){
	$app->theme->setTitle("Manage users");
	$content = "<ul>
		<li><a href='".$app->url->create('users/all')."'>Alla användare</a>
		<li><a href='".$app->url->create('users/active')."'>Aktiva användare</a>
		<li><a href='".$app->url->create('users/add')."'>Lägg till användare</a>
		<li><a href='".$app->url->create('users/delete')."'>Ta bort användare</a>
		<li><a href='".$app->url->create('users/inactive')."'>Papperskorgen</a>
	</ul>";

	$app->views->add('me/page', ['content' => $content, 'title' => 'Hantera användare']);
});


/*
// ____________________________________________________
// User routes
// ____________________________________________________
*/


$app->router->add('users/all', function() use($app){
	$app->dispatcher->forward(['controller' => 'users', 'action' => 'list']);
});

$app->router->add('users/active', function() use($app){
	$app->dispatcher->forward(['controller' => 'users', 'action' => 'active']);
});

$app->router->add('users/inactive', function() use($app){
	$app->dispatcher->forward(['controller' => 'users', 'action' => 'inactive']);
});

$app->router->add('users/id/:number', function() use($app){
	$app->dispatcher->forward(['controller' => 'users', 'action' => 'id']);
});

$app->router->add('users/add', function() use($app){
	$app->theme->setTitle("Add user");

    $app->dispatcher->forward(['controller' => 'form-add-user', 'action' => 'index']);

});

$app->router->add('users/delete', function() use($app){
	$app->theme->setTitle("Delete user");

	$app->dispatcher->forward(['controller' => 'form-delete-user', 'action' => 'index']);
});

$app->router->add('users/soft-delete/:number', function() use($app){
	$app->theme->setTitle("Update user");
	$app->dispatcher->forward(['controller' => 'users', 'action' => 'soft-delete']);
});

$app->router->add('users/restore/:number', function() use($app){
	$app->theme->setTitle("Update user");
	$app->dispatcher->forward(['controller' => 'users', 'action' => 'restore']);
});


/*
// ____________________________________________________
// Comment routes
// ____________________________________________________
*/


$app->router->add('comment/remove', function() use ($app){
	$app->dispatcher->forward(['controller' => 'comment', 'action' => 'remove']);
});

$app->router->add('comment/edit', function() use ($app){
	$app->dispatcher->forward(['controller' => 'comment', 'action' => 'edit']);
});

$app->router->add('comment/save', function() use ($app){
	$app->dispatcher->forward(['controller' => 'comment', 'action' => 'save']);
});

$app->router->handle();
$app->theme->render();