<article class='article1'>
<h1><?=$title?></h1>
<?php if(empty($users)) :?>
<p>Det finns inga användare här!</p>
<?php else:?>
<table>
<tr><th>Id</th><th>Acronym</th><th>Name</th><th>E-mail</th><th>Status</th></tr>
<?php foreach ($users as $user) : ?>
<?php
	$status = null;
	if($user->deleted != NULL && $user->active == NULL){
		$status = 'inactive';
	}
	elseif ($user->active != NULL && $user->deleted == NULL) {
		$status = 'active';
	}
?>

<tr><td><?=$user->id?></td><td><a href='<?=$this->url->create('users/id/'.$user->id) ?>'><?=$user->acronym?></a></td><td><?=$user->name?></td><td><?=$user->email?></td><td><?=$status?></td></tr>
 
<?php endforeach; ?>
</table>
<?php endif; ?>
<p><a href='<?=$this->url->create('users')?>'>Home</a></p>
</article>
