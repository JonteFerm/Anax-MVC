<article class="article1">
<?php if(isset($title)) : ?>
<h2><?=$title ?></h2>
<?php endif; ?> 
<?=$content?>
 
<?php if(isset($byline)) : ?>
<footer class="byline">
<?=$byline?>
</footer>
<?php endif; ?>
 
</article>