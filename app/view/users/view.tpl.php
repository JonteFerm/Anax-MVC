<article class='article1'>
<h1><?=$title?></h1>
 
<ul>
	<li><b>User #<?=$user->id?></b></li>
	<li>Acronym: <?=$user->acronym?></li>
	<li>Name: <?=$user->name?></li>
	<li>Created: <?=$user->created?></li>
	<li>Updated: <?=$user->updated?></li>
	<li>Deleted: <?=$user->deleted?></li>
	<li>Active: <?=$user->active?></li>
</ul>
<p><a href='<?=$this->url->create('users/restore/'.$user->id) ?>'>Set active</a> &nbsp;&nbsp;<a href='<?=$this->url->create('users/soft-delete/'.$user->id) ?>
	'>Set inactive</a></p>
<p><a href='<?=$this->url->create('users')?>'>Home</a></p>
</article>