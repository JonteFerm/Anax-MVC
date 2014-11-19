<hr>

<h2>Kommentarer</h2>
<?php if (is_array($comments)) : ?>
<?php foreach ($comments as $id => $comment) : ?>
<div class='commentsMe'>
<div class='tool right' ><a href="<?=$this->url->create('comment/remove?removeId='.$id.'&redirect='.$redirect.'&identifier='.$identifier)?>" >X</a></div>
<div class='tool'><a href="<?=$this->url->create('comment/edit?editId='.$id.'&redirect='.$redirect.'&identifier='.$identifier)?>">#<?=$id?></a></div>
<figure><?php if(!empty($comment['image'])): ?>
<img src="<?=$comment['image']?>"/>
<?php else: ?>
<img src="img/anax.png"/>
<?php endif; ?>
<figcaption ><p><b><?=$comment['name']?></b></p><p><?=$comment['mail']?></p>
<?php if(!empty($comment['web'])) : ?>
<p><a href='<?=$comment['web']?>'>Website</a></p></figcaption>
<?php endif; ?>
</figure>
<article style='width:85%; float:right; word-wrap: break-word;'><p><?=$comment['content']?></p></article>
</div>
<?php endforeach; ?>
<?php endif; ?>