<?php foreach($news as $news_item):?>
	<h2><?php echo $news_item['title']?></h2>
	<div class="mail">
		<?php echo $news_item['text'];?>
	</div>
	<p><a href="http://ci.com/index.php/news/<?php echo $news_item['slug']?>">View articl</a>
<?php endforeach ?>
